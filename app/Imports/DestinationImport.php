<?php

namespace App\Imports;

use App\Destination_Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DestinationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Destination_Model([
            'destination' =>$row['destination'],
            'country' => $row['country'],
            'country_code' => $row['country_code']
        ]);
    }
}
