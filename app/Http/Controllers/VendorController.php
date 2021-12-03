<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Vendor_Model;
use Illuminate\Http\Request;
use PDF;
use App\Exports\VendorExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\VendorImport;
use Input;
use App\Exports\TemplateExcelVendor;
use App\Providers\SweetAlertServiceProvider;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vendor_Model::All();
        return view('vendor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Vendor_Model::All();
        return view('vendor.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribut Harus Diisi',
            'required|numeric' => ':attribut Harus Diisi dengan Angka'
                    ];
        $request->validate([
            'vendor_name'=>'required'
        ]);
        $Vendor_Model = new Vendor_Model();
        $Vendor_Model ->vendor_name=$request->get('vendor_name');
        $Vendor_Model->save();
        Alert::success('Vendor Saved','Success');
        return redirect('vendor')->with('success', 'Vendor Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tb_vendor')->where('id_vendor',$id)->get();
         return view('vendor.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $messages = [
            'required' => ':attribut Harus Diisi',
            'required|numeric' => ':attribut Harus Diisi dengan Angka'
                    ];
        $request->validate([
            'vendor_name'=>'required'
        ]);
        DB::table('tb_vendor')->where('id_vendor',$request->id)->update([
            'vendor_name' => $request->vendor_name
            ]);
            Alert::success('Vendor Updated','Success')->autoclose(3500);
         return redirect('vendor')->with('success', 'Vendor Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Vendor_Model::where('id_vendor',$id);
        $delete->delete();
        Alert::success('Vendor Deleted','Success')->autoclose(3500);
        return redirect('vendor')->with('success', 'Vendor Deleted!');
    }
    public function temp_excel()
    {
       return Excel::download(new TemplateExcelVendor, 'template_vendor.xlsx');
    }
    public function cetakPDF()
 {
     $data = Vendor_Model::all();

     $pdf = PDF::loadview('vendor.vendor_pdf',['data'=>$data]);
     return $pdf->download('data-vendor.pdf');
 }
 public function importExport()
 {
     return view('vendor.import_export');
 }
 public function export_excel_xls()
 {
    return Excel::download(new VendorExport, 'vendor.xls');
 }
 public function export_excel_xlsx()
 {
     return Excel::download(new VendorExport, 'vendor.xlsx');
 }
 public function export_excel_csv()
 {
     return Excel::download(new VendorExport, 'vendor.csv');
 }
 public function storeData(Request $request)
 {
     //VALIDASI
     $this->validate($request, [
         'file' => 'required|mimes:xls,xlsx,csv'
     ]);

     if ($request->hasFile('file')) {
         $file = $request->file('file'); //GET FILE
         Excel::import(new VendorImport, $file); //IMPORT FILE 
         return redirect()->back('vendor.index')->with(['success' => 'Upload success']);
        
     }  
     return redirect()->back()->with(['error' => 'Please choose file before']);
 
 }

}
