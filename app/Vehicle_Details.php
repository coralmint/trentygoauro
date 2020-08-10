<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Details extends Model
{
    public $table = "vehicle_details";
    public $primaryKey='vehicle_id';
    protected $fillable = [
        'vehicle_id',
        'vehicle_partner_id',
        'vehicle_model',
        'vehicle_brand',
        'vehicle_reg_no',
        'vehicle_reg_year',
        'vehicle_color',
        'vehicle_fuel_type',
        'vehicle_running_km',
        'driving_mode',
        'vehicle_seat_count',
        'vehicle_max_speed',
        'vehicle_condition',
        'available_status',
        'status',
        'created_at',
        'modified_at'
    ];
}
