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

class CustomerController extends Controller
{
      public function my_profile(){
        $customer_id = Session::get('user_id');
        $customer_info = DB::table('customer_details')->where('customer_id',$customer_id)->get();
        $cus_reserv_details = DB :: table('reservation_details')
                        ->where('customer_id',$customer_id)
                        ->get();
        $pick_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.pick_up_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.pick_up_location_id')
                               ->where('rd.customer_id',$customer_id)
                                ->get();
                                
        $drop_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.drop_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.drop_location_id')
                                ->where('rd.customer_id',$customer_id)
                                ->get(); 
        $partner_details = DB :: table('reservation_details as rd')
                            ->join('partner_details as pd','rd.partner_id','pd.partner_id')
                            ->select('pd.partner_name')
                            ->where('rd.customer_id',$customer_id)
                            ->get();
                          
        $vehicle_details = DB :: table('vehicle_details')
                            ->where('vehicle_id',$cus_reserv_details[0]->vehicle_id)
                            ->get(); 
                            
        $baby_seats = DB::table('vehicle_features')
                            ->where('vehicle_id',$cus_reserv_details[0]->vehicle_id)
                            ->where('option_name',26)->count(); 
                            
        $partnercomment = DB::table('comments as cs')
                        ->where('cs.reservation_id',$cus_reserv_details[0]->reservation_id)
                        ->where('cs.comment_from',1)
                        ->orderBy('cs.comment_date', 'asc')
                        ->get();                    
                            
        return view('customer_dashboard/customerportal')
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
    
    public function customer_dashboard(Request $req){
                $customer_id = Session::get('user_id');
        $customer_info = DB::table('customer_details')->where('customer_id',$customer_id)->get();
        $cus_reserv_details = DB :: table('reservation_details')
                        ->where('customer_id',$customer_id)
                        ->get();
                        
        $pick_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.pick_up_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.pick_up_location_id')
                               ->where('rd.customer_id',$customer_id)
                                ->get();
                                
        $drop_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.drop_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.drop_location_id')
                                ->where('rd.customer_id',$customer_id)
                                ->get(); 
        $partner_details = DB :: table('reservation_details as rd')
                            ->join('partner_details as pd','rd.partner_id','pd.partner_id')
                            ->select('pd.partner_name')
                            ->where('rd.customer_id',$customer_id)
                            ->get();
                          
        $vehicle_details = DB :: table('vehicle_details')
                            ->where('vehicle_id',$cus_reserv_details[0]->vehicle_id)
                            ->get(); 
                            
        $baby_seats = DB::table('vehicle_features')
                            ->where('vehicle_id',$cus_reserv_details[0]->vehicle_id)
                            ->where('option_name',26)->count(); 
                            
        $partnercomment = DB::table('comments as cs')
                        ->where('cs.reservation_id',$cus_reserv_details[0]->reservation_id)
                        ->where('cs.comment_from',1)
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
    
    public function update_customer_details(Request $req){
            DB::table('reservation_details')
                ->updateOrInsert(
                    ['reservation_id' => $req->reservation_id],
                    ['reservation_id' => $req->reservation_id,
                     'customer_id' => $req->customer_id,
                    'first_name' => $req->first_name,
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
                    'country_code' => $req->country_code,
                    'license_number' => $req->license_number,
                    'license_issue_date' => $req->license_issue_date,]
                );
            return json_encode('success');
        
    }
    
     public function cus_add_billing_details(Request $req){
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
    
    public function cus_send_message(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
                        'reservation_id' => $req->reservation_id,
                        'comment' => $req->cus_msg,
                        'admin_id' => '0',
                        'sent_from' => $req->customer_id,
                        'customer_id' => $req->customer_id,
                        'comment_from' => '1',
                        'comment_date' => $curent_date,
                        );
       
        DB::table('comments')->insert($data);
        return json_encode('success');
    }
    public function customer_reservationlist(){ 
        return view('customer_dashboard/customer_reservationlist');
    }
    public function get_all_customer_reservation_list(){
        $customer_id = Session::get('user_id');

        try {
           $get_all_reservation = DB::table('reservation_details as rd')
                                    ->where('rd.customer_id',$customer_id)
                                    ->get();
            return Datatables::of($get_all_reservation)
                ->addColumn('reservation_id', function ($get_all_reservation) {
                        $reservation_id = '';
                        $reservation_id .= '<center>'.ucfirst($get_all_reservation->reserve_unique_id).'</center>';
                       return $reservation_id.'';
                    })
                ->addColumn('first_name', function ($get_all_reservation) {
                        $first_name = '';
                        $first_name .= '<center>'.$get_all_reservation->first_name.'</center>';
                       return $first_name.'';
                    })
                ->addColumn('phone', function ($get_all_reservation) {
                        $phone = '';
                        $phone .= '<center>'.$get_all_reservation->phone.'</center>';
                       return $phone.'';
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
                  return '<center><a href="'.url('customer_dashboard/'.Crypt::encryptString($get_all_reservation->reservation_id).'').'" class="on-default edit-row" title="" target=""><i class="fa fa-eye" data-toggle="tooltip" title="reservation_details!"></i></a></center>';

                    }) 
             ->rawColumns(array("reservation_id","phone","first_name","start_date","return_date","status","action","crypt_id","vehicle_no"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    
    public function customer_reservation(Request $req){
        $customer_id = Session::get('user_id');
        $reservation_id = Crypt::decryptString($req->id);
        
        $cus_reserv_details = DB :: table('reservation_details')
                        ->where('customer_id',$customer_id)
                        ->get();
        
        $pick_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.pick_up_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.pick_up_location_id')
                               ->where('rd.customer_id',$customer_id)
                                ->get();
                                
        $drop_up_location = DB::table('location_master as lm')
                                ->join('reservation_details as rd','lm.location_master_id','rd.drop_location_id')
                                ->select('lm.location_name','lm.location_master_id','rd.drop_location_id')
                                ->where('rd.customer_id',$customer_id)
                                ->get(); 
                                
        $vehicle_details = DB :: table('vehicle_details')
                            ->where('vehicle_id',$cus_reserv_details[0]->vehicle_id)
                            ->get();                        
    
        return view('customer_dashboard/customer_reservation')
                    ->with('customer_id',$customer_id)
                    ->with('cus_reserv_details',$cus_reserv_details)
                    ->with('pick_up_location',$pick_up_location)
                    ->with('drop_up_location',$drop_up_location)
                    ->with('vehicle_details',$vehicle_details);
    }
    
}