<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class wh_Model extends Model
{
    protected $table = 'tb_stuffing_place';
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $fillable = [
        'id_st_place',
        'location'
    ];
}
