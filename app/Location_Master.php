<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location_Master extends Model
{
    public $table = "location_master";
    public $primaryKey='location_master_id';
    protected $fillable = [
        'location_master_id',
        'source',
        'destination',
        'status',
        'created_at',
        'modified_at'
    ];
}
