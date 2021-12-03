<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_Model extends Model
{
    protected $table = 'tb_category';
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $fillable = [
        'id_category',
        'category'
    ];
}
