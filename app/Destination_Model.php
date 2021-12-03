<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination_Model extends Model
{
    protected $table = 'tb_destination';
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $fillable = [
        'id_destination',
        'destination',
        'country',
        'country code'
    ];
}
