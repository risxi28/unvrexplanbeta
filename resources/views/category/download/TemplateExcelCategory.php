<?php

namespace App\Exports;

use App\Category_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class TemplateExcelCategory implements FromView
{
    
    public function view(): View
    {
        return view('category.template_excel');
    }
}