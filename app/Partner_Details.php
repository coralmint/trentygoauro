<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Partner_Details extends Model
{
    public $table = "partner_details";
    public $primaryKey='partner_id';
    protected $fillable = [
        'partner_id',
        'unique_partner_id',
        'partner_name',
        'partner_phone',
        'partner_email',
        'partner_vehicles_no',
        'partner_door_no',
        'partner_area',
        'partner_street',
        'partner_postalcode',
        'partner_country',
        'partner_auto_approve',
        'partner_commision',
        'status',
        'created_at',
        'modified_at'
    ];
}
