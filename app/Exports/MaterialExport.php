<?php

namespace App\Exports;

use App\Material_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class MaterialExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('material.template_export', [
            'data' => Material_Model::all()
        ]);
    }
}
