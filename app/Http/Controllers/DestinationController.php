<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Destination_Model;
use PDF;
use App\Exports\DestinationExport;
use App\Exports\TemplateExcelDestination;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\DestinationImport;
use Input;
use App\Providers\SweetAlertServiceProvider;
use App\Exports\template_destination;


class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Destination_Model::All();
        return view('destination.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Destination_Model::All();
        return view('destination.create', compact('data'));
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
            'destination'=>'required',
            'country'=>'required',
            'country_code'=>'required'
        ]);
        $Destination_Model = new Destination_Model();
        $Destination_Model ->destination=$request->get('destination');
        $Destination_Model ->country=$request->get('country');
        $Destination_Model ->country_code=$request->get('country_code');
        $Destination_Model->save();
        Alert::success('Destination Saved','Success');
        return redirect('destination')->with('success', 'Destination Created!');
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
        $data = DB::table('tb_destination')->where('id_destination',$id)->get();
        return view('destination.update', compact('data'));
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
                        'destination'=>'required',
                        'country'=>'required',
                        'country_code'=>'required'
                    ]);
        DB::table('tb_destination')->where('id_destination',$request->id)->update([
            'destination' => $request->destination,
            'country' => $request->country,
            'country_code' => $request->country_code
            ]);
            Alert::success('Destination Updated','Success')->autoclose(3500);
         return redirect('destination')->with('success', 'Destination Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Destination_Model::where('id_destination',$id);
        $delete->delete();
        Alert::success('Destination Deleted','Success')->autoclose(3500);
        return redirect('destination')->with('success', 'Destination Deleted!');
    }
    public function cetakPDF()
 {
     $data = Destination_Model::all();

     $pdf = PDF::loadview('destination.destination_pdf',['data'=>$data]);
     return $pdf->download('data-destination.pdf');
 }
 public function temp_excel()
 {
    return Excel::download(new TemplateExcelDestination, 'template_destination.xlsx');
 }
 public function importExport()
 {
     return view('destination.import_export');
 }
 public function export_excel_xls()
 {
    return Excel::download(new DestinationExport, 'destination.xls');
 }
 public function export_excel_xlsx()
 {
     return Excel::download(new DestinationExport, 'destination.xlsx');
 }
 public function export_excel_csv()
 {
     return Excel::download(new DestinationExport, 'destination.csv');
 }
 public function storeData(Request $request)
 {
     //VALIDASI
     $this->validate($request, [
         'file' => 'required|mimes:xls,xlsx,csv'
     ]);

     if ($request->hasFile('file')) {
         $file = $request->file('file'); //GET FILE
         Excel::import(new CategoryImport, $file); //IMPORT FILE 
         return redirect()->back('destination.index')->with(['success' => 'Upload success']);
        
     }  
     return redirect()->back()->with(['error' => 'Please choose file before']);
 
 }
}