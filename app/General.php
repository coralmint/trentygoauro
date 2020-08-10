<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    public function insert($db= '', $param= '')
    {
    	DB::table($db)->insert($param);
    }

    public function insertGetId($db= '', $param= '')
    {
        return DB::table($db)->insertGetId($param);
    }

    public function updates($db='',$data='',$dbfield='', $id='')
    {
        DB::table($db)->where($dbfield, $id)->update($data);
    }

    public function updates2($db='',$data='',$dbfield='', $id='',$dbfield2='', $id2='')
    {
        DB::table($db)->where($dbfield, $id)->where($dbfield2, $id2)->update($data);
    }

    public function get_table($db= '')
    {
    	$user = DB::table($db)->get();
    	return $user->toArray();
    }

    public function get_table_where($db= '', $param= '',$param2= '')
    {
    	$user = DB::table($db)->where($param, $param2)->get();
    	return $user->toArray();
    }

    public function get_table_2where($db= '', $param= '',$param2= '',$param3= '',$param4= '')
    {
    	$user = DB::table($db)->where($param, $param2)->where($param3, $param4)->get();
    	return $user->toArray();
    }

    // public static function updateOrCreate($db='',$data='',$dbfield='', $id='',$dbfield2='', $id2='')
    // {
    //     $user = DB::table($db)->updateOrCreate($dbfield, $id,[$data]);
    // }

}