<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoadPlan_Model extends Model
{
    protected $table = 'tr_planing';
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $fillable = [
		'id_planing',
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
		'40FT',
		'20FT',
		'LCL_AF',
		'id_stuffing_place',
		'stuffing_date',
		'invoice_no',
		'bl_number',
		'shipping_line',
		'vesel',
		'etd',
		'eta',
		
    ];
	  public function upload_file($filename){    
	  $this->load->library('upload'); // Load librari upload        
	  $config['upload_path'] = '/excel/';    
	  $config['allowed_types'] = 'xlsx';    
	  $config['max_size']  = '2048';    
	  $config['overwrite'] = true;    
	  $config['file_name'] = $filename;      
	  $this->upload->initialize($config); // Load konfigurasi uploadnya    
	  if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil      
	  // Jika berhasil :      
	  $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
	  return $return;    }else{      
	  // Jika gagal :      
	  $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      
	  return $return;    }  
	  }
	  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data  
	  public function insert_multiple($data){    
	  $this->db->insert_batch('tr_planing', $data);  
	  }
}
