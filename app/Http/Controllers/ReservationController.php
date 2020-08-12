<?php
namespace App\Http\Controllers;
use App\User;
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
use Illuminate\Support\Facades\Password;

class ReservationController extends Controller
{
    public function reservationlist(){
        return view('admin_dashboard/reservationlist');
    }
    
    public function get_all_reservation_list(){
        try {
           $get_all_reservation = DB::table('reservation_details')->where('status','!=','7')->get();
                            
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
                        if($get_all_reservation->status == '3'){
                            $status .= '<span class="label label-success reject">Confirmed</span>';
                        }else if($get_all_reservation->status == '6'){
                            $status .= '<span class="label label-warning reject">Cancelled</span>';
                        }else{
                            $status .= '<span class="label label-primary reject">Inprogress</span>';
                        }
                        return $status.'';
                    })
                
                ->addColumn('action', function ($get_all_reservation) {
                  return '<center><a href="'.url('reservations_details/'.Crypt::encryptString($get_all_reservation->reservation_id).'').'" class="on-default edit-row" title="" target=""><i class="fa fa-eye" data-toggle="tooltip" title="reservation_details!"></i></a></center>';

                    }) 
             ->rawColumns(array("reservation_id","phone","first_name","start_date","return_date","status","action","crypt_id"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    public function filter_get_all_reservation_list(Request $req){
        try {
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
                $get_all_reservation = DB::table('reservation_details')->where('status','!=','7');
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
                $get_all_reservation = DB::table('reservation_details')
                                        ->whereDay('created_at', '=', date('d'));
                $result= $get_all_reservation->get();        
            }
            else if($filter_from == '2'){
                $get_all_reservation = DB::table('reservation_details')
                                        ->whereDay('created_at', '=', date('d'));
                $result= $get_all_reservation->get();        
            }
            else if($filter_from == '3'){
                $get_all_reservation = DB::table('reservation_details')
                                        ->where('start_date', '>=', date('Y-m-d'));
                $result= $get_all_reservation->get();        
            }
                               
            return Datatables::of($result)
                ->addColumn('reservation_id', function ($result) {
                        $reservation_id = '';
                        $reservation_id .= '<center>'.ucfirst($result->reservation_id).'</center>';
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
                ->addColumn('sst', function ($result) {
                    $sst = $result->status;
                    return $sst;
                    })
                ->addColumn('crypt_id', function ($result) {
                    $reser_list = Crypt::encryptString($result->reservation_id);
                   return $reser_list.'';
                })
                ->addColumn('status', function ($result) {
                        $status = '';
                        if($result->status == '3'){
                            $status .= '<span class="label label-success reject">Confirmed</span>';
                        }else if($result->status == '6'){
                            $status .= '<span class="label label-warning reject">Cancelled</span>';
                        }else{
                            $status .= '<span class="label label-primary reject">Inprogress</span>';
                        }
                        return $status.'';
                    })
                ->addColumn('action', function ($result) {
                  return '<center><a href="'.url('reservations_details/'.Crypt::encryptString($result->reservation_id).'').'" class="on-default edit-row" title="" target=""><i class="fa fa-eye" data-toggle="tooltip" title="reservation_details!"></i></a></center>';

                    }) 
             ->rawColumns(array("reservation_id","phone","first_name","start_date","return_date","status","action","crypt_id"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
 
    public function change_reservation_details(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $reservation_info = DB::table('reservation_details')->where('reservation_id',$req->reservation_id)->get();
        $db = new General();
        if($req->status == '2'){
            $user_data = array(
                'name' => $reservation_info[0]->name,
                'email' => $reservation_info[0]->email, 
                'password' => Hash::make($reservation_info[0]->phone),  
                'role' => '3',
                'user_id' => $req->reservation_id,
                'created_at' => $curent_date,
            );
            $db->insert('users',$user_data);
            $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            );
            $db->updates('reservation_details',$data,'reservation_id',$req->reservation_id);
            $to_name = $reservation_info[0]->name;
            $to_email = $reservation_info[0]->email;
            $password = $reservation_info[0]->phone;
            $mdata1 = array('name'=>$to_name,'email'=>$to_email,'password'=>$password);
            Mail::send('mail_content.welcome_new_owner', $mdata1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                        ->subject('Trenty.Go | Reservation Conformed');
                $message->from('info@decorbazaar.in','Trenty.Go');
                $message->cc('vinoth@coralmint.in');
                /*$message->bcc('bhavithra.t@coralmint.in');*/
            });
        }
        else{
            $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            ); 
            $db->updates('reservation_details',$data,'reservation_id',$req->reservation_id);
        }
        return json_encode('success');
    }
    
    public function get_vehicle_list_asssign(Request $req){
        $reservation_id = $req->reservation_id;
        $from_date = $req->from_date;
        $to_date = $req->to_date;
        $location = $req->location;
        $filtered_vehicle = DB::table('partner_details as pd')
                                ->leftJoin('vehicle_details as vd','pd.partner_id','vd.partner_id')
                                ->join('manage_vehicle_rent as mvr', function($join) use ($from_date,$to_date){
                                    $join->on('vd.vehicle_id', 'mvr.vehicle_id')
                                        ->where('mvr.available_status', 1)
                                        ->whereBetween('mvr.date', [$from_date, $to_date] );
                                    })
                                ->join('reservation_details as rd', function($join){
                                    $join->on('vd.vehicle_id', 'rd.vehicle_id')
                                        ->whereIn('rd.status', [6, 8]);
                                    })
                                ->whereRaw("find_in_set($location,pd.offered_location)")
                                ->where('pd.status',3)
                                ->select('vd.*','pd.*')
                                ->get();
        if($filtered_vehicle->count() > 0){
            $output = '';
            
             $output .= '<table class="table table-bordered dataTable no-footer mobile-table" style="table-layout:fixed; width: 100%;">
                         <thead>
                            <tr>
                               <th style="width: 15px !important;">#</th>
                               <th>Partner ID</th>
                               <th>Partner Name</th>
                               <th>Vehicle Model</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>';
                foreach($filtered_vehicle as $key=>$fv){
                    $i = $key+1;
            $output .= ' <tr>
                            <td>'.$i.'</td>
                            <td>'.$fv->unique_partner_id.'</td>
                            <td>'.$fv->partner_name.'</td>
                            <td>'.$fv->vehicle_reg_no.'</td>
                            <td><span class="btn btn-primary" onClick="assign_new_vehicle_function('.$reservation_id.','.$fv->vehicle_id.');">Assign</a></td>
                         </tr>';
                }
            $output .= ' </tbody>
                        </table>';
        }else{
            $output = '<center><span>No Vehicle found !!!</span></center>';
        }
        echo json_encode($output);
    }
    
    
    public function assign_new_vehicle(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $reservation_id = $req->reservation_id;
        $vehicle_id = $req->vehicle_id;
        $assign_start_date = $req->assign_start_date;
        $assign_return_date = $req->assign_return_date;
        $info = DB::table('reservation_details')
                    ->where('reservation_id',$req->reservation_id)
                    ->get();
        $db = new General();
        $updated_data = array(
                'vehicle_id' => $vehicle_id,
                'partner_id' => $info[0]->partner_id,
                'vehicle_reg_no' => $req->update_doc_type,
                'modified_at' => $curent_date
            );
        $line_item_data = array(
                'reservation_id' => $reservation_id,
                'start_date' => $assign_start_date,
                'return_date' => $assign_return_date,
                'vehicle_id' => $vehicle_id,
            );
        $db->updates('reservation_details',$updated_data,'reservation_id',$req->reservation_id);
        $db->insert('reservation_line_item',$line_item_data);
        return json_encode('success');
    }
    
    public function add_trip_details(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $reservation_id = $req->reservation_id;
        $info = DB::table('reservation_details')
                    ->where('reservation_id',$req->reservation_id)
                    ->get();
        $db = new General();
        $data = array(
                'reservation_id' => $info[0]->reserve_unique_id,
                'vehicle_id' => $info[0]->vehicle_id,
                'partner_id' => $info[0]->partner_id,
                'customer_id' => $info[0]->customer_id,
                'license_number' => $info[0]->license_number,
                'license_issue_date' => $info[0]->license_issue_date,
                'license_issued_country' => $info[0]->license_issued_country,
                'pick_up_location_id' => $info[0]->pick_up_location_id,
                'key_given_by' => $req->key_given_user,
                'default_rent' => $info[0]->vehicle_default_rent,
                'addon_values' => $info[0]->addon_values,
            );
        $db->insert('trip_details',$data);
        $inserted_id = DB::getPdo()->lastInsertId();
        $unique_id = 'TGT000'.$inserted_id;
        $trip_updated_data = array(
                'trip_id' => $unique_id,
                'modified_at' => $curent_date
            );
        $reservation_updated_data = array(
                'status' => 7,
                'modified_at' => $curent_date
            );
        $db->updates('trip_details',$trip_updated_data,'trip_details_id',$inserted_id);
        $db->updates('reservation_details',$reservation_updated_data,'reservation_id',$reservation_id);
        return json_encode('success');
    }
    
    public function upload_trip_vehicle_pic(Request $req){
        if (!file_exists('upload/'.$req->reservation_id.'/vehicle_image/'.$req->image_type.'/')) {
            mkdir('upload/'.$req->reservation_id.'/vehicle_image/'.$req->image_type.'/', 0777, true);
        }
        $output_dir = 'upload/'.$req->reservation_id.'/vehicle_image/'.$req->image_type.'/';
        if(isset($_FILES["myfile"]))
        {
            if(!is_array($_FILES["myfile"]["name"])) //single file
            {
                $fileName = $_FILES["myfile"]["name"];
                $duplicate_fileName = $req->vehicle_id.'vehicle_image';
                $ext = (explode(".", $fileName));
                $file_ext = $ext[1];
                $tags = $req->tags;
                $direction = $req->direction;
                $product_id = $req->product_id;
                $image_url = "http://coralmint.in/garments/upload/$req->product_id/product_image/$fileName";
                $ret[]= $fileName;
                $data = array(
                                'vehicle_id' => $product_id,
                                'reservation_id' => $product_id,
                                'trip_id' => $product_id,
                                'partner_id' => $product_id,
                                'file_for' => $duplicate_fileName.$direction,
                                'file_detail' => $file_ext,
                                'file_type' => $image_url,
                                'file_name' => $direction,
                                'file_desc' => $direction,
                                'file_ext' => $direction,
                                'file_orginal_name' => $fileName,
                                 );
                // echo $fileName.$output_dir ;
                DB::table('product_image')->insert($data);                
                move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
            }
            else  //Multiple files, file[]
            {
              $fileCount = count($_FILES["myfile"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                $fileName = $_FILES["myfile"]["name"][$i];
                $duplicate_fileName = Session::get('user_id').$req->category.'project_img'[$i];
                $ret[]= $fileName;
              }            
            }            
            echo json_encode($ret);
        }
    }
    
}