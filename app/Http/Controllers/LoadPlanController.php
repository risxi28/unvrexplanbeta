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
use App\ViewTransaksi;
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
use Mail;
use App\Exports\TemplateExcelLoadplan;


class LoadPlanController extends Controller
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
    public function import_export()
    {
        $pasta = ViewTransaksi::All();
        return view('loadplan.import_export', compact('pasta'));
        
    }
    public function form()
    {
        $data = ViewTransaksi::All();
        return view('loadplan.form', compact('data'));
        
    }
    public function getDownload()
{
    $file= public_path(). "\loadplan\Format.xlsx";
    return Response::download($file);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ViewTransaksi::All();
        $data1 = Material_Model::All();
        $data2 = Destination_Model::All();
        $data3 = Category_Model::All();
        $data4 = Vendor_Model::All();
        $data5 = wh_Model::All();
        return view('loadplan.create', compact('data','data1','data2','data3','data4','data5'));
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
            'id_material'=>'required',
            'Description'=>'required',
            'reff'=>'required',
            'id_destination'=>'required',
            'id_vendor'=>'required',
            'id_category'=>'required',
            'week'=>'required|numeric',
            'shipment_type'=>'required',
            'type_week'=>'required',
            'origin'=>'required',
            '_volume'=>'required|numeric',
            'total_quantity'=>'required|numeric',
            'FT40'=>'required|numeric',
            'FT20'=>'required|numeric',
            'LCL_AF'=>'required|numeric',
            'id_stuffing_place'=>'required',
            'stuffing_date'=>'required',
            'invoice_no'=>'required|numeric',
            'bl_number'=>'required',
            'shipping_line'=>'required',
            'vesel'=>'required',
            'etd'=>'required',
            'eta'=>'required',            
            'Gross_weight'=>'required',
            'GW_CS'=>'required',
            'total_cmb'=>'required',
            'total_gw'=>'required',
            'util_20cmb'=>'required',
            'util_40cmb'=>'required',
            'util_20gw'=>'required',
            'util_40gw'=>'required',
            
        ]);
        $Loadplan = new ViewTransaksi();
        $Loadplan->id_material=$request->get('id_material');
        $Loadplan->Description=$request->get('Description');
        $Loadplan->reff=$request->get('reff');
        $Loadplan->id_destination=$request->get('id_destination');
        $Loadplan->id_vendor=$request->get('id_vendor');
        $Loadplan->id_category=$request->get('id_category');
        $Loadplan->week=$request->get('week');
        $Loadplan->shipment_type=$request->get('shipment_type');
        $Loadplan->type_week=$request->get('type_week');
        $Loadplan->origin=$request->get('origin');
        $Loadplan->_volume=$request->get('_volume');
        $Loadplan->total_quantity=$request->get('total_quantity');
        $Loadplan->FT40=$request->get('FT40');
        $Loadplan->FT20=$request->get('FT20');
        $Loadplan->LCL_AF=$request->get('LCL_AF');
        $Loadplan->id_stuffing_place=$request->get('id_stuffing_place');
        $Loadplan->stuffing_date=$request->get('stuffing_date');
        $Loadplan->invoice_no=$request->get('invoice_no');
        $Loadplan->shipping_line=$request->get('shipping_line');
        $Loadplan->bl_number=$request->get('bl_number');
        $Loadplan->shipping_line=$request->get('shipping_line');
        $Loadplan->vesel=$request->get('vesel');
        $Loadplan->etd=$request->get('etd');
        $Loadplan->eta=$request->get('eta');
        $Loadplan->Gross_weight=$request->get('Gross_weight');
        $Loadplan->GW_CS=$request->get('GW_CS');
        $Loadplan->total_cmb=$request->get('total_cmb');
        $Loadplan->total_gw=$request->get('total_gw');
        $Loadplan->util_20cmb=$request->get('util_20cmb');
        $Loadplan->util_40cmb=$request->get('util_40cmb');
        $Loadplan->util_20gw=$request->get('util_20gw');
        $Loadplan->util_40gw=$request->get('util_40gw');
        

        $Loadplan->save();
        try{
        Mail::send('email', ['pesan' => $request->pesan], function ($message) use ($request)
        {
            $message->subject('Update Transaksi');
            $message->from('support@auliacenter.com', 'Administration');
            $message->to('nass.nasirudin@gmail.com','P_Nasirudin');
            $message->cc('Muhamad.Nasirudin2@unilever.com','Nasirudin');
            
        });
        Alert::success('Load Plan Saved','Success');
    
        return redirect('loadplan')->with('success', 'Load Plan Saved!');

    }
    catch (Exception $e){
        return response (['status' => false,'errors' => $e->getMessage()]);
    }

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
        $data = DB::table('tb_transaksi')->where('id_planing',$id)->get();
        $data1 = Material_Model::all();
        $data2 = Destination_Model::all();
        $data3 = Category_Model::all();
        $data4 = Vendor_Model::all();
        $data5 = wh_Model::all();
        return view('loadplan.update', compact('data','data1','data2','data3','data4','data5'));
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
                        'id_material'=>'required',
                        'reff'=>'required',
                        'id_destination'=>'required',
                        'id_vendor'=>'required',
                        'id_category'=>'required',
                        'week'=>'required|numeric',
                        'shipment_type'=>'required',
                        'type_week'=>'required',
                        'origin'=>'required',
                        '_volume'=>'required|numeric',
                        'total_quantity'=>'required|numeric',
                        'FFT'=>'required|numeric',
                        'TFT'=>'required|numeric',
                        'LCL_AF'=>'required|numeric',
                        'id_stuffing_place'=>'required',
                        'stuffing_date'=>'required',
                        'invoice_no'=>'required|numeric',
                        'bl_number'=>'required',
                        'shipping_line'=>'required',
                        'vesel'=>'required',
                        'etd'=>'required',
                        'eta'=>'required',
                    ]);
        DB::table('tr_planing')->where('id_planing',$request->id)->update([
            'id_material' => $request->id_material,
            'reff' => $request->reff,
            'id_destination' => $request->id_destination,
            'id_vendor' => $request->id_vendor,
            'id_category' => $request->id_category,
            'week' => $request->week,
            'shipment_type' => $request->shipment_type,
            'type_week' => $request->type_week,
            'origin' => $request->origin,
            '_volume' => $request->_volume,
            'total_quantity' => $request->total_quantity,
            'FFT' => $request->FT40,
            'TFT' => $request->FT20,
            'LCL_AF' => $request->LCL_AF,
            'id_stuffing_place' => $request->id_stuffing_place,
            'stuffing_date' => $request->stuffing_date,
            'invoice_no' => $request->invoice_no,
            'bl_number' => $request->bl_number,
            'shipping_line' => $request->shipping_line,
            'vesel' => $request->vesel,
            'etd' => $request->etd,
            'eta' => $request->eta,
            

            ]);
            Alert::success('LoadPlan Updated','Success')->autoclose(3500);
         return redirect('loadplan')->with('success', 'LoadPlan Updated!');
    }

    /**
     * Remove the specified resource from storage.
    
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ViewTransaksi::where('id_planing',$id);
        $delete->delete();
        Alert::success('Vendor Deleted','Success')->autoclose(3500);
        return redirect('loadplan')->with('success', 'Transaction Deleted!');
    }

 public function cetakPDF()
 {
     $data = ViewTransaksi::all();

     $pdf = PDF::loadview('loadplan.loadplan_pdf',['data'=>$data]);
     return $pdf->download('data-loadplan.pdf');
 }
 public function importExport()
 {
     return view('loadplan.import_export');
 }
 public function export_excel_xls()
 {
    return Excel::download(new LoadPlanExport, 'loadplan.xls');
 }
 public function export_excel_xlsx()
 {
     return Excel::download(new LoadPlanExport, 'loadplan.xlsx');
 }
 public function export_excel_csv()
 {
     return Excel::download(new LoadPlanExport, 'loadplan.csv');
 }
 public function temp_excel()
 {
    return Excel::download(new TemplateExcelLoadplan, 'unduh_template_export.xlsx');
 }
}