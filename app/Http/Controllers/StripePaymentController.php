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
use Illuminate\Support\Facades\Password;use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $req)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $req->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
        
        if($req->customer_id != ''){
            $customer_info = DB::table('customer_details')->where('customer_id',$req->customer_id)->get();
            $resrvation_info = DB::table('reservation_details')->where('customer_id',$customer_info[0]->customer_id)->orderBy('created_at', 'DESC')->first();
            $customer_payment_data = array(
                        'paid_amount' => $req->input_dynamic_rent_value,
                        );
            $db->updates('reservation_details',$idata,'reservation_id',$resrvation_info[0]->reservation_id);    
        }
        
        Session::flash('success', 'Payment successful!');
          
        return json_encode("success");
    }
}