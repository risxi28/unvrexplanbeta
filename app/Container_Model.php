<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Container_Model extends Model

{
    protected $table = 'tb_container';
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $fillable = [
        'id_container',
        'id_tr_planning',
        'reff_a',
        'shipment_number',
        'container_number',
        'seal_number',
        'container_party'
    ];

}
