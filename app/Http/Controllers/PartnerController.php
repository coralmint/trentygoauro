<?php
namespace App\Http\Controllers;
use App\General;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt; 
use Session;
use Auth;
use DB;
use Mail;
use Hash;
class PartnerController extends Controller
{
    public function my_profile(){
        $partner_id = Session::get('user_id');
        $profile_info = DB::table('partner_details')->where('partner_id',$partner_id)->get();
        $all_messages = DB::table('admin_partner_messages')->where('partner_id',$partner_id)->get();
        $read_messages = DB::table('admin_partner_messages')->where('partner_id',$partner_id)->where('status',2)->get();
        $unread_messages = DB::table('admin_partner_messages')->where('partner_id',$partner_id)->where('status',1)->get();
        $unread_msg_count = DB::table('admin_partner_messages')->where('partner_id',$partner_id)->where('status',1)->count();
        $vehicle_brand_list = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','brand')
                            ->where('status',1)
                            ->get();
                            //  print_r($vehicle_brand_list);
                            //  die();
        $vehicle_details = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        ->leftJoin('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', 'dd.vehicle_id')
                                     ->where('dd.file_for', 'image_document')
                                     ->where('dd.created_at', '=', DB::raw("(select max(`created_at`) from document_details)"));
                            })
                        ->select('vd.vehicle_id','vd.vehicle_model','md.master_value as vehicle_brand','md1.master_value as vehicle_seat_type',
                        'dd.file_path','dd.file_url','dd.file_orginal_name','md.master_value')
                        ->where('vd.partner_id',$partner_id)
                        ->get(); 
                        //  print_r($vehicle_details);
                        //  die();
        $unpublished_vehicle_count = DB::table('vehicle_details')->where('partner_id',$partner_id)->where('status',1)->count();
        $resend_info = DB::table('resend_info')->where('partner_id',$partner_id)->where('status',1)->get();
        $get_all_reservation = DB::table('reservation_details as rd')
                                ->join('vehicle_details as vd','rd.vehicle_id','vd.vehicle_id')
                                ->select('rd.vehicle_id','rd.first_name')
                                ->where('rd.partner_id',$partner_id)
                                ->get();
        $bank_details = DB::table('bank_details')->get();                        
        return view('partner_dashboard/pp_partner_uilist')
                    ->with('partner_id',$partner_id)
                    ->with('profile_info',$profile_info)
                    ->with('read_messages',$read_messages)
                    ->with('unread_messages',$unread_messages)
                    ->with('all_messages',$all_messages)
                    ->with('unread_msg_count',$unread_msg_count)
                    ->with('vehicle_brand_list',$vehicle_brand_list)
                    ->with('vehicle_details',$vehicle_details)
                    ->with('unpublished_vehicle_count',$unpublished_vehicle_count)
                    ->with('resend_info', $resend_info)
                    ->with('get_all_reservation', $get_all_reservation)
                    ->with('bank_details', $bank_details);
    }
    public function partner_update_personal_details(Request $req){
        $partner_details = DB::table('partner_details')->where('partner_id',$req->partner_id)->count();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                    'partner_name' => $req->partner_name,
                    'partner_email' => $req->partner_email,
                    'partner_phone' => $req->partner_phone,
                    'partner_door_no' => $req->partner_door_no,
                    'partner_area' => $req->partner_area,
                    'partner_street' => $req->partner_street,
                    'partner_postalcode' => $req->partner_postal_code,
                    'partner_vehicles_no' => $req->partner_vehicle_count,
                    'partner_company_name' => $req->partner_company_name,
                    'company_description' => $req->partner_company_desc,
                    'status' => 3,
                    'modified_at' => $curent_date,
                    );
            $db = new General();
            $db->updates('partner_details',$data,'partner_id',$req->partner_id);
            $data = "success";
        return json_encode($data);
    }
    public function upload_partner_profile_pic(Request $req){
            if (!file_exists('upload/partner/'.$req->partner_id.'/profile_images/')) {
                mkdir('upload/partner/'.$req->partner_id.'/profile_images/', 0777, true);
            }
            $output_dir = 'upload/partner/'.$req->partner_id.'/profile_images/';
            if(isset($_FILES["myfile"]))
            {
                // $ret=array();
                if(!is_array($_FILES["myfile"]["name"])) //single file
                {
                    $fileName = $_FILES["myfile"]["name"];
                    $duplicate_fileName = $req->partner_id.'profile_img';
                    $ext = (explode(".", $fileName));
                    $file_ext = $ext[1];
                    $image_url = "https://trentygo.coralmint.in/upload/partner/$req->partner_id/profile_images/$fileName";
                    $image_path = "upload/partner/$req->partner_id/profile_images/";
                    // $ret[]= $fileName;
                    $data = array(
                                    'partner_id' => $req->partner_id,
                                    'file_name' => $duplicate_fileName,
                                    'file_ext' => $file_ext,
                                    'file_url' => $image_url,
                                    'file_path' => $image_path,
                                    'file_orginal_name' => $fileName,
                                    'file_detail' => "partner profile image",
                                    'file_for' => "profile_image",
                                );
                    // echo $fileName.$output_dir ;
                    $old_data_count = DB::table('document_details')->where('partner_id',$req->partner_id)->where('file_name',$duplicate_fileName)->count();
                    if($old_data_count == 0){
                        DB::table('document_details')->insert($data);
                        $ret = DB::getPdo()->lastInsertId();
                        move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                        $responsedata = $fileName;   
                    }else{
                        DB::table('document_details')->where('partner_id',$req->partner_id)->where('file_name',$duplicate_fileName)->delete();
                        DB::table('document_details')->insert($data);
                        $ret = DB::getPdo()->lastInsertId();
                        move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                        $responsedata = $fileName;   
                    }
                    // array_push($ret, $property_image);
                    // print_r($ret);
                }
                else  //Multiple files, file[]
                {
                  $fileCount = count($_FILES["myfile"]["name"]);
                  for($i=0; $i < $fileCount; $i++)
                  {
                    $fileName = $_FILES["myfile"]["name"][$i];
                    $duplicate_fileName = $req->partner_id.'profile_img'[$i];
                    // $ret[]= $fileName;
                    $responsedata = $fileName;
                  }            
                }            
                return $responsedata;
            }
    }
    public function insert_message(Request $req){
        $role = Session::get('role');
        $curent_date = date('Y-m-d H:i:s');
        if($role == '2'){
            $data = array(
                        'partner_id' => $req->partner_id,
                        'comment' => $req->msg,
                        'comment_date' => $curent_date,
                        );
        }else{
            $data = array(
                        'partner_id' => $req->partner_id,
                        'comment' => $req->msg,
                        'admin_id' => '0',
                        'comment_date' => $curent_date,
                        );
        }
        DB::table('admin_partner_messages')->insert($data);
        $data = "success";
        return json_encode($data);
    }
    public function update_message(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                    'status' => 2,
                    'modified_at' => $curent_date,
                    );
            DB::table('admin_partner_messages')->where('partner_id',$req->partner_id)->update($data);
            $data = "success";
        return json_encode($data);
    }
    public function admin_update_message(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                    'status' => 2,
                    'modified_at' => $curent_date, 
                    );
            DB::table('admin_partner_messages')->where('partner_id',$req->partner_id)->whereNotNull('admin_id')->update($data);
            $data = "success";
        return json_encode($data);
    }
    public function insert_new_vehicle(Request $req){
        $db = new General();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                    'vehicle_model'    => $req->vehicle_model,
                    'vehicle_brand'    => $req->vehicle_brand,
                    'vehicle_reg_no'    => $req->vehicle_number,
                    'partner_id' => $req->partner_id,
                    );
        $vehicle_count = DB::table('vehicle_details')->where('vehicle_reg_no',$req->vehicle_number)->count();
        if($vehicle_count == '0'){
            DB::table('vehicle_details')->insert($data);
            $ret = DB::getPdo()->lastInsertId();
            $vehicle_id = Crypt::encryptString($ret);   
        }else{
            $vehicle_id ="";
        }
        return json_encode($vehicle_id);
    }
    
    public function update_new_vehicle(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                    'vehicle_brand' => $req->vehicle_brand,
                    'vehicle_model' => $req->vehicle_model,
                    'vehicle_reg_no' => $req->vehicle_reg_no,
                    'vehicle_type' => $req->vehicle_type,
                    'vehicle_ac_type' => $req->vehicle_ac_type,
                    'vehicle_driving_type' => $req->vehicle_driving_type,
                    'vehicle_color' => $req->vehicle_color,
                    'vehicle_fuel_type' => $req->vehicle_fuel_type,
                    'vehicle_max_speed' => $req->vehicle_max_speed,
                    'vehicle_running_km' => $req->vehicle_running_km,
                    'vehicle_reg_year' => $req->vehicle_reg_year,
                    'vehicle_insurance' => $req->vehicle_insurance,
                    'vehicle_fc_date' => $req->vehicle_fc_date,
                    'vehicle_seat_type' => $req->vehicle_seat_type,
                    'vehicle_seat_count' => $req->vehicle_seat_count,
                    'available_status' => $req->available_status,
                    'vehicle_condition' => $req->vehicle_condition,
                    'modified_at' => $curent_date,
                    );
            $db = new General();
            $db->updates('vehicle_details',$data,'vehicle_id',$req->vehicle_id);
            $data = "success";
        return json_encode($data);
    }
    
    public function update_bank_details(Request $req){
            DB::table('bank_details')
                ->updateOrInsert(
                    ['partner_id' => $req->partner_id],
                    ['name_on_card' => $req->name_on_card,
                    'bank_name' => $req->bank_name,
                    'account_number' => $req->account_number,
                    'ifsc_code' => $req->ifsc_code,]
                );
            return json_encode('success');
        
    }
    
    
    
    public function vehicle_list(){
        return view('partner_dashboard/vehicle_list');
    }
    public function load_vehicle_data(Request $req){
        $resul111t = DB::table('manage_vehicle_rent')
                        ->where('vehicle_id', $req->vehicle_id)
                        ->select('vehicle_manage_id as id','rent as title'
                        // ,'date as start'
                        ,DB::raw("STR_TO_DATE(date, '%d-%m-%Y') as start")
                        )
                        ->get();
        echo json_encode($resul111t);
    }
    public function add_new_rent(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        $searchForValue = ',';
        $stringValue = $req->date;
            $f_date = strtotime($req->date);
            $formated_date = date('d-m-Y', $f_date);
            DB::table('manage_vehicle_rent')
                    ->updateOrInsert(
                        ['vehicle_id' => $req->vehicle_id,
                            'date'=> $formated_date ],
                        ['vehicle_id' => $req->vehicle_id,
                            'date' => $formated_date,
                            'rent' => $req->rent,
                            'rate_for' => $req->rent_option,
                            'available_status' => $req->single_vehicle_available_option]
                    );
        return json_encode("success");
    }
    public function add_multidate_rent(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        if($req->vehicle_rent_option == "multiple"){
            $searchForValue = ',';
            $stringValue = $req->date;
            if( strpos($stringValue, $searchForValue) !== false ) {
                $date = explode (",", $req->date);
                foreach($date as $d){
                    $f_date = strtotime($d);
                    $formated_date = date('d-m-Y', $f_date);
                    DB::table('manage_vehicle_rent')
                        ->updateOrInsert(
                            ['vehicle_id' => $req->vehicle_id,
                                'date'=> $formated_date ],
                            ['vehicle_id' => $req->vehicle_id,
                                'date' => $formated_date,
                                'rent' => $req->rent,
                                'rate_for' => $req->rent_option,
                                'available_status' => $req->vehicle_available_option]
                        );
                }
                return json_encode("success");
            }else{
                $f_date = strtotime($req->date);
                $formated_date = date('d-m-Y', $f_date);
                DB::table('manage_vehicle_rent')
                        ->updateOrInsert(
                            ['vehicle_id' => $req->vehicle_id,
                                'date'=> $formated_date ],
                            ['vehicle_id' => $req->vehicle_id,
                                'date' => $formated_date,
                                'rent' => $req->rent,
                                'rate_for' => $req->rent_option,
                                'available_status' => $req->vehicle_available_option]
                        );
                return json_encode("success");
            }   
        }else if($req->vehicle_rent_option == "weekdays"){
            $weekday_month = $req->weekdays;
            $weekday_month_array = explode("-",$weekday_month);
            $month = $weekday_month_array[1];
            $year = $weekday_month_array[0];
            $type = CAL_GREGORIAN;
            $day_count = cal_days_in_month($type, $month, $year); // Get the amount of days
            for ($i = 1; $i <= $day_count; $i++) {
                $date = $year.'/'.$month.'/'.$i; //format date
                $get_name = date('l', strtotime($date)); //get week day
                $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
                //if not a weekend add day to array
                if($day_name != 'Sun' && $day_name != 'Sat'){
                    $digit_count  = strlen($i);
                    if ($digit_count == "1") {
                        $workdays[] = '0'.$i.'-'.$month.'-'.$year;
                    }else{
                        $workdays[] = $i.'-'.$month.'-'.$year;
                    }
                }
            }
            foreach($workdays as $key=>$d){
                DB::table('manage_vehicle_rent')
                        ->updateOrInsert(
                            ['vehicle_id' => $req->vehicle_id,
                                'date'=> $d ],
                            ['vehicle_id' => $req->vehicle_id,
                                'date' => $d,
                                'rent' => $req->rent,
                                'rate_for' => $req->rent_option,
                                'available_status' => $req->vehicle_available_option]
                        );
            }
            return json_encode("success");
        }else if($req->vehicle_rent_option == "weekenddays"){
            $weekday_month = $req->weekenddays;
            $weekday_month_array = explode("-",$weekday_month);
            $month = $weekday_month_array[1];
            $year = $weekday_month_array[0];
            $type = CAL_GREGORIAN;
            $day_count = cal_days_in_month($type, $month, $year); // Get the amount of days
            for ($i = 1; $i <= $day_count; $i++) {
                $date = $year.'/'.$month.'/'.$i; //format date
                $get_name = date('l', strtotime($date)); //get week day
                $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
                //if not a weekend add day to array
                if(($day_name == 'Sun')||($day_name == 'Sat')){
                    // $hollydays[] = $i;
                    $digit_count  = strlen($i);
                    if ($digit_count == "1") {
                        $hollydays[] = '0'.$i.'-'.$month.'-'.$year;
                    }else{
                        $hollydays[] = $i.'-'.$month.'-'.$year;
                    }
                }
            }
            foreach($hollydays as $key=>$d){
                DB::table('manage_vehicle_rent')
                    ->updateOrInsert(
                        ['vehicle_id' => $req->vehicle_id,
                            'date'=> $d ],
                        ['vehicle_id' => $req->vehicle_id,
                            'date' => $d,
                            'rent' => $req->rent,
                            'rate_for' => $req->rent_option,
                            'available_status' => $req->vehicle_available_option]
                    );
            }
            return json_encode("success");
        }else if($req->vehicle_rent_option == "default"){
            $data = array(
                'default_rent' => $req->rent,
                'rent_for' => $req->rent_option,
                'modified_at' => $curent_date
            );
            $db->updates('vehicle_details',$data,'vehicle_id',$req->vehicle_id);
            return json_encode("success");
        }else{
            print_r("else");
        }
    }
    public function upload_vehicle_document(Request $req){
            if($req->has('fc_file_for') != ''){
                $file_for = $req->fc_file_for;
                $file_detail = "Vehicle FC document";
            }else if($req->has('rc_file_for') != ''){
                $file_for = $req->rc_file_for;
                $file_detail = "Vehicle RC document";
            }else if($req->has('ins_file_for') != ''){
                $file_for = $req->ins_file_for;
                $file_detail = "Vehicle Insurance document";
            }else{
                $file_for = $req->image_file_for;
                $file_detail = "Vehicle Images";
            }
            if (!file_exists('upload/partner/'.$req->partner_id.'/vehicle_images/')) {
                mkdir('upload/partner/'.$req->partner_id.'/vehicle_images/', 0777, true);
            }
            $output_dir = 'upload/partner/'.$req->partner_id.'/vehicle_images/';
            if(isset($_FILES["myfile"]))
            {
                $ret=array();
                if(!is_array($_FILES["myfile"]["name"])) //single file
                {
                    $fileName = $_FILES["myfile"]["name"];
                    $duplicate_fileName = $req->partner_id.'vehicle_image';
                    $ext = (explode(".", $fileName));
                    $file_ext = $ext[1];
                    $image_url = "https://trentygo.coralmint.in/upload/partner/$req->partner_id/vehicle_images/$fileName";
                    $image_path = "upload/partner/$req->partner_id/vehicle_images/";
                    $data = array(
                                    'partner_id' => $req->partner_id,
                                    'file_name' => $duplicate_fileName,
                                    'file_ext' => $file_ext,
                                    'file_url' => $image_url,
                                    'file_path' => $image_path,
                                    'file_orginal_name' => $fileName,
                                    'file_for' => $file_for,
                                    'file_detail' => $file_detail,
                                    'vehicle_id' => $req->vehicle_id,
                                );
                    $old_data_count = DB::table('document_details')
                                        ->where('partner_id',$req->partner_id)
                                        ->where('vehicle_id',$req->vehicle_id)
                                        ->count();
                    // if($old_data_count == 0){
                        DB::table('document_details')->insert($data);
                        $inserted_id = DB::getPdo()->lastInsertId();
                        move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                        $responsedata = $fileName;
                        
                        array_push($ret, $image_url);
                        array_push($ret, $fileName);
                        array_push($ret, $inserted_id);
                        array_push($ret, $image_path);
                    // }else{
                    //     DB::table('document_details')
                    //             ->where('partner_id',$req->partner_id)
                    //             ->where('file_name',$duplicate_fileName)
                    //             ->where('vehicle_id',$req->vehicle_id)
                    //             ->delete();
                    //     DB::table('document_details')->insert($data);
                    //     $ret = DB::getPdo()->lastInsertId();
                    //     move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                    //     $responsedata = $fileName;   
                    // }
                    // array_push($ret, $property_image);
                    // print_r($ret);
                }
                else  //Multiple files, file[]
                {
                  $fileCount = count($_FILES["myfile"]["name"]);
                  for($i=0; $i < $fileCount; $i++)
                  {
                    $fileName = $_FILES["myfile"]["name"][$i];
                    $duplicate_fileName = $req->vehicle_id.'vehicle_img'[$i];
                    // $ret[]= $fileName;
                    $responsedata = $fileName;
                  }            
                }            
                return $ret;
            }
    }
    
     public function add_on_info(Request $req){
        $add_on_info = DB::table('master_data')->where('master_key',$req->add_on)->count();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
        'master_for' => 'vehicle_option',
        'master_key' => 'add_on',
        'master_value' => $req->add_on,
        'created_at' => $curent_date,
        );
        if($add_on_info == 0){
            $db = new General();
            $db->insert('master_data',$data);
            $data = "success";
        }else{
            $data = "failed";
        }
        return json_encode($data); 
    }  
    
    public function update_add_on_details(Request $req){
        $value_result = $req->option_value;
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
         foreach($req->feature_id as $key=>$value){
            if(!empty($req->values[$key])){
                $data = array(
                        'addon_value' => $req->values[$key],
                        'modified_at' => $curent_date
                    );
                $db->updates('vehicle_features',$data,'vehicle_features_id',$value);
            }else{
                DB::table('vehicle_features')->where('vehicle_features_id',$value)->delete();   
            }
         }
        return json_encode("success");
    }
    public function delete_addon_detail(Request $req){
        DB::table('vehicle_features')->where('vehicle_features_id',$req->id)->delete();
        return json_encode("success");
    }
    
    public function add_on_details(Request $req){
         
        $check_result = count($req->option_name);
        $value_result = $req->option_value;
        
         foreach($req->option_name as $key=>$value){
            $curent_date = date('Y-m-d H:i:s');
            if(!empty($value_result[$key])){
                    DB::table('vehicle_features')
                    ->updateOrInsert(
                        ['vehicle_id' => $req->vehicle_id,
                            'option_name'=> $value ],
                        ['vehicle_id' => $req->vehicle_id,
                            'option_name' => $value,
                            'addon_value' => $value_result[$key],
                            'features_for' => '2',
                            'created_at' => $curent_date,]
                    );
            }
         }
        return json_encode("success");
    }
    
    
    public function add_on_service(Request $req){
        $add_on_info = DB::table('master_data')->where('master_key',$req->add_service)->count();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
            'master_key' => 'add_on_services',
            'master_for' => 'vehicle_option',
            'master_value' => $req->add_service,
        );
        if($add_on_info == 0){
            $db = new General();
            $db->insert('master_data',$data);
            $data = "success";
        }else{
            $data = "failed";
        }
        
        return json_encode($data);
    }  
    
    public function add_service_details(Request $req){
         
         foreach($req->option_name1 as $value){
            $add_on_info = DB::table('vehicle_features')
                                ->where('option_name',$value)
                                ->where('vehicle_id',$req->vehicle_id)->count();
            $curent_date = date('Y-m-d H:i:s');
        
            $data = array(
            'option_name' => $value,
            'vehicle_id' => $req->vehicle_id,
            'features_for' => '1',
            'created_at' => $curent_date,
            );
            if($add_on_info == 0){
                $db = new General();
                $db->insert('vehicle_features',$data);
                $data = "success";
            }else{
                $data = "failed";
            }
         }
        
        return json_encode($data);
    }
    
    public function update_user_password(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        $owner_id = Session::get('user_id');
        $primary_id = Session::get('primary_id');
        $data = array(
                'password' => Hash::make($req->password),
                'is_logged_status' => 1,
                'updated_at' => $curent_date
            );
        $db->updates('users',$data,'id',$primary_id);
        $data1 = array(
                'password' => $req->password,
                'modified_at' => $curent_date
            );
        $db->updates('owner_info',$data1,'owner_id',$owner_id);
        return json_encode('success');
    }
    public function owner_upload_document(Request $req){
        $owner_id = Session::get('user_id');
        if (!file_exists('upload/'.$owner_id.'/property_document/')) {
            mkdir('upload/'.$owner_id.'/property_document/', 0777, true);
        }
        $output_dir = 'upload/'.$owner_id.'/property_document/';
        if(isset($_FILES["myfile"]))
        {
            // $ret=array();
            if(!is_array($_FILES["myfile"]["name"])) //single file
            {
                $fileName = $_FILES["myfile"]["name"];
                $duplicate_fileName = $req->prop_doc_id.'property_document';
                $ext = (explode(".", $fileName));
                $file_ext = $ext[1];
                $property_id = $req->prop_doc_id;
                $image_url = "http://coralmint.in/rental/upload/$owner_id/property_document/$fileName";
                // $ret[]= $fileName;
                $data = array(
                                'request_id' => $req->request_id,
                                'owner_id' => $owner_id,
                                'property_id' => $req->property_id,
                                'document_img_name' => $duplicate_fileName,
                                'document_img_ext' => $file_ext,
                                'document_img_url' => $image_url,
                                'document_img_orginal_name' => $fileName,
                                 );
                // echo $fileName.$output_dir ;
                DB::table('property_document')->insert($data);
                $ret = DB::getPdo()->lastInsertId();
                move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                // array_push($ret, $property_image);
                // print_r($ret);
            }
            else  //Multiple files, file[]
            {
              $fileCount = count($_FILES["myfile"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                $fileName = $_FILES["myfile"]["name"][$i];
                $duplicate_fileName = $req->prop_doc_id.'property_document'[$i];
                // $ret[]= $fileName;
              }            
            }            
            return $ret;
            // print_r($ret);
        }
    }
    public function update_doc_req(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        if($req->owner_id == ''){
            $owner_id = Session::get('user_id');
        }else{
            $owner_id = $req->owner_id;
        }
        $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            );
        $db->updates('request_info',$data,'request_info_id',$req->prop_document_id);
        return json_encode('success');
    }
    

     public function get_all_upcoming_reservation(){
        try {
           $partner_id = Session::get('user_id');
            $get_all_reservation = DB::table('reservation_details as rd')
                                ->where('rd.partner_id',$partner_id)
                                ->whereDate('rd.start_date', '>=', date('Y-m-d'))
                                ->get();                    

            return Datatables::of($get_all_reservation)
            
                ->addColumn('reservation_id', function ($get_all_reservation) {
                        $reservation_id = '';
                        $reservation_id .= '<center>'.ucfirst($get_all_reservation->reserve_unique_id).'</center>';
                       return $reservation_id.'';
                    })
                ->addColumn('phone', function ($get_all_reservation) {
                        $phone = '';
                        $phone .= '<center>'.$get_all_reservation->phone.'</center>';
                       return $phone.'';
                    })  
                ->addColumn('first_name', function ($get_all_reservation) {
                        $first_name = '';
                        $first_name .= '<center>'.$get_all_reservation->first_name.'</center>';
                       return $first_name.'';
                    })
                ->addColumn('start_date', function ($get_all_reservation) {
                    $start_date = '';
                    $start_date .= '<center>'.ucfirst($get_all_reservation->start_date).'</center>';
                   return $start_date.'';
                })
                ->addColumn('return_date', function ($get_all_reservation) {
                    $return_date = '';
                    $return_date .= '<center>'.ucfirst($get_all_reservation->return_date).'</center>';
                   return $return_date.'';
                })
                ->addColumn('status', function ($get_all_reservation) {
                        $status = '';
                        if($get_all_reservation->status == '1'){
                        $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-primary reject">New</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                <center><span class="border-none btn btn-default btn-outline" onClick="reservation_info('.$get_all_reservation->reservation_id.',2);">Inprogress</span></center>
                                </li>
                            </ul>';
                        }
                        else{
                        $status .= '<span class="label label-success reject">Inprogress</span>';
                        }
                        return $status.'';
                    })
                ->addColumn('action', function ($get_all_reservation) {
                  return '<center>
                        <a style="cursor:pointer; color:#007bff;" onclick="return view_owner('.$get_all_reservation->reservation_id.');" class="openSideMenu_pay on-default remove-row" target="'.$get_all_reservation->reservation_id.'"><i class="fa fa-eye" data-toggle="tooltip" title="View!" ></i></a>
                        </center>';
                        // <a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" onclick="return delete_owner( '.$get_all_owner->owner_id.',2);"><i class="fa fa-trash-o"></i></a>
                    })
             ->rawColumns(array("reservation_id","phone","first_name","start_date","return_date","status","action"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }


    public function filter_get_all_upcoming_reservation_lists(Request $req){
        try {
            $partner_id = Session::get('user_id');
            $filter_multistatus = $req->status;
            $filter_status = $req->status;
            $filter_name = $req->first_name;
            $filter_phone = $req->phone;
            $filter_email = $req->email;
            $filter_vechicle_id = $req->vechicle_id;
            $filter_reservation_id = $req->reservation_id;
            $filter_reserve_through = $req->reserve_through;
            $filter_reservation_date = $req->reservation_date;
            $filter_start_date = $req->start_date;
            $filter_return_date = $req->return_date;
            $filter_from = $req->filter_from;
            if($filter_from == '1'){
                
                $get_all_reservation = DB::table('reservation_details as rd')
                                ->where('rd.partner_id',$partner_id)
                                ->whereDate('rd.start_date', '>=', date('Y-m-d'));
                if(!empty($filter_status)){
                    $get_all_reservation->where('status',$filter_status);
                }
                if(!empty($filter_multistatus)){
                    $get_all_reservation->where('status',$filter_multistatus);
                }
                if(!empty($filter_name)){
                    $get_all_reservation->where('first_name',$filter_name);
                }
                if(!empty($filter_phone)){
                    $get_all_reservation->where('phone',$filter_phone);
                }
                if(!empty($filter_email)){
                    $get_all_reservation->where('email',$filter_email);
                }
                if(!empty($filter_vechicle_id)){
                    $get_all_reservation->where('vechicle_id',$filter_vechicle_id);
                }
                if(!empty($filter_reservation_id)){
                    $get_all_reservation->where('reservation_id',$filter_reservation_id);
                }
                if(!empty($filter_reserve_through)){
                    $get_all_reservation->where('reserve_through',$filter_reserve_through);
                }
                if(!empty($filter_start_date)){
                    $get_all_reservation->where('start_date',$filter_start_date);
                }
                if(!empty($filter_return_date)){
                    $get_all_reservation->where('return_date',$filter_return_date);
                }
                $result= $get_all_reservation->get();     
            }else if($filter_from == '2'){
                $get_all_reservation = DB::table('reservation_details as rd')
                                        ->join('vehicle_details as vd','rd.vehicle_id','vd.vehicle_id')
                                        ->select('rd.reservation_id','rd.phone','rd.first_name','rd.start_date','rd.return_date','rd.status')
                                        ->where('rd.partner_id',$partner_id)
                                        ->whereDay('created_at', '=', date('d'));
                $result= $get_all_reservation->get();        
            }
            else if($filter_from == '3'){
                $curent_date = date('Y-m-d H:i:s');
                $get_all_reservation = DB::table('reservation_details as rd')
                                ->leftJoin('vehicle_details as vd','rd.vehicle_id','vd.vehicle_id')
                                ->where('rd.partner_id',$partner_id)
                                ->whereDate('rd.start_date', '>=', date('Y-m-d'));
                $result= $get_all_reservation->get();        
            }
                               
            return Datatables::of($result)
                ->addColumn('reservation_id', function ($result) {
                        $reservation_id = '';
                        $reservation_id .= '<center>'.ucfirst($result->reserve_unique_id).'</center>';
                       return $reservation_id.'';
                    })
                ->addColumn('phone', function ($result) {
                        $phone = '';
                        $phone .= '<center>'.$result->phone.'</center>';
                       return $phone.'';
                    })  
                ->addColumn('first_name', function ($result) {
                        $first_name = '';
                        $first_name .= '<center>'.$result->first_name.'</center>';
                       return $first_name.'';
                    })
                ->addColumn('start_date', function ($result) {
                    $start_date = '';
                    $start_date .= '<center>'.ucfirst($result->start_date).'</center>';
                   return $start_date.'';
                })
                ->addColumn('return_date', function ($result) {
                    $return_date = '';
                    $return_date .= '<center>'.ucfirst($result->return_date).'</center>';
                   return $return_date.'';
                })
                ->addColumn('status', function ($get_all_reservation) {
                        $status = '';
                        if($get_all_reservation->status == '1'){
                        $status .= '<span class="label label-Primary reject">New</span>';
                        }
                        else if($get_all_reservation->status == '2'){
                        $status .= '<span class="label label-Primary reject">Inprogress</span>';
                        }
                        else if($get_all_reservation->status == '3'){
                        $status .= '<span class="label label-success reject">Confirmed</span>';
                        }
                        else if($get_all_reservation->status == '4'){
                        $status .= '<span class="label label-warning reject">Reservation Pending</span>';
                        }
                        else if($get_all_reservation->status == '5'){
                        $status .= '<span class="label label-primary reject">Cancel Inprogress</span>';
                        }
                        else if($get_all_reservation->status == '6'){
                        $status .= '<span class="label label-primary reject">Cancelled</span>';
                        }
                        else if($get_all_reservation->status == '7'){
                        $status .= '<span class="label label-warning reject">Trip Pending</span>';
                        }
                        else if($get_all_reservation->status == '8'){
                        $status .= '<span class="label label-danger reject">Trip Closed</span>';
                        }
                        return $status.'';
                    })
                ->addColumn('action', function ($result) {
                  return '<center>
                        <a style="cursor:pointer; color:#007bff;" onclick="return view_owner('.$result->reservation_id.');" class="openSideMenu_pay on-default remove-row" target="'.$result->reservation_id.'"><i class="fa fa-eye" data-toggle="tooltip" title="View!" ></i></a>
                        </center>';
                        // <a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" onclick="return delete_owner( '.$get_all_owner->owner_id.',2);"><i class="fa fa-trash-o"></i></a>
                    })
             ->rawColumns(array("reservation_id","phone","first_name","start_date","return_date","status","action"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
 	public function partnerresevationlist(Request $req){
 	     $curent_date = date('Y-m-d'); 
 	     $partner_id = Session::get('user_id');
            $get_all_reservation = DB::table('reservation_details as rd')
                                ->leftJoin('vehicle_details as vd','rd.vehicle_id','vd.vehicle_id')
                                ->where('rd.partner_id',$partner_id)
                                ->where('rd.start_date', '>=', $curent_date)
                                ->get();
        return view('partner_dashboard/partnerresevationlist')
                    ->with('get_all_reservation',$get_all_reservation)
                    ->with('curent_date',$curent_date);
    }
    public function get_all_partner_reservation_list(){
        $partner_id = Session::get('user_id');

        try {
           $get_all_reservation = DB::table('reservation_details as rd')
                                    ->where('rd.partner_id',$partner_id)
                                    ->get();
            return Datatables::of($get_all_reservation)
                ->addColumn('reservation_id', function ($get_all_reservation) {
                        $reservation_id = '';
                        $reservation_id .= '<center>'.ucfirst($get_all_reservation->reserve_unique_id).'</center>';
                       return $reservation_id.'';
                    })
                ->addColumn('phone', function ($get_all_reservation) {
                        $phone = '';
                        $phone .= '<center>'.$get_all_reservation->phone.'</center>';
                       return $phone.'';
                    })  
                ->addColumn('first_name', function ($get_all_reservation) {
                        $first_name = '';
                        $first_name .= '<center>'.$get_all_reservation->first_name.'</center>';
                       return $first_name.'';
                    })
                ->addColumn('vehicle_no', function ($get_all_reservation) {
                    $vehicle_no = '';
                    $vehicle_no .= '<center>'.ucfirst($get_all_reservation->vehicle_reg_no).'</center>';
                   return $vehicle_no.'';
                })
                ->addColumn('start_date', function ($get_all_reservation) {
                    $start_date = '';
                    $start_date .= '<center>'.ucfirst($get_all_reservation->start_date).'</center>';
                   return $start_date.'';
                })
                ->addColumn('return_date', function ($get_all_reservation) {
                    $return_date = '';
                    $return_date .= '<center>'.ucfirst($get_all_reservation->return_date).'</center>';
                   return $return_date.'';
                })
                ->addColumn('sst', function ($get_all_reservation) {
                    $sst = $get_all_reservation->status;
                    return $sst;
                    })
                ->addColumn('crypt_id', function ($get_all_reservation) {
                    $reser_list = Crypt::encryptString($get_all_reservation->reservation_id);
                   return $reser_list.'';
                })
                ->addColumn('status', function ($get_all_reservation) {
                        $status = '';
                        if($get_all_reservation->status == '1'){
                        $status .= '<span class="label label-Primary reject">New</span>';
                        }
                        else if($get_all_reservation->status == '2'){
                        $status .= '<span class="label label-Primary reject">Inprogress</span>';
                        }
                        else if($get_all_reservation->status == '3'){
                        $status .= '<span class="label label-success reject">Confirmed</span>';
                        }
                        else if($get_all_reservation->status == '4'){
                        $status .= '<span class="label label-warning reject">Reservation Pending</span>';
                        }
                        else if($get_all_reservation->status == '5'){
                        $status .= '<span class="label label-primary reject">Cancel Inprogress</span>';
                        }
                        else if($get_all_reservation->status == '6'){
                        $status .= '<span class="label label-primary reject">Cancelled</span>';
                        }
                        else if($get_all_reservation->status == '7'){
                        $status .= '<span class="label label-warning reject">Trip Pending</span>';
                        }
                        else if($get_all_reservation->status == '8'){
                        $status .= '<span class="label label-danger reject">Trip Closed</span>';
                        }
                        return $status.'';
                    })
                
                ->addColumn('action', function ($get_all_reservation) {
                  return '<center><a href="'.url('partnerreservationdetail/'.Crypt::encryptString($get_all_reservation->reservation_id).'').'" class="on-default edit-row" title="" target=""><i class="fa fa-eye" data-toggle="tooltip" title="reservation_details!"></i></a></center>';

                    }) 
             ->rawColumns(array("reservation_id","phone","first_name","start_date","return_date","status","action","crypt_id","vehicle_no"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
   
    public function get_all_partner_filter_reservation_list(Request $req){
        $partner_id = Session::get('user_id');
        $curent_date = date('Y-m-d'); 
        $get_all_reservation = DB::table('reservation_details as rd')
                                ->where('rd.partner_id',$partner_id)
                                ->get();
        try {
            $filter_status = $req->status;
            $filter_email = $req->email;
            $filter_vechicle_id = $req->vechicle_id;
            $filter_reservation_id = $req->reservation_id;
            $filter_location = $req->city;
            $filter_start_date = $req->start_date;
            $filter_return_date = $req->return_date;
            $filter_from = $req->filter_from;
            
            
            if($filter_from == '1'){
                $get_all_reservation = DB::table('reservation_details as rd')
                                ->where('rd.partner_id',$partner_id);
                if(!empty($filter_status)){
                    $get_all_reservation->where('rd.status',$filter_status);
                }
                if(!empty($filter_location)){
                    $get_all_reservation->where('rd.city',$filter_location);
                }
                if(!empty($filter_email)){
                    $get_all_reservation->where('rd.email',$filter_email);
                }
                if(!empty($filter_vechicle_id)){
                    $get_all_reservation->where('rd.vechicle_id',$filter_vechicle_id);
                }
                if(!empty($filter_reservation_id)){
                    $get_all_reservation->where('rd.reserve_unique_id',$filter_reservation_id);
                }
                if(!empty($filter_start_date)){
                    $get_all_reservation->where('rd.start_date',$filter_start_date);
                }
                if(!empty($filter_return_date)){
                    $get_all_reservation->where('rd.return_date',$filter_return_date);
                }
                $result= $get_all_reservation->get();
            }else if($filter_from == '2'){
                $get_all_reservation =  DB::table('reservation_details as rd')
                                        ->where('rd.partner_id',$partner_id)
                                        ->whereDay('rd.created_at', '=', date('d'));
                $result= $get_all_reservation->get();        
            }
            else if($filter_from == '3'){
                $get_all_reservation =  DB::table('reservation_details as rd')
                                        ->where('rd.partner_id',$partner_id)
                                        ->whereDate('rd.start_date', '>=', date('Y-m-d'));
                                        
                $result= $get_all_reservation->get();        
            }
                               
            return Datatables::of($result)
                ->addColumn('reservation_id', function ($get_all_reservation) {
                        $reservation_id = '';
                        $reservation_id .= '<center>'.ucfirst($get_all_reservation->reserve_unique_id).'</center>';
                       return $reservation_id.'';
                    })
                ->addColumn('phone', function ($get_all_reservation) {
                        $phone = '';
                        $phone .= '<center>'.$get_all_reservation->phone.'</center>';
                       return $phone.'';
                    })  
                ->addColumn('first_name', function ($get_all_reservation) {
                        $first_name = '';
                        $first_name .= '<center>'.$get_all_reservation->first_name.'</center>';
                       return $first_name.'';
                    })
                ->addColumn('vehicle_no', function ($get_all_reservation) {
                    $vehicle_no = '';
                    $vehicle_no .= '<center>'.ucfirst($get_all_reservation->vehicle_reg_no).'</center>';
                   return $vehicle_no.'';
                })
                ->addColumn('start_date', function ($get_all_reservation) {
                    $start_date = '';
                    $start_date .= '<center>'.ucfirst($get_all_reservation->start_date).'</center>';
                   return $start_date.'';
                })
                ->addColumn('return_date', function ($get_all_reservation) {
                    $return_date = '';
                    $return_date .= '<center>'.ucfirst($get_all_reservation->return_date).'</center>';
                   return $return_date.'';
                })
                ->addColumn('sst', function ($get_all_reservation) {
                    $sst = $get_all_reservation->status;
                    return $sst;
                    })
                ->addColumn('crypt_id', function ($get_all_reservation) {
                    $reser_list = Crypt::encryptString($get_all_reservation->reservation_id);
                   return $reser_list.'';
                })
               ->addColumn('status', function ($get_all_reservation) {
                        $status = '';
                        if($get_all_reservation->status == '1'){
                        $status .= '<span class="label label-Primary reject">New</span>';
                        }
                        else if($get_all_reservation->status == '2'){
                        $status .= '<span class="label label-Primary reject">Inprogress</span>';
                        }
                        else if($get_all_reservation->status == '3'){
                        $status .= '<span class="label label-success reject">Confirmed</span>';
                        }
                        else if($get_all_reservation->status == '4'){
                        $status .= '<span class="label label-warning reject">Reservation Pending</span>';
                        }
                        else if($get_all_reservation->status == '5'){
                        $status .= '<span class="label label-primary reject">Cancel Inprogress</span>';
                        }
                        else if($get_all_reservation->status == '6'){
                        $status .= '<span class="label label-primary reject">Cancelled</span>';
                        }
                        else if($get_all_reservation->status == '7'){
                        $status .= '<span class="label label-warning reject">Trip Pending</span>';
                        }
                        else if($get_all_reservation->status == '8'){
                        $status .= '<span class="label label-danger reject">Trip Closed</span>';
                        }
                        return $status.'';
                    })
                
                ->addColumn('action', function ($get_all_reservation) {
                  return '<center><a href="'.url('partnerreservationdetail/'.Crypt::encryptString($get_all_reservation->reservation_id).'').'" class="on-default edit-row" title="" target=""><i class="fa fa-eye" data-toggle="tooltip" title="reservation_details!"></i></a></center>';

                    }) 
             ->rawColumns(array("reservation_id","phone","first_name","start_date","return_date","status","action","crypt_id","vehicle_no"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    public function partnerreservationdetail(Request $req){
        $reservation_id = Crypt::decryptString($req->id);
        $partner_id = Session::get('user_id');
        $reserv_details = DB :: table('reservation_details')
                        ->where('reservation_id',$reservation_id)
                        ->get();
        
        $vehicle_id = $reserv_details[0]->vehicle_id;
                       
        $vehicle_details = DB :: table('vehicle_details')
                            ->where('vehicle_id',$vehicle_id)
                            ->get();
                          
        
        $partner_details = DB :: table('reservation_details as rd')
                            ->join('partner_details as pd','rd.partner_id','pd.partner_id')
                            ->select('pd.partner_name')
                            ->where('rd.reservation_id',$reservation_id)
                            ->get();
                            
        $pick_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.pick_up_location_id')
                                ->select('lm.location_name','lm.location_master_id')
                                ->where('rd.reservation_id',$reservation_id)
                                ->get();
                                
        $drop_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.drop_location_id')
                                ->select('lm.location_name','lm.location_master_id')
                                ->where('rd.reservation_id',$reservation_id)
                                ->get();
                                
        $comment = DB::table('comments as cs')
                        ->where('cs.reservation_id',$reservation_id)
                        ->where('cs.comment_from',1)
                        ->orderBy('cs.comment_date', 'asc')
                        ->get();
                        

        $partnercomment = DB::table('comments as cs')
                        ->where('cs.reservation_id',$reservation_id)
                        ->where('cs.comment_from',2)
                        ->orderBy('cs.comment_date', 'asc')
                        ->get(); 

        $baby_seats = DB::table('vehicle_features')
                            ->where('vehicle_id',$reserv_details[0]->vehicle_id)
                            ->where('option_name',26)->count();  
       
        if(($reserv_details[0]->start_date != '')||($reserv_details[0]->return_date != '')||($reserv_details[0]->vehicle_id != '')){
            $from_date = $reserv_details[0]->start_date;
            $to_date = $reserv_details[0]->return_date;
            $vehicle_id = $reserv_details[0]->vehicle_id;
            $vehicle_rent = DB::table('manage_vehicle_rent as mvr')
                                ->select('mvr.vehicle_id',
                                                 DB::raw("count(mvr.date) as total_days"),
                                                 DB::raw("sum(mvr.rent) as special_rent"))
                                ->whereBetween('mvr.date', [$from_date, $to_date] )
                                ->where('vehicle_id',$vehicle_id)
                                ->groupBy('mvr.vehicle_id')
                                ->get();
                    if($vehicle_rent->count() != 0){
                        $vehicle_rent = $vehicle_rent[0]->special_rent;        
                    }else{
                        $vehicle_rent = "0";
                    }
               $date1 = strtotime($from_date);
               $date2 = strtotime($to_date);
           $reservation_days1 = $date1-$date2;
           $reservation_days11 = round($reservation_days1 / (60 * 60 * 24));
           if($reservation_days11 != 0){
              $reservation_days = $reservation_days11;
           }else{
              $reservation_days = 1;
           }
        }else{
                $vehicle_rent = 0;
        }                    
         $vehicle_addons = DB::table('vehicle_features as vf')
                            ->join('master_data as md','vf.option_name','md.master_data_id')
                            ->where('vf.vehicle_id',$vehicle_id)
                            ->where('vf.features_for',2)
                            ->get();
        $total_addons_values = DB::table('vehicle_features')
                            ->where('vehicle_id',$vehicle_id)
                            ->where('features_for',2)
                            ->select('vehicle_id',DB::raw("sum(addon_value) as addon_total"))
                            ->groupBy('vehicle_id')
                            ->get();
        
        return view('partner_dashboard/partnerreservationdetail')
                     ->with('reservation_id', $reservation_id)
                     ->with('reserv_details', $reserv_details)
                     ->with('vehicle_details', $vehicle_details)
                     ->with('partner_details', $partner_details)
                     ->with('comment', $comment)
                     ->with('partnercomment', $partnercomment)
                     ->with('partner_id', $partner_id)
                     ->with('baby_seats', $baby_seats)
                     ->with('reservation_days', $reservation_days)
                     ->with('vehicle_rent', $vehicle_rent)
                     ->with('vehicle_addons', $vehicle_addons)
                     ->with('total_addons_values', $total_addons_values)
                     ->with('pick_up_location', $pick_up_location)
                     ->with('drop_up_location', $drop_up_location);
    }
    
  
    
    public function partner_send_message(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                        'reservation_id' => $req->reservation_id,
                        'comment' => $req->partner_msg,
                        'admin_id' => '0',
                        'sent_from' => $req->partner_id,
                        'partner_id' => $req->partner_id,
                        'comment_from' => '2',
                        'comment_date' => $curent_date,
                        );
       
        DB::table('comments')->insert($data);
        return json_encode('success');
    }
    
    
    
    public function distributor(){
        return view('admin_dashboard/distributor');
    }
 	public function managestylecode(){
        return view('admin_dashboard/managestylecode');
    }
 	public function orderlist(){
        return view('admin_dashboard/orderlist');
    }
 	public function orderdistributor(){
        return view('admin_dashboard/orderdistributor');
    }
 	public function viewowner(){
        return view('admin_dashboard/viewowner');
    }
 	public function ownerdocument(){
        return view('admin_dashboard/ownerdocument');
    }
 	public function ownerdashboard(){
        return view('admin_dashboard/ownerdashboard');
    }
}