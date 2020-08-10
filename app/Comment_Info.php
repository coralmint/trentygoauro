<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_Info extends Model
{
    public $table = "comment_info";
    public $primaryKey='comment_id';
    protected $fillable = [
        'comment_id',
        'admin_id',
        'partner_id',
        'comment',
        'comment_for',
        'comment_date',
        'status',
        'created_at',
        'modified_at'
    ];
}
