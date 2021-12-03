<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\wh_Model;
use PDF;
use App\Exports\whExport;
use App\Exports\TemplateExcelwh;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\whImport;
use Input;
use App\Providers\SweetAlertServiceProvider;


class whController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = wh_Model::All();
        return view('wh.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = wh_Model::All();
        return view('wh.create', compact('data'));
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
            'location'=>'required'
        ]);
        $wh_Model = new wh_Model();
        $wh_Model ->location=$request->get('location');
        $wh_Model->save();
        Alert::success('Stuffing Place Saved','Success');
        return redirect('wh')->with('success', 'Stuffing Place Saved!');
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
        $data = DB::table('tb_stuffing_place')->where('id_st_place',$id)->get();
        return view('wh.update', compact('data'));
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
                        'location'=>'required'
                    ]);
        DB::table('tb_stuffing_place')->where('id_st_place',$request->id)->update([
            'location' => $request->location
            ]);
            Alert::success('Stuffing Place Updated','Success')->autoclose(3500);
         return redirect('wh')->with('success', 'Stuffing Place Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = wh_Model::where('id_st_place',$id);
        $delete->delete();
        Alert::success('stuffing place Deleted','Success')->autoclose(3500);
        return redirect('wh')->with('success', 'Stuffing place Deleted!');
    }
    public function temp_excel()
    {
       return Excel::download(new TemplateExcelwh, 'template_wh.xlsx');
    }
    public function cetakPDF()
 {
     $data = wh_Model::all();

     $pdf = PDF::loadview('wh.wh_pdf',['data'=>$data]);
     return $pdf->download('data-wh.pdf');
 }
 public function importExport()
 {
     return view('wh.import_export');
 }
 public function export_excel_xls()
 {
    return Excel::download(new whExport, 'wh.xls');
 }
 public function export_excel_xlsx()
 {
     return Excel::download(new whExport, 'wh.xlsx');
 }
 public function export_excel_csv()
 {
     return Excel::download(new whExport, 'wh.csv');
 }
 public function storeData(Request $request)
 {
     //VALIDASI
     $this->validate($request, [
         'file' => 'required|mimes:xls,xlsx,csv'
     ]);

     if ($request->hasFile('file')) {
         $file = $request->file('file'); //GET FILE
         Excel::import(new whImport, $file); //IMPORT FILE 
         return redirect()->back('wh.index')->with(['success' => 'Upload success']);
        
     }  
     return redirect()->back()->with(['error' => 'Please choose file before']);
 
 }
}
