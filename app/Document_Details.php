<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_Details extends Model 
{
    public $table = "document_details";
    public $primaryKey='document_details_id';
    protected $fillable = [
        'document_details_id',
        'reservation_id',
        'partner_id',
        'vehicle_id',
        'file_for',
        'file_detail',
        'file_type',
        'file_name',
        'file_desc',
        'file_ext',
        'file_tag',
        'file_orginal_name',
        'file_url',
        'file_path',
        'status',
        'created_at',
        'modified_at'
    ];
}
