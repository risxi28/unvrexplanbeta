<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Container_Model;
class DetailplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Container_Model::All();
        return view('detailplan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Container_Model::All();
        return view('container.create', compact('data'));
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
            'container_number'=>'required',
           'id_tr_plannig'=>'required',
            'reff_a'=>'required',
            'shipment_number'=>'required|numeric',
            'seal_number'=>'required',
            'container_party'=>'required|numeric',
        ]);

      //  $data = new Container_Model([
      //      'shipment_number' => $request->get('shipment_number'),
       //     'container_number' => $request->get('container_number'),
       //     'seal_number' => $request->get('seal_number'),
        //    'container_party' => $request->get('container_party')            
     //   ],$messages);
        $Container_Model = new Container_Model();
        $Container_Model ->id_container=$request->get('id_container');
        $Container_Model ->shipment_number=$request->get('shipment_number');
        $Container_Model ->shipment_number=$request->get('id_tr_planning');
        $Container_Model ->shipment_number=$request->get('reff_a');
        $Container_Model ->container_number=$request->get('container_number');
        $Container_Model ->seal_number=$request->get('seal_number');
        $Container_Model ->container_party=$request->get('container_party');
        
        $Container_Model->save();
        Alert::success('Container Saved','Success');
        return redirect('container')->with('success', 'Container Saved!');
        
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
        $data = DB::table('tb_container')->where('id_container',$id)->get();
    
        return view('container.updatecontainer', compact('data'));
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
            'container_number'=>'required',
            'id_tr_planning'=>'required',
            'reff_a'=>'required',
            'shipment_number'=>'required|numeric',
            'seal_number'=>'required',
            'container_party'=>'required|numeric',
        ]);
        DB::table('tb_container')->where('id_container',$request->id)->update([
            'container_number' => $request->container_number,
            'id_tr_planning' => $request->id_tr_planning,
            'reff_a'=> $request->reff_a,
            'shipment_number' => $request->shipment_number,
            'seal_number' => $request->seal_number,
            'container_party' => $request->container_party
            ]);
            Alert::success('Container Update','Success')->autoclose(3500);
         return redirect('container')->with('success', 'Container Updated!');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Container_Model::find('id_container');
    	$delete->delete();
        Alert::success('Container Deleted','Success')->autoclose(3500);
        return redirect('container')->with('success', 'Container Deleted!');
    }
}
