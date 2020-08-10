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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $role = Session::get('role');
        if($role == 1)
        {
            return view('admin_dashboard/dashboard');
        }else if($role == 2)
        {
            $logged_in_status = Session::get('logged_in_status');
            if($logged_in_status != '0'){
                $owner_id = Session::get('user_id');
                $owner_info = DB::table('owner_info')->where('owner_id',$owner_id)->get();
                $property_info = DB::table('property')->where('owner_id',$owner_id)->get();
                $open_document_info = DB::table('request_info as ri')
                                        ->leftJoin('property as p', 'p.property_id', 'ri.property_id')
                                        ->select('ri.request_name','ri.document_type','ri.due_date','ri.comments','p.property_name','p.property_id','ri.property_id as prop_id','ri.status','ri.request_info_id')
                                        ->where('ri.owner_id',$owner_id)
                                        ->where('ri.status',0)->get();
                $closed_document_info = DB::table('request_info as ri')
                                        ->leftJoin('property as p', 'p.property_id', 'ri.property_id')
                                        ->select('ri.request_name','ri.document_type','ri.due_date','ri.comments','p.property_name','p.property_id','ri.property_id as prop_id','ri.status','ri.request_info_id')
                                        ->where('ri.owner_id',$owner_id)
                                        ->where('ri.status',1)->get();
                $open_doc_id = DB::table('request_info')->where('owner_id',$owner_id)->where('status',0)->pluck('request_info_id')->toArray();
                $open_document_id = json_encode($open_doc_id);
                $close_doc_id = DB::table('request_info')->where('owner_id',$owner_id)->where('status',1)->pluck('request_info_id')->toArray();
                $close_document_id = json_encode($close_doc_id);
                // print_r($close_document_id);
                // die();
                return view('user_dashboard/ownerdashboard')
                            ->with('owner_id',$owner_id)
                            ->with('owner_info',$owner_info)
                            ->with('open_document_id',$open_document_id)
                            ->with('close_document_id',$close_document_id)
                            ->with('open_document_info',$open_document_info)
                            ->with('closed_document_info',$closed_document_info)
                            ->with('property_info',$property_info);
            }else{
                return view('user_dashboard/password_reset');
            }
        }else{
            return view('auth/login');
        }
    }
    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }
}
