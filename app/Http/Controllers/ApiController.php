<?php

namespace App\Http\Controllers;
use App\General;
use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use Log;
use response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\User;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        Log::info("index");
    }

    // public function mech_login(Request $request)
    // {
    //     // return $request;
    //     if ($this->attemptLogin($request)) {
    //         $user = Auth::user();
    //         $success['token'] = $user->createToken('MyApp')->accessToken;
    //         $success['user'] = $user;   
    //         return response()->json($success, 200);
    //     }
    //     return $this->sendFailedLoginResponse($request);
    // }

    public function mech_login(Request $req){
        // $response = $req->request('POST', '/api/mech_login?api_token='.$token);
        // return $response;
        
        // Log::info("Request".$req);
        // Log::debug($req->input(["username"]));
        $mechanical_count = DB::table('mechanic')
                ->where([
                    ['mechanic_phone', '=', $req->username],
                    ['password', '=', $req->password],
                    ])
                ->orWhere([
                    ['mechanic_email', '=', $req->username],
                    ['password', '=', $req->password],
                    ])
                ->count();
        if($mechanical_count != 0){
            $mechanic_info = DB::table('mechanic')
                    ->where([
                        ['mechanic_phone', '=', $req->username],
                        ['password', '=', $req->password],
                        ])
                    ->orWhere([
                        ['mechanic_email', '=', $req->username],
                        ['password', '=', $req->password],
                        ])
                    ->get();
                    
        }else{
            $mechanic_info = 0;
        }
        return json_encode($mechanic_info);
    }
    
    // public function mech_register(Request $req){
    //     $db = new General();
    //     $mechanical_count = DB::table('mechanic')
    //             ->where([
    //                 ['mechanic_phone', '=', $req->username],
    //                 ['password', '=', $req->password],
    //                 ])
    //             ->orWhere([
    //                 ['mechanic_email', '=', $req->username],
    //                 ['password', '=', $req->password],
    //                 ])
    //             ->count();
    //     if($mechanical_count==0)
    //     {
    //         if($req->password == $req->confirm_password){
                
    //             $data = array(
    //                         'mechanic_firstname' => $req->firstname,
    //                         'mechanic_lastname' => $req->lastname,
    //                         'mechanic_email' => $req->email,
    //                         'mechanic_phone' => $req->phone,
    //                         'password' => $req->password,
    //                         'job_desc' => $req->job_desc,
    //                          'emp_id' => $req->emp_id,
    //                          'api_token' => Str::random(60),
    //                         );
    //             $db->insert('mechanic',$data);
    //             $insert_id = DB::getPdo()->lastInsertId();
    //             $mech_info = DB::table('mechanic')->where('mechanic_id',$insert_id)->get();
    //               $mech_info = "Success";
    //         }else{
    //             $mech_info = "Doesn't match password";
    //         }
    //     }
    //     else
    //     {
    //         $mech_info="Email id/Mobile number already exists";
    //     }
    //     echo json_encode($mech_info);
    // }
    
    public function mech_register(Request $req){
        $db = new General();
        $mechanical_count = DB::table('mechanic')
                ->where([
                    ['mechanic_phone', '=', $req->phone],
                    ['password', '=', $req->password],
                    ])
                ->orWhere([
                    ['mechanic_email', '=', $req->email],
                    ['password', '=', $req->password],
                    ])
                ->count();
        if($mechanical_count==0)
        {
            if($req->password == $req->confirm_password){
                
                $data = array(
                            'mechanic_firstname' => $req->firstname,
                            'mechanic_lastname' => $req->lastname,
                            'mechanic_email' => $req->email,
                            'mechanic_phone' => $req->phone,
                            'password' => $req->password,
                            'job_desc' => $req->job_desc,
                             'emp_id' => $req->emp_id,
                             'api_token' => Str::random(60),
                            );
                $data1 = array(
                            'name' => $req->firstname,
                            'email' => $req->email,
                            'phone' => $req->phone,
                            'password' => Hash::make($req->password)
                            );
                $db->insert('mechanic',$data);
                $db->insert('users',$data1);
                $insert_id = DB::getPdo()->lastInsertId();
                $mech_info = DB::table('mechanic')->where('mechanic_id',$insert_id)->get();
                  $mech_info = "Success";
            }else{
                $mech_info = "Doesn't match password";
            }
        }
        else
        {
            $mech_info="Email id/Mobile number already exists";
        }
        echo json_encode($mech_info);
    }
    
    public function mechanic_total_reward_point(Request $req){
        
        // Log::info("index");
        // $total_reward_point = DB::table('mechanic_invoice')
        //                     ->where('mechanic_id',$req->mech_id)
        //                     ->where('purchase_status',1)
        //                     ->select(DB::raw("SUM(loyalty_point) as total_reward_point"))
        //                     ->get();
        
        // return $total_reward_point;
    }
    
    public function mechanic_total_redeemed_point(Request $req){
        // Log::info("index");
        $total_redeemed_point = DB::table('mechanic_invoice')
                            ->where('mechanic_id',$req->mech_id)
                            ->where('purchase_status',1)
                            ->select(DB::raw("SUM(redeemed_point) as total_redeemed_point"))
                            ->get();
        return $total_redeemed_point;
    }
    
    public function mechanic_current_reward_point(Request $req){
        // Log::info("index");
        $current_reward_point = DB::table('mechanic_invoice')
                            ->where('mechanic_id',$req->mech_id)
                            ->where('purchase_status',1)
                            ->select(DB::raw("SUM(loyalty_point)-SUM(redeemed_point) as current_reward_point"))
                            ->get();
        return ($current_reward_point);
    }
    
    public function mechanic_quantity_purchased(Request $req){
        // Log::info("index");
        $total_quantity_purchased = DB::table('mechanic_invoice')
                            ->where('mechanic_id',$req->mech_id)
                            ->where('purchase_status',1)
                            ->select(DB::raw("SUM(quantity) as total_quantity_purchased"))
                            ->get();
        return json_encode($total_quantity_purchased);
    }
    
    public function mechanic_my_progress(Request $req) {
        if($req->mech_id != ''){
        $result=[];
        $a = json_decode($this->mechanic_total_reward_point($req));
        $b = json_decode($this->mechanic_total_redeemed_point($req));
        $c = json_decode($this->mechanic_current_reward_point($req));
        $d = json_decode($this->mechanic_quantity_purchased($req));
        
        $result= array(key($a[0]) => $a[0]->total_reward_point,
         key($b[0]) => $b[0]->total_redeemed_point,
         key($c[0]) => $c[0]->current_reward_point,
         key($d[0]) => $d[0]->total_quantity_purchased);
        
        // $result = ([key($a[0]) => $a[0]->total_reward_point]);
        // $result= ([key($b[0]) => $b[0]->total_redeemed_point]);
        // array_push($result,[key($c[0]) => $c[0]->current_reward_point]);
        // array_push($result,[key($d[0]) => $d[0]->total_quantity_purchased]);
        // $result = array_merge($a,$b,$c,$d); 
        
        return json_encode($result);
        
        }else{
         $a = 'Mechanic ID not found !!';
         echo json_encode($a); 
        }
    }
    
    public function mechanic_get_retailer_id(Request $req){
        // Log::info("index");
        $retailer_info = DB::table('retailer')->where('qrcode_key',$req->qr_key)->count();
        if($retailer_info != 0){
            return json_encode($retailer_info);
        }else{
            $error = 'Retailer not found !!';
            return json_encode($error);
        }
    }
    
    public function mechanic_get_products(){
        // Log::info("index");
        $product_list = DB::table('product')->select('product_name','product_type','product_sku','product_package_type','product_image_url','product_price')->where('status',0)->get();
        return json_encode($product_list);
    }
    
    public function mechanic_create_invoice(Request $req){
        $db = new General();
        $curent_date = date('Y-m-d H:i:s');
        $mechanic_info = DB::table('mechanic')->where('mechanic_id',$req->mech_id)->get();
                $data = array(
                            'mechanic_id' => $req->mech_id,
                            'product_id' => $req->product_id,
                            'quantity' => $req->product_qty,
                            'retailer_id' => $req->retailer_id,
                            'total_invoice_amount' => $req->total_inv_amt,
                            'purchase_by' => $req->purchase_by,
                            'redeemed_point' => $req->redeemed_point,
                            'purchase_date' => $curent_date
                            ); 
                $db->insert('mechanic_invoice',$data);
                $invoice_id = DB::getPdo()->lastInsertId();
                $invoice_info = DB::table('mechanic_invoice')->where('mechanic_invoice_id',$invoice_id)->get();
                if(empty($invoice_id)){
                    $msg = 'Invoice creation failed, Not enough points';
                }else{
                    $msg = $invoice_id;
                }
        return json_encode($msg);
    }
    
    public function mechanic_view_invoice(Request $req){
        $invoice_info = DB::table('mechanic_invoice as inv')
                        ->join('product as pro','inv.product_id','=','pro.product_id')
                        ->select('inv.mechanic_invoice_id','inv.quantity','inv.total_invoice_amount','inv.purchase_by','inv.loyalty_point','inv.redeemed_point','inv.purchase_date','pro.product_name','pro.product_type','pro.product_sku','pro.product_image_url','pro.product_price')
                        ->where('inv.mechanic_invoice_id',$req->invoice_id)
                        ->where('inv.mechanic_id',$req->mech_id)->get();
        return json_encode($invoice_info);
    }
    
    public function mechanic_purchase_history_period(Request $req){
        $invoice_info = DB::table('mechanic_invoice')
                        ->select('mechanic_invoice_id','total_invoice_amount','purchase_by','loyalty_point','redeemed_point','purchase_date','purchase_status')
                        ->where('mechanic_id', '>=',$req->mech_id)
                        ->where('purchase_date', '>=',$req->from_date)
                        ->where('purchase_date', '<=',$req->to_date)
                        ->get();
        return json_encode($invoice_info);
    }
    
    public function mechanic_profile(Request $req){
        $mechanic_info = DB::table('mechanic')
                        ->where('mechanic_id', '=',$req->mech_id)
                        ->get();
        return json_encode($mechanic_info);
    }
    
    
    
}