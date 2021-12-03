<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\LoadPlan_Model;
use App\Material_Model;
use App\Destination_Model;
use App\Category_Model;
use App\Vendor_Model;
use App\Contenerisasi_Model;
use App\wh_Model;
use PDF;
use App\Exports\LoadPlanExport;
use App\Imports\LoadPlanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Input;
use App\Providers\SweetAlertServiceProvider;
use Response;
use Storage;
use Session;

class ContenerisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     public function index()
    {
        $data = Contenerisasi_Model::All();
        return view('contenerisasi.index', compact('data'));
    }
    public function search(Request $request){
    
        $query = $request->get('q'); 
        $data  = Contenerisasi_Model::where('reff', 'LIKE', '%' . $query . '%')->paginate(10);
        $data2 = Contenerisasi_Model::where('util_40cmb')->first();
        $data3 = Contenerisasi_Model::where('util_40gw')->first();
        $data4 = Contenerisasi_Model::where('util_20cmb')->first();
        $data5 = Contenerisasi_Model::where('util_20gw')->first();
        return view('contenerisasi.result', compact('data', 'data2','data3','data4','data5','query'));
    }
	
}
