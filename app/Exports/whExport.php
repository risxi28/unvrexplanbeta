<?php

namespace App\Exports;

use App\wh_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class whExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('wh.template_export', [
            'data' => wh_Model::all()
        ]);
    }
}
