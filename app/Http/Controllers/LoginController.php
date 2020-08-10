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

class LoginController extends Controller
{
     public function login(){
        return view('admin_dashboard/login');
    }
  /*  public function add_new_retailer(Request $req){
        $curent_date = date('Y-m-d H:i:s');
        $data = array(
        'retailer_name' => $req->retailer_name,
        'retailer_phone' => $req->retailer_phone,
        'retailer_email' => $req->retailer_email,
        'firm_name' => $req->retailer_firm_name,
        'retailer_address' => $req->retailer_address,
        'mechanic_list' => $req->mechanic_list_string,
        'created_at' => $curent_date,
        );
        $db = new General();
        $db->insert('retailer',$data);
        return json_encode('success');
    }
    public function get_all_retailer(){
        try {
            $get_all_retailer = DB::table('retailer')->where('status','0')->get();
            return Datatables::of($get_all_retailer)
             ->addColumn('action', function ($get_all_retailer) {
               return '<a href="'.url('view_retailer/'.Crypt::encryptString($get_all_retailer->retailer_id).'').'" class="hidden on-editing" title="" data-original-title="view"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
               <a href="'.url('edit_retailer/'.Crypt::encryptString($get_all_retailer->retailer_id).'').'" class="on-default edit-row" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
               <a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return delete_retailer_info( '.$get_all_retailer->retailer_id.',1);"><i class="fa fa-trash-o"></i></a>';
                })
             ->rawColumns(array("action"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    public function deleted_retailer_list(){
        return view('admin_dashboard/retailer/deleted_retailer_list');
    }
    public function get_deleted_retailer_list(){
        try {
            $get_deleted_retailer_list = DB::table('retailer')->where('status','1')->get();
            return Datatables::of($get_deleted_retailer_list)
             ->addColumn('action', function ($get_deleted_retailer_list) {
               return '<a href="'.url('view_retailer/'.Crypt::encryptString($get_deleted_retailer_list->retailer_id).'').'" class="hidden on-editing" title="" data-original-title="view"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
               <a href="'.url('edit_retailer/'.Crypt::encryptString($get_deleted_retailer_list->retailer_id).'').'" class="on-default edit-row" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
               <a style="cursor:pointer; color:#007bff;" class="on-default remove-row" title="" data-original-title="Delete" onclick="return un_delete_retailer_info( '.$get_deleted_retailer_list->retailer_id.',0);"><i class="fa fa-trash-o"></i></a>';
                })
             ->rawColumns(array("action"))
             ->make(true);
        } catch (QueryException $e) {
            echo "Bad Request";
            dd(); 
        }
    }
    public function delete_retailer_details(Request $req)
    {
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        $data = array(
            'status' => $req->status,
            'modified_at' => $curent_date
        );
        $db->updates('retailer',$data,'retailer_id',$req->retailer_id);
        return json_encode('success');
    }
    public function un_delete_retailer_details(Request $req)
    {
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        $data = array(
            'status' => $req->status,
            'modified_at' => $curent_date
        );
        $db->updates('retailer',$data,'retailer_id',$req->retailer_id);
        return json_encode('success');
    }
    public function edit_retailer_details(Request $req)
    {
        $curent_date = date('Y-m-d H:i:s');
        $db = new General();
        $data = array(
            'retailer_name' => $req->edit_retailer_name,
            'retailer_phone' => $req->edit_retailer_phone,
            'retailer_email' => $req->edit_retailer_email,
            'firm_name' => $req->edit_retailer_firm_name,
            'retailer_address' => $req->edit_retailer_address,                        
            'modified_at' => $curent_date
        );
        $db->updates('retailer',$data,'retailer_id',$req->retailer_id);
        return json_encode('success');
    }
    public function view_retailer(Request $req){
        $retailer_id = Crypt::decryptString($req->id);
        $retailer_info = DB::table('retailer')->where('retailer_id',$retailer_id)->get();
        return view('admin_dashboard/retailer/view_retailer')->with('retailer_info',$retailer_info);
    }
    public function edit_retailer(Request $req){
        $retailer_id = Crypt::decryptString($req->id);
        $retailer_info = DB::table('retailer')->where('retailer_id',$retailer_id)->get();
        return view('admin_dashboard/retailer/edit_retailer')->with('retailer_info',$retailer_info);
    }*/
}