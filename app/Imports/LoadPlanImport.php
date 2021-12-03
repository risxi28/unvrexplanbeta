<?php

namespace App\Imports;

use App\ViewTransaksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LoadPlanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ViewTransaksi([            
            'id_material' => $row['no_sku'],
            'reff' => $row['reff'],
            'id_destination' => $row['destination'],
            'id_vendor' => $row['vendor'],
            'id_category' => $row['category'],
            'week' => $row['week'],
            'type_week' => $row['type_week'],
            'shipment_type' => $row['shipment_type'],
            'origin' => $row['origin'],
            '_volume' => $row['volume'],
            'total_quantity' => $row['total_quantity'],
            'FT40' => $row['ft40'],
            'FT20' => $row['ft20'],
            'LCL_AF' => $row['lcl_af'],
            'id_stuffing_place'=> $row['stuffing_place'],
            'stuffing_date' => $row['stuffing_date'],
            'invoice_no' => $row['no_invoice'],
            'bl_number' => $row['bl_nmber'],
            'shipping_line' => $row['shipping_line'],
            'vesel' => $row['vesel'],
            'etd' => $row['etd'],
            'eta' => $row['eta'],
        ]);
    }
}
