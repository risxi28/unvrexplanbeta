<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Material_Model;
use PDF;
use App\Exports\MaterialExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\MaterialImport;
use Input;
use App\Providers\SweetAlertServiceProvider;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Material_Model::All();
        return view('material.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Material_Model::All();
        return view('material.create', compact('data'));
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
            'sku_no'=>'required|numeric',
            'Description'=>'required',
            'Aun'=>'required',
            'Numera'=>'required|numeric',
            'Denom'=>'required|numeric',
            'Length'=>'required|numeric',
            'Width'=>'required|numeric',
            'Height'=>'required|numeric',
            'Uni'=>'required',
            'Volume'=>'required|numeric',
            'VUn'=>'required',
            'Gross_weight'=>'required|numeric',
            'Net_Weight'=>'required|numeric',
            'Un'=>'required',
            'EAN_UPC'=>'required|numeric',
            'Ct'=>'required',
            'LuN'=>'required',
            'Number'=>'required|numeric',
            'PID'=>'required|numeric',
            'LID'=>'required|numeric',
        ]);
        $Material_Model = new Material_Model();
        $Material_Model ->sku_no=$request->get('sku_no');
        $Material_Model ->Description=$request->get('Description');
        $Material_Model ->Aun=$request->get('Aun');
        $Material_Model ->Numera=$request->get('Numera');
        $Material_Model ->Denom=$request->get('Denom');
        $Material_Model ->Length=$request->get('Length');
        $Material_Model ->Width=$request->get('Width');
        $Material_Model ->Height=$request->get('Height');
        $Material_Model ->Uni=$request->get('Uni');
        $Material_Model ->Volume=$request->get('Volume');
        $Material_Model ->VUn=$request->get('VUn');
        $Material_Model ->Gross_weight=$request->get('Gross_weight');
        $Material_Model ->Net_Weight=$request->get('Net_Weight');
        $Material_Model ->Un=$request->get('Un');
        $Material_Model ->EAN_UPC=$request->get('EAN_UPC');
        $Material_Model ->Ct=$request->get('Ct');
        $Material_Model ->LuN=$request->get('LuN');
        $Material_Model ->Number=$request->get('Number');
        $Material_Model ->PID=$request->get('PID');
        $Material_Model ->LID=$request->get('LID');
        $Material_Model ->CS_20FT_CBM=$request->get('CS_20FT_CBM');
        $Material_Model ->CS_40FT_CBM=$request->get('CS_40FT_CBM');
        $Material_Model ->CS_20FT_GW=$request->get('CS_20FT_GW');
        $Material_Model ->CS_40FT_GW=$request->get('CS_40FT_GW');
        $Material_Model ->CS_20ft=$request->get('CS_20ft');
        $Material_Model ->CS_40ft=$request->get('CS_40ft');
        $Material_Model ->GW_CS=$request->get('GW_CS');
        $Material_Model->save();
        Alert::success('Material Saved','Success');
        return redirect('material')->with('success', 'Material Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tb_material')->where('id_material',$id)->get();
        return view('material.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tb_material')->where('id_material',$id)->get();
        return view('material.update', compact('data'));
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
            'sku_no'=>'required|numeric',
            'Description'=>'required',
            'Aun'=>'required',
            'Numera'=>'required|numeric',
            'Denom'=>'required|numeric',
            'Length'=>'required|numeric',
            'Width'=>'required|numeric',
            'Height'=>'required|numeric',
            'Uni'=>'required',
            'Volume'=>'required|numeric',
            'VUn'=>'required',
            'Gross_weight'=>'required|numeric',
            'Net_Weight'=>'required|numeric',
            'Un'=>'required',
            'EAN_UPC'=>'required|numeric',
            'Ct'=>'required',
            'LuN'=>'required',
            'Number'=>'required|numeric',
            'PID'=>'required|numeric',
            'LID'=>'required|numeric',
        ]);
        DB::table('tb_material')->where('id_material',$request->id)->update([
            'sku_no'=>$request->sku_no,
            'Description'=>$request->Description,
            'Aun'=>$request->Aun,
            'Numera'=>$request->Numera,
            'Denom'=>$request->Denom,
            'Length'=>$request->Length,
            'Width'=>$request->Width,
            'Height'=>$request->Height,
            'Uni'=>$request->Uni,
            'Volume'=>$request->Volume,
            'VUn'=>$request->VUn,
            'Gross_weight'=>$request->Gross_weight,
            'Net_Weight'=>$request->Net_Weight,
            'Un'=>$request->Un,
            'EAN_UPC'=>$request->EAN_UPC,
            'Ct'=>$request->Ct,
            'LuN'=>$request->LuN,
            'Number'=>$request->Number,
            'PID'=>$request->PID,
            'LID'=>$request->LID,
            'CS_20FT_CBM'=>$request->CS_20FT_CBM,
            'CS_40FT_CBM'=>$request->CS_40FT_CBM,
            'CS_20FT_GW'=>$request->CS_20FT_GW,
            'CS_40FT_GW'=>$request->CS_40FT_GW,
            'CS_20ft'=>$request->CS_20ft,
            'CS_40ft'=>$request->CS_40ft,
            'GW_CS'=>$request->GW_CS,
           
            ]);
            Alert::success('Material Updated','Success')->autoclose(3500);
         return redirect('material')->with('success', 'Material Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Material_Model::where('id_material',$id);
    	$delete->delete();
        Alert::success('Material Deleted','Success')->autoclose(3500);
        return redirect('material')->with('success', 'Material Deleted!');
    }
    
    public function cetakPDF()
    {
        $data = Material_Model::all();
   
        $pdf = PDF::loadview('material.material_pdf',['data'=>$data]);
        return $pdf->download('data-material.pdf');
    }
    public function importExport()
    {
        return view('material.import_export');
    }
    public function export_excel_xls()
    {
       return Excel::download(new MaterialExport, 'material.xls');
    }
    public function export_excel_xlsx()
    {
        return Excel::download(new MaterialExport, 'material.xlsx');
    }
    public function export_excel_csv()
    {
        return Excel::download(new MaterialExport, 'material.csv');
    }
    public function storeData(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx,csv'
        ]);
   
        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new MaterialImport, $file); //IMPORT FILE 
            return redirect()->back('material.index')->with(['success' => 'Upload success']);
           
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    
    }  
}
