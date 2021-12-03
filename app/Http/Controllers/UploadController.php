<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    function form()
    {
        return view('form-upload');
    }
    function upload(Request $request)
    {
        $file = $request->file('csv');
   
      // Mendapatkan Nama File
      $nama_file = $file->getClientOriginalName();
   
      // Mendapatkan Extension File
      $extension = $file->getClientOriginalExtension();
  
      // Mendapatkan Ukuran File
      $ukuran_file = $file->getSize();
   
      // Proses Upload File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
    }
}
