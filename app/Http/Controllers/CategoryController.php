<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Category_Model;
use PDF;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
// use App\Imports\TemplateExcelCategory;
use App\Exports\TemplateExcelCategory;
use Input;
use App\Providers\SweetAlertServiceProvider;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category_Model::All();
        return view('category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category_Model::All();
        return view('category.create', compact('data'));
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
            'category'=>'required'
        ]);
        $Category_Model = new Category_Model();
        $Category_Model ->category=$request->get('category');
        $Category_Model->save();
        Alert::success('Category Saved','Success');
        return redirect('category')->with('success', 'Category Saved!');
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
        $data = DB::table('tb_category')->where('id_category',$id)->get();
        return view('category.update', compact('data'));
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
                        'category'=>'required'
                    ]);
        DB::table('tb_category')->where('id_category',$request->id)->update([
            'category' => $request->category
            ]);
            Alert::success('Category Updated','Success')->autoclose(3500);
         return redirect('category')->with('success', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
    
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
  
   
    public function destroy($id)
  {
     $delete = Category_Model::where('id_category',$id);
  $delete->delete();
  //dd($request->id_category);
      Alert::success('Category Deleted','Success')->autoclose(3500);
      return redirect('category')->with('success', 'Category Deleted!');
 }
 public function cetakPDF()
 {
     $data = Category_Model::all();

     $pdf = PDF::loadview('category.category_pdf',['data'=>$data]);
     return $pdf->download('data-category.pdf');
 }
 public function temp_excel()
 {
    return Excel::download(new TemplateExcelCategory, 'template_category.xlsx');
 }
 public function importExport()
 {
     return view('category.import_export');
 }
 public function export_excel_xls()
 {
    return Excel::download(new CategoryExport, 'category.xls');
 }
 public function export_excel_xlsx()
 {
     return Excel::download(new CategoryExport, 'category.xlsx');
 }
 public function export_excel_csv()
 {
     return Excel::download(new CategoryExport, 'category.csv');
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
         return redirect()->back('category.index')->with(['success' => 'Upload success']);
        
     }  
     return redirect()->back()->with(['error' => 'Please choose file before']);
 
 }
}
