<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenerisasi_Model extends Model
{
    protected $table = 'tb_transaksi';

    protected $primaryKey = 'id_planing';

    protected $fillable = [
    	'id_material',
    	'reff',
    	'id_destination',
        'id_vendor',
        'id_category',
        'week',
        'type_week',
        'shipment_type',
        'origin',
        '_volume',
        'total_quantity',
        'FT40',
        'FT20',
        'LCL_AF',
        'id_stuffing_place',
        'stuffing_date',
        'invoice_no',
        'bl_number',
        'shipping_line',
        'vesel',
        'etd',
        'eta'
    ];

  
    public function get_material(){
        return $this->belongsTo('App\\Model\\Material_Model', 'tb_material', 'id_material');
    }
    public function get_destination(){
        return $this->belongsTo('App\\Model\\Destination_Model', 'tb_destination', 'id_destination');
    }
    public function get_vendor(){
        return $this->belongsTo('App\\Model\\Vendor_Model', 'tb_vendor', 'id_vendor');
    }
    public function get_cetegory(){
        return $this->belongsTo('App\\Model\\Category_Model', 'tb_category', 'id_category');
    }
    public function get_stuffing_place(){
        return $this->belongsTo('App\\Model\\wh_Model', 'tb_stuffing_place', 'id_st_place');
    }

}
