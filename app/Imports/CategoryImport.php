<?php

namespace App\Imports;

use App\Category_Model;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category_Model([
            'category' => $row['category']
            
        ]);
    }
}
