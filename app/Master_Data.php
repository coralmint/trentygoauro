<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_Data extends Model
{ 
    public $table = "master_data";
    public $primaryKey='master_data_id';
    protected $fillable = [
        'master_data_id',
        'master_for',
        'master_key',
        'master_value',
        'status',
        'created_at',
        'modified_at'
    ];
}