<?php

namespace App\Exports;

use App\Vendor_Model;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class VendorExport implements FromView
{
    use Exportable;
    
    public function view(): View
    {
        return view('vendor.template_export', [
            'data' => Vendor_Model::all()
        ]);
    }
}
