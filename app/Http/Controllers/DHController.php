<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\DH_Model;
use PDF;
use App\Exports\DHExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\DHImport;
use Input;
use App\Providers\SweetAlertServiceProvider;

class DHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DH_Model::All();
        return view('dh.index', compact('data'));
    }
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DH_Model::All();
        return view('dh.create', compact('data'));
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
            'dh'=>'required'
        ]);
        $DH_Model = new DH_Model();
        $DH_Model ->dh=$request->get('dh');
        $DH_Model->save();
        Alert::success('DH Saved','Success');
        return redirect('dh')->with('success', 'dh Saved!');
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
        $data = DB::table('tb_dh')->where('id_dh',$id)->get();
        return view('dh.update', compact('data'));
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
                        'dh'=>'required'
                    ]);
        DB::table('tb_dh')->where('id_dh',$request->id)->update([
            'dh' => $request->dh
            ]);
            Alert::success('dh Updated','Success')->autoclose(3500);
         return redirect('dh')->with('success', 'dh Updated!');
    }
	/**
     * Remove the specified resource from storage.
    
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
  
   
    public function destroy($id)
  {
     $delete = DH_Model::where('id_dh',$id);
  $delete->delete();

      Alert::success('dh Deleted','Success')->autoclose(3500);
      return redirect('dh')->with('success', 'dh Deleted!');
 }
 public function cetakPDF()
 {
     $data = DH_Model::all();

     $pdf = PDF::loadview('dh.dh_pdf',['data'=>$data]);
     return $pdf->download('data-dh.pdf');
 }
 public function importExport()
 {
     return view('dh.import_export');
 }
 public function export_excel_xls()
 {
    return Excel::download(new dhExport, 'dh.xls');
 }
 public function export_excel_xlsx()
 {
     return Excel::download(new dhExport, 'dh.xlsx');
 }
 public function export_excel_csv()
 {
     return Excel::download(new dhExport, 'dh.csv');
 }
 public function storeData(Request $request)
 {
     //VALIDASI
     $this->validate($request, [
         'file' => 'required|mimes:xls,xlsx,csv'
     ]);

     if ($request->hasFile('file')) {
         $file = $request->file('file'); //GET FILE
         Excel::import(new DHImport, $file); //IMPORT FILE 
         return redirect()->back('dh.index')->with(['success' => 'Upload success']);
        
     }  
     return redirect()->back()->with(['error' => 'Please choose file before']);
 
 }
}
