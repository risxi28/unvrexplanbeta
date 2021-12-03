<?php

namespace App\Exports;

use App\wh_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class TemplateExcelwh implements FromView
{
    
    public function view(): View
    {
        return view('wh.template_excel');
    }
}