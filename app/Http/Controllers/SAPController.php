<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\SAPModel;
use PDF;
use App\Exports\SAPExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\SAPImport;
use Input;
use App\Providers\SweetAlertServiceProvider;

class SAPController extends Controller
{
    public function index()
    {
        $data = SAPModel::All();
        return view('sap.index', compact('data'));
    }
	public function create()
    {
        $data = SAPModel::All();
        return view('sap.create', compact('data'));
    }
	public function store(Request $request)
    {
        $messages = [
            'required' => ':attribut Harus Diisi',
            'required|numeric' => ':attribut Harus Diisi dengan Angka'
                    ];
        $request->validate([
            'sap'=>'required'
        ]);
        $SAPModel = new SAPModel();
        $SAPModel ->sap=$request->get('sap');
        $SAPModel->save();
        Alert::success('sap Saved','Success');
        return redirect('sap')->with('success', 'sap Saved!');
    }
	public function show($id)
    {
        //
    }
	public function edit($id)
    {
        $data = DB::table('tb_material')->where('id_material',$id)->get();
        return view('sap.update', compact('data'));
    }
	public function update(Request $request)
    {
        $messages = [
            'required' => ':attribut Harus Diisi',
            'required|numeric' => ':attribut Harus Diisi dengan Angka'
                    ];
                    $request->validate([
                        'sap'=>'required'
                    ]);
        DB::table('tb_material')->where('id_material',$request->id)->update([
            'sap' => $request->sap
            ]);
            Alert::success('sap Updated','Success')->autoclose(3500);
         return redirect('sap')->with('success', 'sap Updated!');
    }
	public function destroy($id)
	{
    $delete = SAPModel::where('id_material',$id);
	$delete->delete();
  
      Alert::success('sap Deleted','Success')->autoclose(3500);
      return redirect('sap')->with('success', 'sap Deleted!');
	}
	public function cetakPDF()
 {
     $data = SAPModel::all();

     $pdf = PDF::loadview('sap.sap_pdf',['data'=>$data]);
     return $pdf->download('data-sap.pdf');
	}
	public function importExport()
	{
     return view('sap.import_export');
	}
	public function export_excel_xls()
	{
    return Excel::download(new SAPExport, 'sap.xls');
	}
	public function export_excel_xlsx()
	{
     return Excel::download(new SAPExport, 'sap.xlsx');
	}
	public function export_excel_csv()
	{
     return Excel::download(new SAPExport, 'sap.csv');
	}	
	public function storeData(Request $request)
 {
     //VALIDASI
     $this->validate($request, [
         'file' => 'required|mimes:xls,xlsx,csv'
     ]);

     if ($request->hasFile('file')) {
         $file = $request->file('file'); //GET FILE
         Excel::import(new SAPImport, $file); //IMPORT FILE 
         return redirect()->back()->with(['success' => 'Upload success']);
        
     }  
     return redirect()->back()->with(['error' => 'Please choose file before']);
 
 }
}
