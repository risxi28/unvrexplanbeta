<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Material_Model extends Model
{
    protected $table = 'tb_material';
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $fillable = [
        'id_material',
        'sku_no',
        'Description',
        'Aun',
        'Numera',
        'Denom',
        'Length',
        'Width',
        'Height',
        'Uni',
        'Volume',
        'VUn',
        'Gross_weight',
        'Net_Weight',
        'Un',
        'EAN_UPC',
        'Ct',
        'LuN',
        'Number',
        'PID',
        'LID',
        'CS_20FT_CBM',
        'CS_40FT_CBM',
        'CS_20FT_GW',
        'CS_40FT_GW',
        'CS_20ft',
        'CS_40ft',
        'GW_CS'
    ];
}
