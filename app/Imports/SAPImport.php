<?php

namespace App\Imports;

use App\SAPModel;
use Maatwebsite\Excel\Concerns\ToModel;

class SAPImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SAPModel([
		'Description'=> $row[0],
		'Aun'=> $row[1],
		'Numera'=> $row[2],
		'Denom'=> $row[3],
		'Length'=> $row[4],
		'Width'=> $row[5],
		'Height'=> $row[6],
		'Uni'=> $row[7],
		'Volume'=> $row[8],
		'VUn'=> $row[9],
		'Gross_weight'=> $row[10],
		'Net_Weight'=> $row[11],
		'Un'=> $row[12],
		'EAN_UPC'=> $row[13],
		'Ct'=> $row[14],
		'LuN'=> $row[15],
		'Number'=> $row[16],
		'PID'=> $row[17]
		//'LID'=> $row[19],
		//'CS_20FT_CBM'=> $row[20],
		//'CS_40FT_CBM'=> $row[21],
		//'CS_20FT_GW'=> $row[22],
		//'CS_40FT_GW'=> $row[23],
		//'CS_20ft'=> $row[24],
		//'CS_40ft'=> $row[25]
            
        ]);
    }
}

