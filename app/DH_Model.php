<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DH_Model extends Model
{
    protected $table = 'tb_dh';
    use SoftDeletes;
    protected $dates =['deleted_at'];
    //protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
		'id_dh',
		'pc',
        'description',
        'status',
        'category'
    ];
}
