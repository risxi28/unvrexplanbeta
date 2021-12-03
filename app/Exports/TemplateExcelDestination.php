<?php

namespace App\Exports;

use App\Destination_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class TemplateExcelDestination implements FromView
{
    
    public function view(): View
    {
        return view('destination.template_excel');
    }
}