<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\ViewTransaksi;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Input;
use App\Providers\SweetAlertServiceProvider;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ViewTransaksi::All();
        return view('loadplan.index', compact('data'));
    }

}
