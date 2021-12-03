<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

use App\Imports\DHImport;

use Excel;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Excel::import(new PesertaImportCollection, $file);
            // Excel::import(new PesertaImport, $file);
            Excel::import(new DHImport, $file);


            return redirect('import/excel');
        }        
    }
}
