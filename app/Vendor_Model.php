<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor_Model extends Model
{
    protected $table = 'tb_vendor';
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $fillable = [
        'id_vendor',
        'vendor_name'
    ];
}
