<?php

namespace App\Imports;

use App\Material_Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class MaterialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Material_Model([
            
        'sku_no'=>$row[0],
        'Description' =>$row[1],
        'Aun'=>$row[2],
        'Numera'=>$row[3],
        'Denom'=>$row[4],
        'Length'=>$row[5],
        'Width'=>$row[6],
        'Height'=>$row[7],
        'Uni'=>$row[8],
        'Volume'=>$row[9],
        'VUn'=>$row[10],
        'Gross_weight'=>$row[11],
        'Net_Weight'=>$row[12],
        'Un'=>$row[13],
        'EAN_UPC'=>$row[14],
        'Ct'=>$row[15],
        'LuN'=>$row[16],
        'Number'=>$row[17],
        'PID'=>$row[18],
        'LID'=>$row[19],
        'CS_20FT_CBM'=>$row[20],
        'CS_40FT_CBM'=>$row[21],
        'CS_20FT_GW'=>$row[22],
        'CS_40FT_GW'=>$row[23],
        'CS_20ft'=>$row[24],
        'CS_40ft'=>$row[25]
        ]);
    }
}
