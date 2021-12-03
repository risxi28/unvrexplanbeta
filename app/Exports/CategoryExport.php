<?php

namespace App\Exports;

use App\Category_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('category.template_export', [
            'data' => Category_Model::all()
        ]);
    }
}
