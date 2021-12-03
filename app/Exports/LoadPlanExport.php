<?php

namespace App\Exports;

use App\LoadPlan_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class TemplateExcelLoadplan implements FromView
{
    
    public function view(): View
    {
        return view('loadplan.template_excel');
    }
}