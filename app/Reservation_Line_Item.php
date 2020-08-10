<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation_Line_Item extends Model 
{
    public $table = "reservation_line_item";
    public $primaryKey='reservation_line_item_id';
    protected $fillable = [
        'reservation_line_item_id',
        'reservation_id',
        'trip_date',
        'no_of_person',
        'vehicle_id',
        'vehicle_color',
        'vehicle_type',
        'vehicle_model',
        'vehicle_brand',
        'fuel_type',
        'driving_type',
        'baby_seat',
        'baby_seat_count',
        'spare_tyre',
        'cup_holder',
        'charger',
        'ac',
        'sun_roof',
        'no_of_seat',
        'rate_per_hour',
        'pre_running_km',
        'past_running_km',
        'pre_description',
        'past_description',
        'driver_name',
        'driver_phone',
        'driver_email',
        'total_amount',
        'discount_amount',
        'admin_remark',
        'status',
        'created_at',
        'modified_at'
    ];
}
