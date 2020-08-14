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
use PDF;

class AdminController extends Controller
{
    public function index(){
        $role = Session::get('role');
        
        if($role == 1)
        {
        $partner_location = DB::table('partner_details')->select('partner_area')->groupBy('partner_area')->get();
            return view('admin_dashboard/partner_list')
                    ->with('partner_location',$partner_location);
        }else if($role == 2){
            $partner_id = Session::get('user_id');
            $profile_info = DB::table('partner_details')->where('partner_id',$partner_id)->get();
            $all_messages = DB::table('admin_partner_messages')->where('partner_id',$partner_id)->get();
            $read_messages = DB::table('admin_partner_messages')->where('partner_id',$partner_id)->where('status',2)->get();
            $unread_messages = DB::table('admin_partner_messages')->whereNotNull('admin_id')->where('partner_id',$partner_id)->where('status',1)->get();
            $unread_msg_count = DB::table('admin_partner_messages')->whereNotNull('admin_id')->where('partner_id',$partner_id)->where('status',1)->count();
            $vehicle_brand_list = DB::table('master_data')
                                            ->where('master_for','vehicle_option')
                                            ->where('master_key','brand')
                                            ->where('status',1)
                                            ->get(); 
            // $vehicle_details = DB::table('partner_details as pd')
            //             ->leftJoin('vehicle_details as vd', 'pd.partner_id', 'vd.partner_id')
            //             ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
            //             ->leftJoin('document_details as dd','vd.vehicle_id', 'dd.vehicle_id')
            //             ->select('vd.vehicle_id','pd.partner_id','vd.partner_id','vd.vehicle_model','vd.vehicle_brand','vd.vehicle_seat_type','md.master_data_id','md.master_value',
            //             'dd.file_path','dd.file_url','dd.file_orginal_name') 
            //             ->where('pd.partner_id',$partner_id)
            //             ->get();
            
            $vehicle_details = DB::table('vehicle_details as vd')
                        ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
                        ->leftJoin('master_data as md1', 'vd.vehicle_seat_type', 'md1.master_data_id')
                        
                        ->leftJoin('document_details as dd', function ($join) {
                                $join->on('vd.vehicle_id', 'dd.vehicle_id')
                                     ->where('dd.file_for', 'image_document')
                                     ->where('dd.created_at', '=', DB::raw("(select max(`created_at`) from document_details)"));
                            })
                            
                        ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model',
                                    'md.master_value as vehicle_brand',
                                    'md1.master_value as vehicle_seat_type','dd.file_url','md.master_value')
                        ->where('vd.partner_id',$partner_id)
                        ->get();
                        
            $unpublished_vehicle_count = DB::table('vehicle_details')->where('partner_id',$partner_id)->where('status',1)->count();
            $resend_info = DB::table('resend_info')->where('partner_id',$partner_id)->where('status',1)->get();
            $trentygo_locations = DB::table('location_master')->where('status',1)->get();
            $get_all_reservation = DB::table('reservation_details as rd')
                                ->join('vehicle_details as vd','rd.vehicle_id','vd.vehicle_id')
                                ->select('rd.vehicle_id','rd.first_name')
                                ->where('rd.partner_id',$partner_id)
                                ->get();
            $bank_details = DB::table('bank_details')
                            ->where('partner_id',$partner_id)
                            ->get();
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
                        ->with('trentygo_locations', $trentygo_locations)
                        ->with('get_all_reservation', $get_all_reservation)
                        ->with('bank_details', $bank_details);
        }else if($role == 3){
            $reserved_vehicle_id = Session::get('reserved_vehicle_id');
            $log_from = Session::get('log_from');
            $encrypt_id = Crypt::encryptString($reserved_vehicle_id);
            if($log_from == 'reservation'){
                $countries = $this->countries();
                $customer_id = Session::get('user_id');
                $customer_info = DB::table('customer_details')->where('customer_id',$customer_id)->get();
                
                if($customer_info[0]->customer_name != ''){
                    $user_name = "Wellcome !!!";
                }else{
                    $user_name = $customer_info[0]->customer_name;
                }
                Session::put('user_name',$user_name);
                $vehicle_info = DB::table('vehicle_details as vd')
                                    ->leftJoin('document_details as dd', function ($join) {
                                        $join->on('vd.vehicle_id', '=', 'dd.vehicle_id')
                                             ->where('dd.file_for', '=', 'image_document')
                                             ->where('dd.document_details_id',
                                             DB::raw("(select max(`document_details_id`) from document_details as dd1 where dd1.vehicle_id=vd.vehicle_id and dd1.file_for= dd.file_for  )"))
                                             ;
                                    })
                                    ->leftJoin('master_data as md', 'vd.vehicle_type', 'md.master_data_id')
                                    ->select('vd.*','dd.file_url','dd.file_path','md.master_value','md.image_url')
                                    ->where('vd.vehicle_id',$customer_info[0]->vehicle_id)
                                    ->get();
                // $available_dates1 = implode(',', $available_dates1);       
                $trentygo_location = DB::table('location_master')->where('status',1)->get();
                $add_on_features = DB::table('master_data as md')
                            ->leftJoin('vehicle_features as vf','md.master_data_id','=','vf.option_name')
                            ->where('md.master_for','vehicle_option')
                            ->where('md.master_key','add_on')
                            ->where('md.status',1)
                            ->where('vf.vehicle_id',$reserved_vehicle_id)
                            ->get(); 
                           
                return view('TrentyGo/reservationdetail')
                        ->with('customer_info',$customer_info)
                        ->with('countries',$countries)
                        ->with('vehicle_info',$vehicle_info)
                        ->with('trentygo_location',$trentygo_location)
                        ->with('customer_id',$customer_id)
                        ->with('add_on_features',$add_on_features);
            }else{
                $customer_id = Session::get('user_id');
                $customer_info = DB::table('customer_details')->where('customer_id',$customer_id)->get();
                $cus_reserv_details = DB :: table('reservation_details')
                                ->where('customer_id',$customer_id)
                                ->get();
                $pick_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.pick_up_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.pick_up_location_id')
                                ->where('rd.reservation_id',$customer_id)
                                ->get();
                                
                $drop_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.drop_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.drop_location_id')
                                ->where('rd.reservation_id',$customer_id)
                                ->get();
                                
                $partner_details = DB :: table('reservation_details as rd')
                            ->join('partner_details as pd','rd.partner_id','pd.partner_id')
                            ->select('pd.partner_name')
                            ->where('rd.reservation_id',$customer_id)
                            ->get(); 
                            
                $vehicle_details = DB :: table('vehicle_details')
                            ->where('vehicle_id',$cus_reserv_details[0]->vehicle_id)
                            ->get();  
                            
                $baby_seats = DB::table('vehicle_features')
                                    ->where('vehicle_id',$cus_reserv_details[0]->vehicle_id)
                                    ->where('option_name',26)->count();            
                $partnercomment = DB::table('comments as cs')
                                    ->where('cs.reservation_id',$customer_id)
                                    ->where('cs.comment_from',2)
                                    ->orderBy('cs.comment_date', 'asc')
                                    ->get();
                return view('customer_dashboard/customer_dashboard')
                                ->with('customer_id',$customer_id)
                                ->with('customer_info',$customer_info)
                                ->with('cus_reserv_details',$cus_reserv_details)
                                ->with('pick_up_location',$pick_up_location)
                                ->with('drop_up_location',$drop_up_location)
                                ->with('partner_details',$partner_details)
                                ->with('vehicle_details',$vehicle_details)
                                ->with('baby_seats',$baby_seats)
                                ->with('partnercomment',$partnercomment);
                    }
        }else{
            return view('admin_dashboard/dashboard');
        }
    }
    public function master_table(){
        $master_list = DB::table('master_data')
                            ->select('master_key as value')
                            // ->where('master_for','vehicle_option')
                            ->where('status',1)
                            ->groupBy('master_key')
                            ->get();
        return view('admin_dashboard/master_table')
                            ->with('master_list',$master_list);
    }
    public function partner_list(){
        $partner_location = DB::table('partner_details')->select('partner_area')->groupBy('partner_area')->get();
        return view('admin_dashboard/partner_list')
                    ->with('partner_location',$partner_location);
    }
    public function partner_get_all_upcoming_reservation(){
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


    public function partner_filter_get_all_upcoming_reservation_lists(Request $req){
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
    public function add_reservation_form(){ 
        return view('admin_dashboard/add_reservation_form');
    }
    public function partnerlistnew(){ 
        return view('admin_dashboard/partnerlistnew');
    }
    public function triphistory(){
        return view('admin_dashboard/triphistory');
    }
    public function reservationpay(){
        return view('admin_dashboard/reservationpay');
    }
     public function customerbookingcancel(){
        return view('admin_dashboard/customerbookingcancel');
    }
    public function newvehicle(){
        return view('admin_dashboard/newvehicle');    }
    public function bookingcancel(){
        return view('admin_dashboard/bookingcancel');
    }
    
     public function partnertriplist(){
        return view('admin_dashboard/partnertriplist');
    }
     public function customerportal(){
        return view('admin_dashboard/customerportal');
    }
    public function reservations(){
        return view('admin_dashboard/reservations');
    }
     
    public function invoice_pdfview(Request $request){
        $reservation_id = Crypt::decryptString($request->id);
        $rent_array = array();
        $date_array = array();
        $all_date_array = array();
        $default_array = array();
        $reserv_details = DB :: table('reservation_details')
                        ->where('reservation_id',$reservation_id)
                        ->get();
        $Variable1 = strtotime($reserv_details[0]->start_date);
        $Variable2 = strtotime($reserv_details[0]->return_date);
        for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) {
            $Store = date('d-m-Y', $currentDate); 
            $date_value = DB::table('manage_vehicle_rent as mvr')->where('mvr.date',$Store)->where('mvr.vehicle_id',$reserv_details[0]->vehicle_id)->get();
            // $all_date_array = $Store;
            array_push($all_date_array, $Store);
            foreach($date_value as $dv){
                array_push($rent_array, $dv->rent);
                array_push($date_array, $dv->date);
            }
        }
        $default_count=count(array_diff($all_date_array,$date_array));
        $default_array = array_values(array_diff($all_date_array,$date_array));
        $vehicle_addons = DB::table('vehicle_features as vf')
                            ->join('master_data as md','vf.option_name','md.master_data_id')
                            ->where('vf.vehicle_id',$reserv_details[0]->vehicle_id)
                            ->where('vf.features_for',2)
                            ->get();
        $total_addons_values = DB::table('vehicle_features')
                            ->where('vehicle_id',$reserv_details[0]->vehicle_id)
                            ->where('features_for',2)
                            ->select('vehicle_id',DB::raw("sum(addon_value) as addon_total"))
                            ->groupBy('vehicle_id')
                            ->get();
        
        if($request->has('download')){
            $pdf = PDF::loadView('mail_content.invoice',compact('reserv_details','rent_array','date_array','default_array','vehicle_addons','total_addons_values'));
            return $pdf->download('Rent reoprt.pdf');
        }
        return view('invoice');
        
    }
    
    // public function invoice(Request $req){
    //     $reservation_id = Crypt::decryptString($req->id);
    //     $reserv_details = DB :: table('reservation_details')
    //                     ->where('reservation_id',$reservation_id)
    //                     ->get();
    //     return view('admin_dashboard/invoice')
    //                 ->with('reserv_details',$reserv_details)
    //                 ->with('reservation_id',$reservation_id);
    // }
    
    public function reservations_details(Request $req){
        
        $reservation_id = Crypt::decryptString($req->id);
        
        $reservation_detail = DB :: table('reservation_details as rd')
                                    ->join('partner_details as pd','rd.partner_id','pd.partner_id')
                                    ->join('vehicle_details as vd','rd.vehicle_id','vd.vehicle_id')
                                    ->where('rd.reservation_id',$reservation_id)
                                    ->get();
        $partner_locations = DB::table('location_master as lm')
                                ->where('status',1)
                                ->get();
                                
        $pick_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.pick_up_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.pick_up_location_id')
                                ->where('rd.reservation_id',$reservation_id)
                                ->get();
                                
        $drop_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.drop_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.drop_location_id')
                                ->where('rd.reservation_id',$reservation_id)
                                ->get();                         
        
        $reserv_details = DB :: table('reservation_details')
                        ->where('reservation_id',$reservation_id)
                        ->get();
                        
        // $vehicle_details = DB :: table('reservation_details as rd')
        //                     ->join('vehicle_details as vd','rd.vehicle_id','vd.vehicle_id')
        //                     ->select('vd.vehicle_seat_count','vd.vehicle_model')
        //                     ->get();
        
        $vehicle_id = $reserv_details[0]->vehicle_id;
        
        $vehicle_details = DB :: table('vehicle_details')
                            ->where('vehicle_id',$vehicle_id)
                            ->get();
        $partner_details = DB :: table('reservation_details as rd')
                            ->join('partner_details as pd','rd.partner_id','pd.partner_id')
                            ->select('pd.partner_name')
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
           $reservation_days1 = $date2-$date1;
        //   print_r($reservation_days1);
        //   die();
           $reservation_days11 = round($reservation_days1 / (60 * 60 * 24));
           if($reservation_days11 != 0){
              $reservation_days = $reservation_days11;
           }else{
              $reservation_days = 1;
           }
        }else{
                $vehicle_rent = 0;
        }
        $baby_seats = DB::table('vehicle_features')
                            ->where('vehicle_id',$reserv_details[0]->vehicle_id)
                            ->where('option_name',26)->count();
                            
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
        return view('admin_dashboard/reservations_details')
                    ->with('reservation_id', $reservation_id)
                     ->with('reserv_details', $reserv_details)
                     ->with('vehicle_details', $vehicle_details)
                     ->with('partner_details', $partner_details)
                     ->with('comment', $comment)
                     ->with('partnercomment', $partnercomment)
                     ->with('vehicle_rent', $vehicle_rent)
                     ->with('baby_seats', $baby_seats)
                     ->with('reservation_days', $reservation_days)
                     ->with('vehicle_addons', $vehicle_addons)
                     ->with('total_addons_values', $total_addons_values)
                     ->with('reservation_detail', $reservation_detail)
                     ->with('partner_locations', $partner_locations)
                     ->with('pick_up_location', $pick_up_location)
                     ->with('drop_up_location',$drop_up_location);
    }
    
     public function add_customer_details(Request $req){
            DB::table('reservation_details')
                ->updateOrInsert(
                    ['reservation_id' => $req->reservation_id],
                    ['first_name' => $req->first_name,
                    'last_name' => $req->last_name,
                    'phone' => $req->phone,
                    'email' => $req->email,
                    'dob' => $req->dob,
                    'door_no' => $req->door_no,
                    'appartment_name' => $req->appartment_name,
                    'street_name' => $req->street_name,
                    'city' => $req->city,
                    'state' => $req->state,
                    'pincode' => $req->pincode,
                    'country_code' => $req->country_code,]
                );
            return json_encode('success');
        
    }
    
    public function add_billing_details(Request $req){
        $db = new General();
        $reserv_info = DB::table('reservation_details')->where('reservation_id',$req->reservation_id)->get();
        if($req->check_value == '1'){
            if($reserv_info[0]->first_name != ''){
                    $first_name = $reserv_info[0]->first_name;
                }else{
                $first_name = "";
            }
            if($reserv_info[0]->last_name != ''){
                $last_name = $reserv_info[0]->last_name;
            }else{
                $last_name = "";
            }
            if($reserv_info[0]->phone != ''){
                $phone = $reserv_info[0]->phone;
            }else{
                $phone = "";
            }
            if($reserv_info[0]->email != ''){
                $email = $reserv_info[0]->email;
            }else{
                $email = "";
            }
            if($reserv_info[0]->door_no != ''){
                $door_no = $reserv_info[0]->door_no;
            }else{
                $door_no = "";
            }
            if($reserv_info[0]->appartment_name != ''){
                $appartment_name = $reserv_info[0]->appartment_name;
            }else{
                $appartment_name = "";
            }
            if($reserv_info[0]->street_name != ''){
                $street_name = $reserv_info[0]->street_name;
            }else{
                $street_name = "";
            }
            if($reserv_info[0]->city != ''){
                $city = $reserv_info[0]->city;
            }else{
                $city = "";
            }
            if($reserv_info[0]->pincode != ''){
                $pincode = $reserv_info[0]->pincode;
            }else{
                $pincode = "";
            }
            $data = array(
                'for_first_name' =>  $first_name,
                'for_last_name' =>  $last_name,
                'for_phone' =>  $phone,
                'for_email' =>  $email,
                'for_door_no' =>  $door_no,
                'for_appartname' =>  $appartment_name,
                'for_street_name' =>  $street_name,
                'for_city' =>  $city,
                'for_pincode' =>  $pincode,
            );
        }else if($req->check_value == '2'){
            $data = array(
                'for_first_name' => '',
                'for_last_name' => '',
                'for_phone' => '',
                'for_email' => '',
                'for_door_no' => '',
                'for_appartname' => '',
                'for_street_name' => '',
                'for_city' => '',
                'for_pincode' => '',
            );
        }else{
            $data = array(
                'for_first_name' => $req->for_first_name,
                'for_last_name' => $req->for_last_name,
                'for_phone' => $req->for_phone,
                'for_email' => $req->for_email,
                'for_door_no' => $req->for_door_no,
                'for_appartname' => $req->for_appartname,
                'for_street_name' => $req->for_street_name,
                'for_city' => $req->for_city,
                'for_pincode' => $req->for_pincode,
            );
        }
        $db->updates('reservation_details',$data,'reservation_id',$req->reservation_id);
        return json_encode('success');
        
    }
    
    public function add_reserv_details(Request $req){
            DB::table('reservation_details')
                ->updateOrInsert(
                    ['reservation_id' => $req->reservation_id],
                    ['start_date' => $req->start_date,
                    'return_date' => $req->return_date,
                    'status' => $req->status,]
                );
            return json_encode('success');
        
    }
    
    public function cus_insert_message(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                        'reservation_id' => $req->reservation_id,
                        'comment' => $req->cus_msg,
                        'admin_id' => '0',
                        'sent_from' => '0',
                        'comment_from' => '1',
                        'comment_date' => $curent_date,
                        );
        // print_r('$data');
        // die();
        DB::table('comments')->insert($data);
        return json_encode('success');
    }
    
    public function part_insert_message(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                        'reservation_id' => $req->reservation_id,
                        'comment' => $req->part_msg,
                        'admin_id' => '0',
                        'sent_from' => '0',
                        'comment_from' => '2',
                        'comment_date' => $curent_date,
                        );
        // print_r('$data');
        // die();
        DB::table('comments')->insert($data);
        return json_encode('success');
    }
    
    
    public function viewmessage(){
$unread_messages = DB::table('admin_partner_messages as apm')
                    ->leftJoin('partner_details as pd', 'pd.partner_id', 'apm.partner_id')
                    
                    // ->leftJoin(DB::raw("(select max(file_url) as img_url,partner_id from document_details group by partner_id) `pi`"),'pi.partner_id','pd.partner_id')
                    
                    ->leftJoin('document_details as dd', function ($join) {
                                $join->on('apm.partner_id', 'dd.partner_id')
                                     ->where('dd.file_for', 'profile_image');
                            })
                    
                    ->leftJoin(DB::raw("(select max(comment_date) as message_date, max(comment) as message,partner_id from admin_partner_messages group by partner_id) `ld`"),'ld.partner_id','pd.partner_id')
                    ->select('pd.partner_id','pd.partner_name',DB::raw('count(pd.partner_id) as message_count'),'file_url','ld.message_date','ld.message')
                    ->groupBy('pd.partner_id','pd.partner_name','file_url','ld.message_date','ld.message')
                    ->where('apm.status',1)
                    ->get();
                        // print_r($unread_messages);
                        // die();
        return view('admin_dashboard/viewmessage')
                    ->with('unread_messages',$unread_messages);
    }
    public function rateandavailablity(){
        return view('admin_dashboard/rateandavailablity');
    }
    public function datepick(){
        return view('admin_dashboard/datepick');
    }
    
    public function vehicledetails(){
        return view('admin_dashboard/vehicledetails');
    }
    
   
    
    
    public function upload_partner_personal_document(Request $req)
    {
        if (!file_exists('upload/partner/'.$req->partner_id.'/personal_files/')) {
            mkdir('upload/partner/'.$req->partner_id.'/personal_files/', 0777, true);
        }
        $output_dir = 'upload/partner/'.$req->partner_id.'/personal_files/';
        if(isset($_FILES["myfile"]))
        {
            $ret=array();
            if(!is_array($_FILES["myfile"]["name"])) //single file 
            {
                $fileName = $_FILES["myfile"]["name"]; 
                $duplicate_fileName = $req->partner_id.'personal_files';
                $ext = (explode(".", $fileName));
                $file_ext = $ext[1];
                $image_url = "https://trentygo.coralmint.in/upload/partner/$req->partner_id/personal_files/$fileName";
                $image_path = "upload/partner/$req->partner_id/personal_files/";
                    
                $file_for = $req->file_for;
                $data = array(
                                'partner_id' => $req->partner_id,
                                'file_name' => $duplicate_fileName,
                                'file_ext' => $file_ext,
                                'file_url' => $image_url,
                                'file_path' => $image_path,
                                'file_orginal_name' => $fileName,
                                'file_for' => $file_for,
                                'file_detail' => "Personal Document",
                                );
                // echo $fileName.$output_dir ;
                DB::table('document_details')->insert($data);    
                $inserted_id = DB::getPdo()->lastInsertId();
                move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                array_push($ret, $image_url);
                array_push($ret, $fileName);
                array_push($ret, $inserted_id);
                array_push($ret, $image_path);
            }
            else  //Multiple files, file[]
            {
              $fileCount = count($_FILES["myfile"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                $fileName = $_FILES["myfile"]["name"][$i];
                $duplicate_fileName = $req->partner_id.$file_for.'personal_files'[$i];
                array_push($ret, $image_url);
                array_push($ret, $fileName);
                array_push($ret, $inserted_id);
                array_push($ret, $image_path);
              }            
            }            
            return $ret;
        }
    }
    public function upload_partner_document(Request $req){
            if($req->has('agree_doc') != ''){
                $file_for = $req->agree_doc;
                $file_detail = "Partner upoload agreement document";
            }else if($req->has('cabis_doc') != ''){
                $file_for = $req->cabis_doc;
                $file_detail = "Partner upload CABIS document";
            }else if($req->has('tax_doc') != ''){
                $file_for = $req->tax_doc;
                $file_detail = "Partner upload Tax document";
            }else if($req->has('comp_ins') != ''){
                $file_for = $req->comp_ins;
                $file_detail = "Vehicle Images";
            }else {
                $file_for = "partner document";
                $file_detail = "General document";
            }
            
            if (!file_exists('upload/partner/'.$req->partner_id.'/Company Documents/')) {
                mkdir('upload/partner/'.$req->partner_id.'/Company Documents/', 0777, true);
            }
            $output_dir = 'upload/partner/'.$req->partner_id.'/Company Documents/';
            if(isset($_FILES["myfile"]))
            {
                $ret=array();
                if(!is_array($_FILES["myfile"]["name"])) //single file
                {
                    $fileName = $_FILES["myfile"]["name"];
                    $duplicate_fileName = $req->partner_id.'Company Documents';
                    $ext = (explode(".", $fileName));
                    $file_ext = $ext[1];
                    $image_url = "https://trentygo.coralmint.in/upload/partner/$req->partner_id/Company Documents/$fileName";
                    $image_path = "upload/partner/$req->partner_id/Company Documents/";
                    $data = array(
                                    'partner_id' => $req->partner_id,
                                    'file_name' => $duplicate_fileName,
                                    'file_ext' => $file_ext,
                                    'file_url' => $image_url,
                                    'file_path' => $image_path,
                                    'file_orginal_name' => $fileName,
                                    'file_for' => $file_for,
                                    'file_detail' => $file_detail,
                                );
                    // echo $fileName.$output_dir ;
                    $old_data_count = DB::table('document_details')
                                        ->where('partner_id',$req->partner_id)
                                        ->where('vehicle_id',$req->vehicle_id)
                                        ->count();
                    // if($old_data_count == 0){
                        DB::table('document_details')->insert($data);
                        $inserted_id = DB::getPdo()->lastInsertId();
                        move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
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
                    $duplicate_fileName = $req->partner_id.'vehicle_img'[$i];
                    array_push($ret, $image_url);
                    array_push($ret, $fileName);
                    array_push($ret, $inserted_id);
                    array_push($ret, $image_path);
                  }            
                }            
                return $ret;
            }
    }
    public function partner_uilist(Request $req){
        $partner_id = Crypt::decryptString($req->id);
        $vehicle_brand_list = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','brand')
                            ->where('status',1)
                            ->get();
        // $vehicle_details11 = DB::table('partner_details as pd')
        //                     ->leftJoin('vehicle_details as vd', 'pd.partner_id', 'vd.partner_id')
        //                     ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
        //                     ->leftJoin('document_details as dd','vd.vehicle_id', 'dd.vehicle_id')
        //                     ->select('vd.vehicle_id','pd.partner_id','vd.partner_id','vd.vehicle_model','vd.vehicle_brand','vd.vehicle_seat_type','md.master_data_id','md.master_value',
        //                     'dd.file_path')
        //                     ->where('pd.partner_id',$partner_id)
        //                     ->get(); 
                            
        // $vehicle_details = DB::table('vehicle_details as vd')
        //                     ->leftJoin('master_data as md', 'vd.vehicle_brand', 'md.master_data_id')
        //                     ->leftJoin('document_details as dd','vd.vehicle_id', 'dd.vehicle_id')
        //                     ->select('vd.vehicle_id','vd.partner_id','vd.vehicle_model','vd.vehicle_brand','vd.vehicle_seat_type','md.master_value',
        //                     'dd.file_path')
        //                     ->where('vd.partner_id',$partner_id)
        //                     ->get(); 
        $resend_info = DB::table('resend_info')->where('partner_id',$partner_id)->where('status',1)->get();
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
                        // print_r($vehicle_details);
                        // die();
        $partner_info = DB::table('partner_details')->where('partner_id',$partner_id)->get();
        $all_messages = DB::table('admin_partner_messages')->where('partner_id',$partner_id)->get();
        $read_messages = DB::table('admin_partner_messages')->where('partner_id',$partner_id)->where('status',2)->get();
        $unread_messages = DB::table('admin_partner_messages')->whereNull('admin_id')->where('partner_id',$partner_id)->where('status',1)->get();
        $unread_msg_count = DB::table('admin_partner_messages')->whereNull('admin_id')->where('partner_id',$partner_id)->where('status',1)->count();
        $trentygo_locations = DB::table('location_master')->where('status',1)->get();
        $bank_details = DB::table('bank_details')
                            ->where('partner_id',$partner_id)
                            ->get();
        return view('admin_dashboard/partner_uilist')
                    ->with('partner_id',$partner_id)
                    ->with('partner_info',$partner_info)
                    ->with('vehicle_brand_list',$vehicle_brand_list)
                    ->with('read_messages',$read_messages)
                    ->with('unread_messages',$unread_messages)
                    ->with('all_messages',$all_messages)
                    ->with('unread_msg_count',$unread_msg_count)
                    ->with('vehicle_details',$vehicle_details)
                    ->with('resend_info', $resend_info)
                    ->with('trentygo_locations', $trentygo_locations)
                    ->with('bank_details', $bank_details);
    }
    public function upload_setting_images(){
        $master_list = DB::table('master_data')
                            ->select('master_value as value', 'master_data_id as id')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','add_on_services')
                            ->where('status',1)
                            ->get();
        $image_data = DB::table('master_data_images')->where('status',1)->get();
        return view('admin_dashboard/upload_setting_images')
                            ->with('image_data',$image_data)
                            ->with('master_list',$master_list);
    }
    
    public function upload_master_img(Request $req){
        $ret=array();
        if (!file_exists('upload/master_image/')) {
            mkdir('upload/master_image/', 0777, true);
        }
        $output_dir = 'upload/master_image/';
        if(isset($_FILES["myfile"]))
        {
            if(!is_array($_FILES["myfile"]["name"])) //single file
            {
                $fileName = $_FILES["myfile"]["name"];
                $duplicate_fileName = 'master_image';
                $ext = (explode(".", $fileName));
                $file_ext = $ext[1];
                $image_url = "http://coralmint.in/trentygo/upload/master_image/$fileName";
                $data = array(
                                'file_for' => 'addon_option',
                                'file_name' => $duplicate_fileName,
                                'file_ext' => $file_ext,
                                'file_url' => $image_url,
                                'file_path' => $output_dir.$fileName,
                                'file_orginal_name' => $fileName,
                            );
                DB::table('master_data_images')->insert($data);
                $inserted_id = DB::getPdo()->lastInsertId();
                array_push($ret, $inserted_id);
                array_push($ret, $image_url);
                move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
            }
            else  //Multiple files, file[]
            {
              $fileCount = count($_FILES["myfile"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                $fileName = $_FILES["myfile"]["name"][$i];
                $duplicate_fileName = Session::get('user_id').$req->category.'project_img'[$i];
              }            
            }            
            return $ret;
        }
    }
    
    public function admin_update_bank_details(Request $req){
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
    //starttrentygo
    
     public function master(){
        return view('admin_dashboard/master');
    }
    
     public function add_location_details(Request $req){
        $location_code_count = DB::table('master_data')->where('master_key',$req->location_name)->count();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
        'master_key' => $req->location_name,
        'master_value' => $req->pin_code,
        'master_for' => 'location',
        'created_at' => $curent_date,
        );
        if($location_code_count == 0){
            $db = new General();
            $db->insert('master_data',$data);
            $data = "success";
        }else{
            $data = "failed";
        }
        
        return json_encode($data);
    }
    
    
     public function get_all_location(){
        try {
            $get_all_location = DB::table('master_data')
                            ->where('master_for','location') 
                            ->where('status','1')
                            ->get();
            return Datatables::of($get_all_location)
            ->addColumn('master_key', function ($get_all_location) {
                $master_key = '';
                $master_key .= '<center>'.ucfirst($get_all_location->master_key).'</center>';
               return $master_key.'';
            })
            ->addColumn('master_value', function ($get_all_location) {
                $master_value = '';
                $master_value .= '<center>'.$get_all_location->master_value.'</center>';
               return $master_value.'';
            })
             ->addColumn('action', function ($get_all_location) {
               return '<a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return un_delete_location_info( '.$get_all_location->master_data_id.',0);"><i class="fa fa-trash-o"></i></a>';
                })
             ->rawColumns(array("master_key","action","master_key","master_value"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    public static function delete_document(Request $req){
        if (file_exists($req->document_path)) {
            unlink($req->document_path);
            DB::table('document_details')->where('document_details_id', '=', $req->document_id)->delete();
            return json_encode('success');
        }else{
            DB::table('document_details')->where('document_details_id', '=', $req->document_id)->delete();
            return json_encode('success');
        }
    }
    public static function un_delete_location(Request $req){
        DB::table('master_data')->where('master_data_id', '=', $req->master_data_id)->delete();
        return json_encode('success');
    }
      
    public function add_master_details(Request $req){
        if($req->master_key == 'trentygo_location'){
            DB::table('location_master')
                ->updateOrInsert(
                    ['location_name' => $req->value],
                    ['location_name' => $req->value]
                );
            return json_encode("success");
        }else{
            DB::table('master_data')
                ->updateOrInsert(
                    ['master_value' => $req->value],
                    ['master_key' => $req->master_key,
                    'master_value' => $req->value,
                    'master_for' => 'vehicle_option']
                );
            return json_encode("success");
        }
    }
    
    public function update_master_image_data(Request $req){
        $master_count = DB::table('master_data')->where('master_value',$req->value)->count();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
            'image_url' => $req->img_url,
            'image_id' => $req->img_id,
            'modified_at' => $curent_date,
        );
        $db = new General();
        $db->updates('master_data',$data,'master_data_id',$req->master_key);
        return json_encode("success");
    }
  
    public function get_all_master_data(){
        try {
            $get_all_master_data = DB::table('master_data')
                            ->where('status','1')
                            ->get();
            return Datatables::of($get_all_master_data)
            ->addColumn('master_key', function ($get_all_master_data) {
                $master_value = '';
                $master_value .= '<center>'.ucfirst($get_all_master_data->master_key).'</center>';
               return $master_value.'';
            })
            ->addColumn('master_value', function ($get_all_master_data) {
                $master_value = '';
                $master_value .= '<center>'.ucfirst($get_all_master_data->master_value).'</center>';
               return $master_value.'';
            })
             ->addColumn('action', function ($get_all_master_data) {
               return '<a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return edit_master_tab( '.$get_all_master_data->master_data_id.' );"><i class="fa fa-pencil"></i></a>&nbsp;
               
               <a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return un_delete_color_info( '.$get_all_master_data->master_data_id.',0);"><i class="fa fa-trash-o"></i></a>';
                })
             ->rawColumns(array("master_data_id","action","master_value","master_key"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    public function get_all_master_image_data(){
        try {
            $get_all_master_image_data = DB::table('master_data as md')
                                        ->leftJoin('master_data_images as mdi', 'mdi.master_data_images_id', 'md.image_id')
                                        ->where('mdi.status','1')
                                        ->get();
            return Datatables::of($get_all_master_image_data)
            ->addColumn('master_value', function ($get_all_master_image_data) {
                $master_value = '';
                $master_value .= '<center><span>'.ucfirst($get_all_master_image_data->master_value).'</span></center>';
               return $master_value.'';
            })
            ->addColumn('master_url', function ($get_all_master_image_data) {
                $master_value = '';
                $master_value .= '<center><img src="'.$get_all_master_image_data->file_url.'" width= 30%; alt="no pic"></center>';
               return $master_value.'';
            })
            ->addColumn('action', function ($get_all_master_image_data) {
               return '
               <center>
               <a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return delete_master_image( '.$get_all_master_image_data->master_data_images_id.','.$get_all_master_image_data->master_data_id.');"><i class="fa fa-trash-o"></i></a></center>';
            })
             ->rawColumns(array("master_data_id","action","master_value","master_url"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    public static function delete_master_image(Request $req){
        $master_image_data = DB::table('master_data_images')->where('master_data_images_id',$req->master_image_id)->get();
        $db = new General();
        if (file_exists($master_image_data[0]->file_path)) {
            unlink($master_image_data[0]->file_path);
            DB::table('master_data_images')->where('master_data_images_id', '=', $req->master_image_id)->delete();
            // $db->updates('master_data',$data,'master_data_id',$req->master_data_id);
            return json_encode('success');
        }else{
            DB::table('master_data_images')->where('master_data_images_id', '=', $req->master_image_id)->delete();
            // $db->updates('master_data',$data,'master_data_id',$req->master_data_id);
            return json_encode('success');
        }
    }
    
    public function get_master_list(Request $req){
        $get_master_list = DB::table('master_data')->where('master_data_id',$req->master_data_id)->get();
        return($get_master_list);
    }
    
    public function edit_master_details(Request $req){
        $master_count = DB::table('master_data')->where('master_value',$req->value)->count();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
        // 'master_key' => $req->edit_master_key,
        'master_value' => $req->edit_value,
        'master_for' => 'vehicle_option',
        'modified_at' => $curent_date
        );
        if($master_count == 0){
            $db = new General();
            $db->updates('master_data',$data,'master_data_id',$req->master_data_id);
            $data = "success";
        }else{
            $data = "failed";
        }
        return json_encode($data);
    }
    
    // public static function un_delete_color_list(Request $req){
    //     DB::table('master_data')->where('master_data_id', '=', $req->master_data_id)->delete();
    //     return json_encode('success');
    //   }
    public function un_delete_color_list(Request $req){
        $master_count = DB::table('vehicle_details')
                        ->where('vehicle_color', '=', $req->master_data_id)
                        ->orWhere('vehicle_brand', '=', $req->master_data_id)
                        ->orWhere('vehicle_seat_type', '=', $req->master_data_id)
                        ->orWhere('vehicle_seat_count', '=', $req->master_data_id)
                        ->orWhere('vehicle_fuel_type', '=', $req->master_data_id)
                        ->orWhere('vehicle_driving_type', '=', $req->master_data_id)
                        ->count();
        // $master_value = DB::table('vehicle_features')
        //                 ->where('option_name', '=', $req->master_data_id)
        //                 ->count();                
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
        'master_data_id' => $req->master_data_id,
        'modified_at' => $curent_date
        );
        if($master_count == 0){
            DB::table('master_data')->where('master_data_id', '=', $req->master_data_id)->delete();
            $data = "success";
        }
        // elseif($master_value == 0){
        //     DB::table('master_data')->where('master_data_id', '=', $req->master_data_id)->delete();
            
        // }
        else{
            $data = "failed";
        }
        return json_encode($data);
    }
    
    public function get_all_partner_list(){
        try {
            $get_all_partner_list = DB::table('partner_details')
                                        ->where('status','!=',0)
                                        ->get();
                            
            return Datatables::of($get_all_partner_list) 
            ->addColumn('unique_partner_id', function ($get_all_partner_list) {
                $unique_partner_id = '';
                $unique_partner_id .= '<center>'.ucfirst($get_all_partner_list->unique_partner_id).'</center>';
               return $unique_partner_id.'';
            })
            ->addColumn('partner_name', function ($get_all_partner_list) {
                if($get_all_partner_list->partner_name != ''){
                    $partner_name = '';
                    $partner_name .= '<center>'.ucfirst($get_all_partner_list->partner_name).'</center>';    
                }else{
                    $partner_name = '';
                    $partner_name .= '<center>'.ucfirst($get_all_partner_list->partner_company_name).'</center>';
                }
               return $partner_name.'';
            })
            ->addColumn('partner_phone', function ($get_all_partner_list) {
                $partner_phone = '';
                $partner_phone .= '<center>'.$get_all_partner_list->partner_phone.'</center>';
               return $partner_phone.'';
            })
            ->addColumn('partner_area', function ($get_all_partner_list) {
                $partner_area = '';
                $partner_area .= '<center>'.$get_all_partner_list->partner_area.'</center>';
               return $partner_area.'';
            })
            ->addColumn('partner_email', function ($get_all_partner_list) {
                $partner_email = '';
                $partner_email .= '<center>'.$get_all_partner_list->partner_email.'</center>';
               return $partner_email.'';
            })
            ->addColumn('status', function ($get_all_partner_list) {
                $status = '';
                if($get_all_partner_list->status == '1'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-primary reject"> New Partner </span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',2);">Approve</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                else if($get_all_partner_list->status == '2'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-success reject">Approved</span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                else if($get_all_partner_list->status == '3'){
                    $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-success reject">Partner Updated</span></a>
                        <ul class="dropdown-menu">
                            <li>
                            <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',4);">Publish</span></center>
                            </li>
                            <li>
                            <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',6);">Resend</span></center>
                            </li>
                            <li>
                            <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',7);">Reject</span></center>
                            </li>
                        </ul>';
                }
                else if($get_all_partner_list->status == '4'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-success reject">Published</span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',5);">Unpublish</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                else if($get_all_partner_list->status == '5'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-success reject">Unpublished</span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',4);">Publish</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                else if($get_all_partner_list->status == '8'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-danger reject">Rejected</span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',2);">Approve</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',6);">Resend</span></center>
                        </li>
                    </ul>';
                }
                else{
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-warning reject">Partner Inprogress</span></a>                        
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$get_all_partner_list->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                return $status.'';
            })
            ->addColumn('status_reason', function ($get_all_partner_list) {
                $status_reason = '';
                $status_reason .= '<center>'.$get_all_partner_list->status_reason.'</center>';
               return $status_reason.''; 
            })
            ->addColumn('vehicle_count', function ($get_all_partner_list) {
                $vehicle_count = '';
                $vehicle_count .= '<center>'.$get_all_partner_list->partner_vehicles_no.'</center>';
               return $vehicle_count.'';
            })
            ->addColumn('sst', function ($get_all_partner_list) {
                $sst = $get_all_partner_list->status;
                return $sst;
            })
            ->addColumn('crypt_id', function ($get_all_partner_list) {
                $vehicle_count = Crypt::encryptString($get_all_partner_list->partner_id);
               return $vehicle_count.'';
            })
            ->addColumn('action', function ($get_all_partner_list) {
                if($get_all_partner_list->status != '1'){
                    return '<center><a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return delete_partner_info( '.$get_all_partner_list->partner_id.',0);"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;
                    <a href="'.url('partner_uilist/'.Crypt::encryptString($get_all_partner_list->partner_id).'').'" class="on-default edit-row" title=""><i class="fa fa-cog" data-toggle="tooltip" title="partner_details!"></i></a></center>';     
                }else{
                    return '<center><a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return delete_partner_info( '.$get_all_partner_list->partner_id.',0);"><i class="fa fa-trash-o"></i></a></center>';
                }
                })
            ->rawColumns(array("sst","unique_partner_id","action","partner_name","partner_phone","partner_area","partner_email","status","status_reason","vehicle_count","crypt_id"))
            ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    public function filter_get_all_partner_list(Request $req){
        try {
            
            $filter_status = $req->status;
            $filter_location = $req->partner_area;
            $filter_partner_id = $req->unique_partner_id;
            $filter_partner_name = $req->partner_name;
            $filter_moblie_no = $req->partner_phone;
            $filter_email = $req->partner_email;
            // if(($req->status) =="0"){
            //   $filter_status = '';
            // }else{
            //   $filter_status = $req->status;
            // }
            $get_all_partner_list = DB::table('partner_details');
            if(!empty($filter_location)){
                $get_all_partner_list->where('partner_area',$filter_location);
            }
            if(!empty($filter_status)){
                $get_all_partner_list->where('status',6)->orWhere('status',7);
            }
            if(!empty($filter_partner_id)){
                $get_all_partner_list->where('unique_partner_id',$filter_partner_id);
            }
            if(!empty($filter_partner_name)){
                $get_all_partner_list->where('partner_name',$filter_partner_name);
            }
            if(!empty($filter_moblie_no)){
                $get_all_partner_list->where('partner_phone',$filter_moblie_no);
            }
            if(!empty($filter_email)){
                $get_all_partner_list->where('partner_email',$filter_email);
            }
            $result= $get_all_partner_list->get();
            // print_r($filter_status.'<br>');
            // print_r($result);
            // die();
            return Datatables::of($result)
            ->addColumn('unique_partner_id', function ($result) {
                $unique_partner_id = '';
                $unique_partner_id .= '<center>'.ucfirst($result->unique_partner_id).'</center>';
               return $unique_partner_id.'';
            })
            ->addColumn('partner_name', function ($result) {
                if($result->partner_name != ''){
                    $partner_name = '';
                    $partner_name .= '<center>'.ucfirst($result->partner_name).'</center>';    
                }else{
                    $partner_name = '';
                    $partner_name .= '<center>'.ucfirst($result->partner_company_name).'</center>';
                }
               return $partner_name.'';
            })
            ->addColumn('partner_phone', function ($result) {
                $partner_phone = '';
                $partner_phone .= '<center>'.$result->partner_phone.'</center>';
               return $partner_phone.'';
            })
            ->addColumn('partner_area', function ($result) {
                $partner_area = '';
                $partner_area .= '<center>'.$result->partner_area.'</center>';
               return $partner_area.'';
            })
            ->addColumn('partner_email', function ($result) {
                $partner_email = '';
                $partner_email .= '<center>'.$result->partner_email.'</center>';
               return $partner_email.'';
            })
            ->addColumn('status', function ($result) {
                $status = '';
                if($result->status == '1'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-primary reject"> New Partner </span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',2);">Approve</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                else if($result->status == '2'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-success reject">Approved</span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                else if($result->status == '3'){
                    $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-success reject">Partner Updated</span></a>
                        <ul class="dropdown-menu">
                            <li>
                            <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',4);">Publish</span></center>
                            </li>
                            <li>
                            <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',6);">Resend</span></center>
                            </li>
                            <li>
                            <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',7);">Reject</span></center>
                            </li>
                        </ul>';
                }
                else if($result->status == '4'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-success reject">Published</span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',5);">Unpublish</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                else if($result->status == '5'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-success reject">Unpublished</span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',4);">Publish</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                else if($result->status == '7'){
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-danger reject">Rejected</span></a>
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',2);">Approve</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',6);">Resend</span></center>
                        </li>
                    </ul>';
                }
                else{
                $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-warning reject">Partner Inprogress</span></a>                        
                    <ul class="dropdown-menu">
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',6);">Resend</span></center>
                        </li>
                        <li>
                        <center><span class="border-none btn btn-warningt btn-outline" onClick="status_partner_info('.$result->partner_id.',7);">Reject</span></center>
                        </li>
                    </ul>';
                }
                return $status.'';
            })
            ->addColumn('status_reason', function ($result) {
                $status_reason = '';
                $status_reason .= '<center>'.$result->status_reason.'</center>';
               return $status_reason.'';
            })
            ->addColumn('vehicle_count', function ($result) {
                $vehicle_count = '';
                $vehicle_count .= '<center>'.$result->partner_vehicles_no.'</center>';
               return $vehicle_count.'';
            })
            ->addColumn('action', function ($result) {
                if($result->status != '1'){
                    return '<center><a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return delete_partner_info( '.$result->partner_id.',0);"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;
                    <a href="'.url('partner_uilist/'.Crypt::encryptString($result->partner_id).'').'" class="on-default edit-row" title=""><i class="fa fa-cog" data-toggle="tooltip" title="partner_details!"></i></a></center>';     
                }else{
                    return '<center><a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return delete_partner_info('.$result->partner_id.', 0);"><i class="fa fa-trash-o"></i></a></center>';
                }
                })
            ->addColumn('crypt_id', function ($result) {
                $vehicle_count = Crypt::encryptString($result->partner_id);
               return $vehicle_count.'';
            })
            ->addColumn('sst', function ($result) {
                $sst = $result->status;
                return $sst;
            })
            ->rawColumns(array("sst","unique_partner_id","action","partner_name","partner_phone","partner_area","partner_email","status","status_reason","vehicle_count","crypt_id"))
            ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }

    public static function update_auto_approve_status(Request $req){
        $db = new General();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
            'partner_auto_approve' => $req->auto_approve_status,
            'modified_at' => $curent_date,
        );
        $db->updates('partner_details',$data,'partner_id',$req->partner_id);
        return json_encode('success');
     }
    
    public function status_partner_details(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        $partner_info = DB::table('partner_details')->where('partner_id',$req->partner_id)->get();
        if($partner_info[0]->partner_name != ''){
            $name = $partner_info[0]->partner_name;
        }else{
            $name = $partner_info[0]->partner_company_name;
        }
        if($req->status == '2'){
            $user_data = array(
                'name' => $name,
                'email' => $partner_info[0]->partner_email, 
                'password' => Hash::make($partner_info[0]->partner_phone),  
                'role' => '2',
                'user_id' => $req->partner_id, 
                'created_at' => $curent_date,
            );
            $db->insert('users',$user_data);
            $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            );
            $db->updates('partner_details',$data,'partner_id',$req->partner_id);
            $to_name = $partner_info[0]->partner_name;
            $to_email = $partner_info[0]->partner_email;
            $password = $partner_info[0]->partner_phone;
            $mdata1 = array('name'=>$to_name,'email'=>$to_email,'password'=>$password);
            Mail::send('mail_content.welcome_new_owner', $mdata1, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                        ->subject('Trenty.Go | New Registration');
                $message->from('info@decorbazaar.in','Trenty.Go');
                $message->cc('vinoth@coralmint.in');
                /*$message->bcc('bhavithra.t@coralmint.in');*/
            });
        }
        else if($req->status == '4'){
            $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            );
            $db->updates('partner_details',$data,'partner_id',$req->partner_id);
            $resend_data = array(
                'status' => 2,
                'modified_at' => $curent_date
            );
            $db->updates('resend_info',$resend_data,'partner_id',$req->partner_id);
            $user_count = DB::table('users')->where('user_id',$partner_info[0]->partner_id)->count();
            if($user_count == '0'){
                $user_data = array(
                    'name' => $name,
                    'email' => $partner_info[0]->partner_email, 
                    'password' => Hash::make($partner_info[0]->partner_phone),  
                    'role' => '2',
                    'user_id' => $req->partner_id, 
                    'created_at' => $curent_date,
                );
                $db->insert('users',$user_data);
                $to_name = $partner_info[0]->partner_name;
                $to_email = $partner_info[0]->partner_email;
                $password = $partner_info[0]->partner_phone;
                $mdata1 = array('name'=>$to_name,'email'=>$to_email,'password'=>$password);
                Mail::send('mail_content.welcome_new_owner', $mdata1, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                            ->subject('Trenty.Go | New Registration');
                    $message->from('info@decorbazaar.in','Trenty.Go');
                    $message->cc('vinoth@coralmint.in');
                    /*$message->bcc('bhavithra.t@coralmint.in');*/
                });
            }
        }
        else if($req->status == '5'){
            $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            );
            $db->updates('partner_details',$data,'partner_id',$req->partner_id);
            $vehicle_data = array(
                'status' => 2,
                'modified_at' => $curent_date
            );
            $db->updates('vehicle_details',$vehicle_data,'partner_id',$req->partner_id);
        }
        else if($req->status == '6'){
            $reason_data = array(
                'partner_id' => $req->partner_id,
                'reason' => $req->reason,
            );
            $db->insert('resend_info',$reason_data);
            $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            );
            $db->updates('partner_details',$data,'partner_id',$req->partner_id);
        }
        else if($req->status == '0'){
            $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            );
            $db->updates('partner_details',$data,'partner_id',$req->partner_id);
            $vehicle_data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            );
            $db->updates('vehicle_details',$vehicle_data,'partner_id',$req->partner_id);
        }
        else{
            $data = array(
                'status' => $req->status,
                'modified_at' => $curent_date
            ); 
            $db->updates('partner_details',$data,'partner_id',$req->partner_id);
        }
        return json_encode('success');
    }
    
    public static function delete_partner_details(Request $req){
        // DB::table('document_details')->where('partner_id', $req->partner_id)->delete();
        // DB::table('admin_partner_messages')->where('partner_id', $req->partner_id)->delete();
        // DB::table('resend_info')->where('partner_id', $req->partner_id)->delete();
        // DB::table('vehicle_details')->where('partner_id', $req->partner_id)->delete();
        // $data = DB::table('vehicle_details')->where('partner_id', $req->partner_id)->delete();
        // DB::table('vehicle_features')->where('vehicle_id', $)->delete();
        // DB::table('manage_vehicle_rent ')->where('partner_id', $req->partner_id)->delete();
        return json_encode('success');
    }
    
    public static function un_delete_partner_list(Request $req){
        DB::table('partner_details')->where('partner_id', '=', $req->partner_id)->delete();
        return json_encode('success');
    }
      
      
    
    
    public function edit_vehicle(Request $req){
        $vehicle_id = Crypt::decryptString($req->id);
        $vehicle_brand_list = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','brand')
                            ->where('status',1)
                            ->get();
        $add_on_array = DB::table('master_data as md')
                            ->leftJoin('vehicle_features as vf','md.master_data_id','=','vf.option_name')
                            ->where('md.master_for','vehicle_option')
                            ->where('md.master_key','add_on')
                            ->where('md.status',1)
                            ->where('vf.vehicle_id',$vehicle_id)
                            ->pluck('md.master_data_id');
        $add_on_features_values = DB::table('master_data as md')
                            ->leftJoin('vehicle_features as vf','md.master_data_id','=','vf.option_name')
                            ->where('md.master_for','vehicle_option')
                            ->where('md.master_key','add_on')
                            ->where('md.status',1)
                            ->where('vf.vehicle_id',$vehicle_id)
                            ->get();
        $add_on_service_values = DB::table('master_data as md')
                            ->leftJoin('vehicle_features as vf','md.master_data_id','=','vf.option_name')
                            ->where('md.master_for','vehicle_option')
                            ->where('md.master_key','add_on_services')
                            ->where('md.status',1)
                            ->where('vf.vehicle_id',$vehicle_id)
                            ->get();
        $add_on_features = DB::table('master_data as md')
                            ->where('md.master_for','vehicle_option')
                            ->where('md.master_key','add_on')
                            ->where('md.status',1)
                            ->get();
        $vehicle_addon_value = DB::table('vehicle_features')
                            ->where('vehicle_id',$vehicle_id)
                            ->where('features_for','2')
                            ->get(); 
        $add_on_services = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','add_on_services')
                            ->where('status',1)
                            ->get();                     
        $vehicle_seat_type_list = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','seat_type')
                            ->where('status',1)
                            ->get();
        $vehicle_seat_count_list = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','seat_count')
                            ->where('status',1)
                            ->get();
        $vehicle_color = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','color')
                            ->where('status',1)
                            ->get();
        $vehicle_type = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','vehicle type')
                            ->where('status',1)
                            ->get();
        $vehicle_features = DB::table('vehicle_features')
                            ->where('status',1)
                            ->get(); 
        $vehicle_driving_mode = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','driving_mode')
                            ->where('status',1)
                            ->get();
        $vehicle_fuel_type = DB::table('master_data')
                            ->where('master_for','vehicle_option')
                            ->where('master_key','fuel_type')
                            ->where('status',1)
                            ->get();
        $vehicle_info = DB::table('vehicle_details as vds')
                            ->leftJoin('master_data as md','vds.vehicle_seat_count','=','md.master_data_id')
                            ->leftJoin('master_data as md1','vds.vehicle_driving_type','=','md1.master_data_id')
                            ->leftJoin('master_data as md2','vds.vehicle_color','=','md2.master_data_id')
                            ->leftJoin('master_data as md3','vds.vehicle_fuel_type','=','md3.master_data_id')
                            ->leftJoin('master_data as md4','vds.vehicle_seat_type','=','md4.master_data_id')
                            ->leftJoin('master_data as md5','vds.vehicle_brand','=','md5.master_data_id')
                            ->where('vds.vehicle_id',$vehicle_id)
                            ->select('vds.*','md.master_key as seat_count','md1.master_key as driving_mode','md2.master_for as color','md3.master_key as fuel_type','md4.master_key as seat_type','md4.master_key as brand')
                            ->get(); 
        $vehicle_img = DB::table('document_details')
                            ->where('vehicle_id',$vehicle_id)
                            ->where('file_for','image_document')
                            ->get(); 
                            // print_r($vehicle_addon_value);
                            // die();
        return view('partner_dashboard/edit_vehicle')
                    ->with('vehicle_brand_list',$vehicle_brand_list)
                    ->with('vehicle_seat_type_list',$vehicle_seat_type_list)
                    ->with('vehicle_seat_count_list',$vehicle_seat_count_list)
                    ->with('vehicle_driving_mode',$vehicle_driving_mode)
                    ->with('vehicle_fuel_type',$vehicle_fuel_type)
                    ->with('vehicle_color',$vehicle_color)
                    ->with('vehicle_id',$vehicle_id)
                    ->with('vehicle_info',$vehicle_info)
                    ->with('vehicle_img',$vehicle_img)
                    ->with('add_on_features',$add_on_features)
                    ->with('vehicle_features',$vehicle_features)
                    ->with('add_on_services',$add_on_services)
                    ->with('vehicle_addon_value',$vehicle_addon_value)
                    ->with('add_on_features_values',$add_on_features_values)
                    ->with('add_on_service_values',$add_on_service_values)
                    ->with('add_on_array',$add_on_array)
                    ->with('vehicle_type',$vehicle_type);
                    
    }  
      
    
      
      
      
      
      
      
    public function not_in_used_add_partner_details(Request $req){
        $partner_details = DB::table('partner_details')->where('partner_email',$req->email)->count();
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
        'partner_name' => $req->partner_name,
        'partner_phone' => $req->phone_no,
        'partner_email' => $req->email,
        'partner_area' => $req->location_name,
        'created_at' => $curent_date,
        );
        print_r($partner_details);
        die();
        if($partner_details == '0'){
            $db = new General();
            $db->insert('partner_details',$data);
            $data = "success";
        }else{
            $data = "failed";
        }
        
        return json_encode($data);
    }  
    
    public function update_partner_personal_details(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                    'partner_name' => $req->partner_name,
                    'partner_company_name' => $req->partner_company_name,
                    'partner_email' => $req->partner_email,
                    'partner_phone' => $req->partner_phone,
                    'partner_door_no' => $req->partner_door_no,
                    'partner_area' => $req->partner_area,
                    'partner_street' => $req->partner_street,
                    'partner_postalcode' => $req->partner_postal_code,
                    'partner_vehicles_no' => $req->partner_vehicle_count,
                    'company_description' => $req->partner_company_desc,
                    'offered_location' => $req->offered_location_str,
                    'status' => 3,
                    'modified_at' => $curent_date,
                    );
            $db = new General();
            $db->updates('partner_details',$data,'partner_id',$req->partner_id);
            $data = "success";
        return json_encode($data);
    }
    
    // public function upload_partner_personal_pic(Request $req){
    //         if (!file_exists('upload/partner/'.$req->partner_id.'/profile_images/')) {
    //             mkdir('upload/partner/'.$req->partner_id.'/profile_images/', 0777, true);
    //         }
    //         $output_dir = 'upload/partner/'.$req->partner_id.'/profile_images/';
    //         if(isset($_FILES["myfile"]))
    //         {
    //             // $ret=array();
    //             if(!is_array($_FILES["myfile"]["name"])) //single file
    //             {
    //                 $fileName = $_FILES["myfile"]["name"];
    //                 $duplicate_fileName = $req->partner_id.'profile_img';
    //                 $ext = (explode(".", $fileName));
    //                 $file_ext = $ext[1];
    //                 $image_url = "https://trentygo.coralmint.in/upload/partner/$req->partner_id/profile_images/$fileName";
    //                 $image_path = "upload/partner/$req->partner_id/profile_images/";
    //                 // $ret[]= $fileName;
    //                 $data = array(
    //                                 'partner_id' => $req->partner_id,
    //                                 'file_name' => $duplicate_fileName,
    //                                 'file_ext' => $file_ext,
    //                                 'file_url' => $image_url,
    //                                 'file_path' => $image_path,
    //                                 'file_orginal_name' => $fileName,
    //                                 'file_detail' => "partner profile image",
    //                                 'file_for' => "profile_image",
    //                             );
    //                 // echo $fileName.$output_dir ;
    //                 $old_data_count = DB::table('document_details')->where('partner_id',$req->partner_id)->where('file_name',$duplicate_fileName)->count();
    //                 if($old_data_count == 0){
    //                     DB::table('document_details')->insert($data);
    //                     $ret = DB::getPdo()->lastInsertId();
    //                     move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    //                     $responsedata = $fileName;   
    //                 }else{
    //                     DB::table('document_details')->where('partner_id',$req->partner_id)->where('file_name',$duplicate_fileName)->delete();
    //                     DB::table('document_details')->insert($data);
    //                     $ret = DB::getPdo()->lastInsertId();
    //                     move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    //                     $responsedata = $fileName;   
    //                 }
    //                 // array_push($ret, $property_image);
    //                 // print_r($ret);
    //             }
    //             else  //Multiple files, file[]
    //             {
    //               $fileCount = count($_FILES["myfile"]["name"]);
    //               for($i=0; $i < $fileCount; $i++)
    //               {
    //                 $fileName = $_FILES["myfile"]["name"][$i];
    //                 $duplicate_fileName = $req->partner_id.'profile_img'[$i];
    //                 // $ret[]= $fileName;
    //                 $responsedata = $fileName;
    //               }            
    //             }            
    //             return $responsedata;
    //         }
    // }
    

    
    public function get_all_vehicle_list(){
        try {
            $get_all_vehicle_list = DB::table('vehicle_details')
                            ->where('partner_id',$req->partner_id)
                            ->get();
                            
            return Datatables::of($get_all_vehicle_list) 
            ->addColumn('vehicle_brand', function ($get_all_vehicle_list) {
                $vehicle_brand = '';
                $vehicle_brand .= '<center>'.$get_all_vehicle_list->vehicle_brand.'</center>';
               return $vehicle_brand.'';
            })
            ->addColumn('vehicle_model', function ($get_all_vehicle_list) {
                $vehicle_model = '';
                $vehicle_model .= '<center>'.$get_all_vehicle_list->vehicle_model.'</center>';
               return $vehicle_model.'';
            })
            ->addColumn('vehicle_reg_no', function ($get_all_vehicle_list) {
                $vehicle_reg_no = '';
                $vehicle_reg_no .= '<center>'.$get_all_vehicle_list->vehicle_reg_no.'</center>';
               return $vehicle_reg_no.'';
            })
            ->addColumn('available_status', function ($get_all_vehicle_list) {
                $available_status = '';
                $available_status .= '<center>'.$get_all_vehicle_list->available_status.'</center>';
               return $available_status.''; 
            })
            ->addColumn('status', function ($get_all_vehicle_list) {
                        $status = '';
                        $status .= '<center>'.$get_all_vehicle_list->status.'</center>';
                        return $status.'';
                    })
            ->addColumn('action', function ($get_all_vehicle_list) {
               return '<a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return un_delete_partner_info( '.$get_all_vehicle_list->vehicle_id.',0);"><i class="fa fa-trash-o"></i></a>';
                })
            ->rawColumns(array("action","vehicle_brand","vehicle_model","vehicle_reg_no","available_status","status"))
            ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    
    public function get_all_trip_details(){
        try {
           
            $get_all_trip_list = DB::table('trip_details as td')
                                ->leftJoin('partner_details as pd', 'td.partner_id', 'pd.partner_id')
                                ->where('td.status','1')
                                ->get();                    

            return Datatables::of($get_all_trip_list)
            
                ->addColumn('trip_id', function ($get_all_trip_list) {
                        $trip_id = '';
                        $trip_id .= '<center>'.ucfirst($get_all_trip_list->trip_id).'</center>';
                       return $trip_id.'';
                    })
                ->addColumn('reservation_id', function ($get_all_trip_list) {
                        $reservation_id = '';
                        $reservation_id .= '<center>'.$get_all_trip_list->reservation_id.'</center>';
                       return $reservation_id.'';
                    })  
                ->addColumn('pickup_datetime', function ($get_all_trip_list) {
                        $pickup_datetime = '';
                        $pickup_datetime .= '<center>'.$get_all_trip_list->pickup_datetime.'</center>';
                       return $pickup_datetime.'';
                    })
                ->addColumn('status', function ($get_all_trip_list) {
                        $status = '';
                        if($get_all_trip_list->status == '1'){
                        $status .= '<a style="cursor:pointer; color:red;" data-toggle="dropdown" class="dropdown-toggle on-default"><span class="label label-primary reject">New</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                <center><span class="border-none btn btn-default btn-outline" onClick="reservation_info('.$get_all_trip_list->trip_id.',2);">Inprogress</span></center>
                                </li>
                            </ul>';
                        }
                        else{
                        $status .= '<span class="label label-success reject">Inprogress</span>';
                        }
                        return $status.'';
                    })
                ->addColumn('action', function ($get_all_trip_list) {
                  return '<center>
                        <a href="'.url('tripdetails/'.Crypt::encryptString($get_all_trip_list->partner_id).'').'" class="on-default edit-row" title=""><i class="fa fa-eye" data-toggle="tooltip" title="partner_details!"></i></a></center> 
                        </center>';
                        // <a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" onclick="return delete_owner( '.$get_all_owner->owner_id.',2);"><i class="fa fa-trash-o"></i></a>
                    })
             ->rawColumns(array("trip_id","reservation_id","pickup_datetime","status","action"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
     public function tripdetails(Request $req){
        $partner_id = Crypt::decryptString($req->id);
        $cus_info = DB :: table('customer_details as cd')
                     ->join('trip_details as td','cd.customer_id','td.customer_id')
                     ->select('cd.customer_name','cd.customer_phone','cd.customer_email')
                     ->where('td.partner_id',$partner_id)
                    ->get();
        $res_info = DB :: table('reservation_details as rd')
                     ->join('trip_details as td','rd.reservation_id','td.reservation_id')
                     ->select('rd.reserve_unique_id','rd.reservation_date','rd.reserve_through','rd.reservation_amount','rd.start_date','rd.return_date','rd.paid_amount')
                     ->where('td.partner_id',$partner_id)
                    ->get();
        $part_info = DB :: table('partner_details as pd')
                     ->join('trip_details as td','pd.partner_id','td.partner_id')
                     ->select('pd.partner_name')
                     ->where('td.partner_id',$partner_id)
                    ->get(); 
        $veh_info = DB :: table('vehicle_details as vd')
                     ->join('trip_details as td','vd.vehicle_id','td.vehicle_id')
                     ->select('vd.vehicle_reg_no','vd.vehicle_model')
                     ->where('td.partner_id',$partner_id)
                    ->get();             
        return view('admin_dashboard/tripdetails')
                    ->with('cus_info', $cus_info)
                    ->with('res_info', $res_info)
                    ->with('part_info', $part_info)
                    ->with('veh_info', $veh_info);
    }
  
    public function triplist(){
        $get_all_trip_list = DB::table('trip_details as td')
                                ->join('reservation_details as rd','td.reservation_id','rd.reservation_id')
                                ->select('rd.reserve_unique_id','rd.phone','rd.start_date','rd.return_date','td.status')
                                ->where('td.status','1')->get();
        return view('admin_dashboard/triplist')
                        ->with('get_all_trip_list', $get_all_trip_list);
    }
    
    public function get_all_trip_detail_list(){
        try {
           $get_all_trip_list = DB::table('trip_details as td')
                                ->join('reservation_details as rd','td.reservation_id','rd.reservation_id')
                                ->join('partner_details as pd','td.partner_id','pd.partner_id')
                                ->select('rd.reserve_unique_id','rd.phone','rd.start_date','rd.return_date','td.status','pd.partner_name','pd.partner_id')
                                ->where('td.status','1')->get();
                            
            return Datatables::of($get_all_trip_list)
            
                ->addColumn('reserve_unique_id', function ($get_all_trip_list) {
                        $reserve_unique_id = '';
                        $reserve_unique_id .= '<center>'.ucfirst($get_all_trip_list->reserve_unique_id).'</center>';
                       return $reserve_unique_id.'';
                    })
                ->addColumn('phone', function ($get_all_trip_list) {
                        $phone = '';
                        $phone .= '<center>'.$get_all_trip_list->phone.'</center>';
                       return $phone.'';
                    }) 
                 ->addColumn('partner_name', function ($get_all_trip_list) {
                        $partner_name = '';
                        $partner_name .= '<center>'.$get_all_trip_list->partner_name.'</center>';
                       return $partner_name.'';
                    })     
                ->addColumn('start_date', function ($get_all_trip_list) {
                    $start_date = '';
                    $start_date .= '<center>'.ucfirst($get_all_trip_list->start_date).'</center>';
                   return $start_date.'';
                })
                ->addColumn('return_date', function ($get_all_trip_list) {
                    $return_date = '';
                    $return_date .= '<center>'.ucfirst($get_all_trip_list->return_date).'</center>';
                   return $return_date.'';
                })
                ->addColumn('sst', function ($get_all_trip_list) {
                    $sst = $get_all_trip_list->status;
                    return $sst;
                    })
                ->addColumn('crypt_id', function ($get_all_trip_list) {
                    $reser_list = Crypt::encryptString($get_all_trip_list->partner_id);
                   return $reser_list.'';
                })
                ->addColumn('status', function ($get_all_trip_list) {
                        $status = '';
                        if($get_all_trip_list->status == '3'){
                            $status .= '<span class="label label-success reject">Confirmed</span>';
                        }else if($get_all_trip_list->status == '6'){
                            $status .= '<span class="label label-warning reject">Cancelled</span>';
                        }else{
                            $status .= '<span class="label label-primary reject">Inprogress</span>';
                        }
                        return $status.'';
                    })
                
                ->addColumn('action', function ($get_all_trip_list) {
                  return '<center><a href="'.url('tripdetails/'.Crypt::encryptString($get_all_trip_list->partner_id).'').'" class="on-default edit-row" title="" target=""><i class="fa fa-eye" data-toggle="tooltip" title="Trip_details!"></i></a></center>';

                    }) 
             ->rawColumns(array("reserve_unique_id","phone","partner_name","start_date","return_date","status","action","crypt_id"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    
    public function filter_get_all_trip_list(Request $req){
        try {
            $filter_name = $req->partner_name;
            $filter_phone = $req->phone;
            $filter_res_id = $req->reserve_unique_id;
            
            $filter_start_date = $req->start_date;
            $filter_return_date = $req->return_date;
            $filter_from = $req->filter_from;
            if($filter_from == '1'){
                 $get_all_trip_list = DB::table('trip_details as td')
                                ->join('reservation_details as rd','td.reservation_id','rd.reservation_id')
                                ->join('partner_details as pd','td.partner_id','pd.partner_id')
                                ->select('rd.reserve_unique_id','rd.phone','rd.start_date','rd.return_date','td.status','pd.partner_name','pd.partner_id')
                                ->where('td.status','1')->get();
                
                if(!empty($filter_name)){
                    $get_all_trip_list->where('partner_name',$filter_name);
                }
                if(!empty($filter_phone)){
                    $get_all_trip_list->where('phone',$filter_phone);
                }
                if(!empty($filter_res_id)){
                    $get_all_trip_list->where('reserve_unique_id',$filter_res_id);
                }
                if(!empty($filter_start_date)){
                    $get_all_trip_list->where('start_date',$filter_start_date);
                }
                if(!empty($filter_return_date)){
                    $get_all_trip_list->where('return_date',$filter_return_date);
                }
                $result= $get_all_trip_list->get();  
            }else if($filter_from == '2'){
                 $get_all_trip_list = DB::table('trip_details as td')
                                ->join('reservation_details as rd','td.reservation_id','rd.reservation_id')
                                ->join('partner_details as pd','td.partner_id','pd.partner_id')
                                ->select('rd.reserve_unique_id','rd.phone','rd.start_date','rd.return_date','td.status','pd.partner_name','pd.partner_id')
                                ->where('td.status','1')
                                ->whereDay('td.created_at', '=', date('d'));
                $result= $get_all_trip_list->get();        
            }
            else if($filter_from == '2'){
                $get_all_trip_list = DB::table('trip_details as td')
                                ->join('reservation_details as rd','td.reservation_id','rd.reservation_id')
                                ->join('partner_details as pd','td.partner_id','pd.partner_id')
                                ->select('rd.reserve_unique_id','rd.phone','rd.start_date','rd.return_date','td.status','pd.partner_name','pd.partner_id')
                                ->where('td.status','1')
                                ->whereDay('td.created_at', '=', date('d'));
                $result= $get_all_trip_list->get();         
            }
            else if($filter_from == '3'){
                $get_all_trip_list = DB::table('trip_details as td')
                                ->join('reservation_details as rd','td.reservation_id','rd.reservation_id')
                                ->join('partner_details as pd','td.partner_id','pd.partner_id')
                                ->select('rd.reserve_unique_id','rd.phone','rd.start_date','rd.return_date','td.status','pd.partner_name','pd.partner_id')
                                ->where('td.status','1')
                                ->where('rd.start_date', '>=', date('Y-m-d'));
                $result= $get_all_trip_list->get();         
            }
            
            return Datatables::of($result)
                ->addColumn('reserve_unique_id', function ($result) {
                        $reserve_unique_id = '';
                        $reserve_unique_id .= '<center>'.ucfirst($result->reserve_unique_id).'</center>';
                       return $reserve_unique_id.'';
                    })
                ->addColumn('phone', function ($result) {
                        $phone = '';
                        $phone .= '<center>'.$result->phone.'</center>';
                       return $phone.'';
                    })  
                ->addColumn('partner_name', function ($result) {
                        $partner_name = '';
                        $partner_name .= '<center>'.$result->partner_name.'</center>';
                       return $partner_name.'';
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
                    $reser_list = Crypt::encryptString($result->partner_id);
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
                  return '<center><a href="'.url('reservations_details/'.Crypt::encryptString($result->partner_id).'').'" class="on-default edit-row" title="" target=""><i class="fa fa-eye" data-toggle="tooltip" title="Trip_details!"></i></a></center>';

                    }) 
             ->rawColumns(array("reserve_unique_id","phone","partner_name","start_date","return_date","status","action","crypt_id"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
      //endtrentygo
   
    
    public function reservations1(){
        return view('admin_dashboard/reservations1');
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
    public function countries(){
        $countries = array( "AF" => "Afghanistan",
                            "AX" => "Åland Islands",
                            "AL" => "Albania",
                            "DZ" => "Algeria",
                            "AS" => "American Samoa",
                            "AD" => "Andorra",
                            "AO" => "Angola",
                            "AI" => "Anguilla",
                            "AQ" => "Antarctica",
                            "AG" => "Antigua and Barbuda",
                            "AR" => "Argentina",
                            "AM" => "Armenia",
                            "AW" => "Aruba",
                            "AU" => "Australia",
                            "AT" => "Austria",
                            "AZ" => "Azerbaijan",
                            "BS" => "Bahamas",
                            "BH" => "Bahrain",
                            "BD" => "Bangladesh",
                            "BB" => "Barbados",
                            "BY" => "Belarus",
                            "BE" => "Belgium",
                            "BZ" => "Belize",
                            "BJ" => "Benin",
                            "BM" => "Bermuda",
                            "BT" => "Bhutan",
                            "BO" => "Bolivia",
                            "BA" => "Bosnia and Herzegovina",
                            "BW" => "Botswana",
                            "BV" => "Bouvet Island",
                            "BR" => "Brazil",
                            "IO" => "British Indian Ocean Territory",
                            "BN" => "Brunei Darussalam",
                            "BG" => "Bulgaria",
                            "BF" => "Burkina Faso",
                            "BI" => "Burundi",
                            "KH" => "Cambodia",
                            "CM" => "Cameroon",
                            "CA" => "Canada",
                            "CV" => "Cape Verde",
                            "KY" => "Cayman Islands",
                            "CF" => "Central African Republic",
                            "TD" => "Chad",
                            "CL" => "Chile",
                            "CN" => "China",
                            "CX" => "Christmas Island",
                            "CC" => "Cocos (Keeling) Islands",
                            "CO" => "Colombia",
                            "KM" => "Comoros",
                            "CG" => "Congo",
                            "CD" => "Congo, The Democratic Republic of The",
                            "CK" => "Cook Islands",
                            "CR" => "Costa Rica",
                            "CI" => "Cote D'ivoire",
                            "HR" => "Croatia",
                            "CU" => "Cuba",
                            "CY" => "Cyprus",
                            "CZ" => "Czech Republic",
                            "DK" => "Denmark",
                            "DJ" => "Djibouti",
                            "DM" => "Dominica",
                            "DO" => "Dominican Republic",
                            "EC" => "Ecuador",
                            "EG" => "Egypt",
                            "SV" => "El Salvador",
                            "GQ" => "Equatorial Guinea",
                            "ER" => "Eritrea",
                            "EE" => "Estonia",
                            "ET" => "Ethiopia",
                            "FK" => "Falkland Islands (Malvinas)",
                            "FO" => "Faroe Islands",
                            "FJ" => "Fiji",
                            "FI" => "Finland",
                            "FR" => "France",
                            "GF" => "French Guiana",
                            "PF" => "French Polynesia",
                            "TF" => "French Southern Territories",
                            "GA" => "Gabon",
                            "GM" => "Gambia",
                            "GE" => "Georgia",
                            "DE" => "Germany",
                            "GH" => "Ghana",
                            "GI" => "Gibraltar",
                            "GR" => "Greece",
                            "GL" => "Greenland",
                            "GD" => "Grenada",
                            "GP" => "Guadeloupe",
                            "GU" => "Guam",
                            "GT" => "Guatemala",
                            "GG" => "Guernsey",
                            "GN" => "Guinea",
                            "GW" => "Guinea-bissau",
                            "GY" => "Guyana",
                            "HT" => "Haiti",
                            "HM" => "Heard Island and Mcdonald Islands",
                            "VA" => "Holy See (Vatican City State)",
                            "HN" => "Honduras",
                            "HK" => "Hong Kong",
                            "HU" => "Hungary",
                            "IS" => "Iceland",
                            "IN" => "India",
                            "ID" => "Indonesia",
                            "IR" => "Iran, Islamic Republic of",
                            "IQ" => "Iraq",
                            "IE" => "Ireland",
                            "IM" => "Isle of Man",
                            "IL" => "Israel",
                            "IT" => "Italy",
                            "JM" => "Jamaica",
                            "JP" => "Japan",
                            "JE" => "Jersey",
                            "JO" => "Jordan",
                            "KZ" => "Kazakhstan",
                            "KE" => "Kenya",
                            "KI" => "Kiribati",
                            "KP" => "Korea, Democratic People's Republic of",
                            "KR" => "Korea, Republic of",
                            "KW" => "Kuwait",
                            "KG" => "Kyrgyzstan",
                            "LA" => "Lao People's Democratic Republic",
                            "LV" => "Latvia",
                            "LB" => "Lebanon",
                            "LS" => "Lesotho",
                            "LR" => "Liberia",
                            "LY" => "Libyan Arab Jamahiriya",
                            "LI" => "Liechtenstein",
                            "LT" => "Lithuania",
                            "LU" => "Luxembourg",
                            "MO" => "Macao",
                            "MK" => "Macedonia, The Former Yugoslav Republic of",
                            "MG" => "Madagascar",
                            "MW" => "Malawi",
                            "MY" => "Malaysia",
                            "MV" => "Maldives",
                            "ML" => "Mali",
                            "MT" => "Malta",
                            "MH" => "Marshall Islands",
                            "MQ" => "Martinique",
                            "MR" => "Mauritania",
                            "MU" => "Mauritius",
                            "YT" => "Mayotte",
                            "MX" => "Mexico",
                            "FM" => "Micronesia, Federated States of",
                            "MD" => "Moldova, Republic of",
                            "MC" => "Monaco",
                            "MN" => "Mongolia",
                            "ME" => "Montenegro",
                            "MS" => "Montserrat",
                            "MA" => "Morocco",
                            "MZ" => "Mozambique",
                            "MM" => "Myanmar",
                            "NA" => "Namibia",
                            "NR" => "Nauru",
                            "NP" => "Nepal",
                            "NL" => "Netherlands",
                            "AN" => "Netherlands Antilles",
                            "NC" => "New Caledonia",
                            "NZ" => "New Zealand",
                            "NI" => "Nicaragua",
                            "NE" => "Niger",
                            "NG" => "Nigeria",
                            "NU" => "Niue",
                            "NF" => "Norfolk Island",
                            "MP" => "Northern Mariana Islands",
                            "NO" => "Norway",
                            "OM" => "Oman",
                            "PK" => "Pakistan",
                            "PW" => "Palau",
                            "PS" => "Palestinian Territory, Occupied",
                            "PA" => "Panama",
                            "PG" => "Papua New Guinea",
                            "PY" => "Paraguay",
                            "PE" => "Peru",
                            "PH" => "Philippines",
                            "PN" => "Pitcairn",
                            "PL" => "Poland",
                            "PT" => "Portugal",
                            "PR" => "Puerto Rico",
                            "QA" => "Qatar",
                            "RE" => "Reunion",
                            "RO" => "Romania",
                            "RU" => "Russian Federation",
                            "RW" => "Rwanda",
                            "SH" => "Saint Helena",
                            "KN" => "Saint Kitts and Nevis",
                            "LC" => "Saint Lucia",
                            "PM" => "Saint Pierre and Miquelon",
                            "VC" => "Saint Vincent and The Grenadines",
                            "WS" => "Samoa",
                            "SM" => "San Marino",
                            "ST" => "Sao Tome and Principe",
                            "SA" => "Saudi Arabia",
                            "SN" => "Senegal",
                            "RS" => "Serbia",
                            "SC" => "Seychelles",
                            "SL" => "Sierra Leone",
                            "SG" => "Singapore",
                            "SK" => "Slovakia",
                            "SI" => "Slovenia",
                            "SB" => "Solomon Islands",
                            "SO" => "Somalia",
                            "ZA" => "South Africa",
                            "GS" => "South Georgia and The South Sandwich Islands",
                            "ES" => "Spain",
                            "LK" => "Sri Lanka",
                            "SD" => "Sudan",
                            "SR" => "Suriname",
                            "SJ" => "Svalbard and Jan Mayen",
                            "SZ" => "Swaziland",
                            "SE" => "Sweden",
                            "CH" => "Switzerland",
                            "SY" => "Syrian Arab Republic",
                            "TW" => "Taiwan, Province of China",
                            "TJ" => "Tajikistan",
                            "TZ" => "Tanzania, United Republic of",
                            "TH" => "Thailand",
                            "TL" => "Timor-leste",
                            "TG" => "Togo",
                            "TK" => "Tokelau",
                            "TO" => "Tonga",
                            "TT" => "Trinidad and Tobago",
                            "TN" => "Tunisia",
                            "TR" => "Turkey",
                            "TM" => "Turkmenistan",
                            "TC" => "Turks and Caicos Islands",
                            "TV" => "Tuvalu",
                            "UG" => "Uganda",
                            "UA" => "Ukraine",
                            "AE" => "United Arab Emirates",
                            "GB" => "United Kingdom",
                            "US" => "United States",
                            "UM" => "United States Minor Outlying Islands",
                            "UY" => "Uruguay",
                            "UZ" => "Uzbekistan",
                            "VU" => "Vanuatu",
                            "VE" => "Venezuela",
                            "VN" => "Viet Nam",
                            "VG" => "Virgin Islands, British",
                            "VI" => "Virgin Islands, U.S.",
                            "WF" => "Wallis and Futuna",
                            "EH" => "Western Sahara",
                            "YE" => "Yemen",
                            "ZM" => "Zambia",
                            "ZW" => "Zimbabwe"
                            );
        return $countries;
    }
}
