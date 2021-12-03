<?php

namespace App\Imports;

use App\DH_Model;
use Maatwebsite\Excel\Concerns\ToModel;

class DHImport implements ToModel
{
  public function model(array $row)
    {
        return new DH_Model([
            'pc' => $row[0],
			'description' => $row[1],
			'status' => $row[2],
			'category' => $row[3]
            
        ]);
    }
}