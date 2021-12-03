<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class Email extends Controller
{
 public function sendEmail(Request $request)
{
    try{
        Mail::send('email', ['pesan' => $request->pesan], function ($message) use ($request)
        {
            $message->subject('Update Transaksi');
            $message->from('donotreply@admin.com', 'Administration');
            $message->to('bbmkuhaku@yopmail.com','Team 1');
            $message->cc('bbmkuhaku@gmail.com','Team 2');
        });
        return back()->with('alert-success','Berhasil Kirim Email');
    }
    catch (Exception $e){
        return response (['status' => false,'errors' => $e->getMessage()]);
    }
}
}