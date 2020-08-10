<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation_Details extends Model
{
    public $table = "reservation_details";
    public $primaryKey='reservation_id';
    protected $fillable = [
        'reservation_id',
        'name',
        'phone',
        'email',
        'address',
        'for_name',
        'for_phone',
        'for_email',
        'for_address',
        'pick_up_location_id',
        'drop_location_id',
        'reservation_date',
        'deposit_amount',
        'discount_id',
        'coupon_id',
        'reservation_status',
        'trip_status',
        'created_at',
        'modified_at'
    ];
}
