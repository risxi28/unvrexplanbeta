@extends('layouts.backend')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> Edit Material</h3>
            </div>
            <!-- /.box-header -->
            @include('sweet::alert')
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Fail!</h4>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                 @endforeach
                 </ul>
              </div>
             @endif
 
            @foreach($data as $p)

            <div class="form-group">
            <div class="box-body">
            <form action="{{url('material/update')}}" method="POST">
             {{ csrf_field() }}   
             <div class="row">
            <div class="col-md-6">         
              <input class="form-control hidden" name="id" type="text" placeholder="SKU No" value="{{$p->id_material}}">
             <label>SKU No</label>
              <input class="form-control" name="sku_no" type="text" placeholder="SKU No" value="{{$p->sku_no}}">
              <label>Description</label>
              <textarea class="form-control" name="Description" rows="3" placeholder="Description ..." >{{$p->Description}}</textarea>
              <label>Aun</label>
              <input class="form-control" name="Aun" type="text" placeholder="Aun" value="{{$p->Aun}}">
              <label>Numera</label>
              <input class="form-control" name="Numera" type="text" placeholder="Numera" value="{{$p->Numera}}">
              <label>Denom</label>
              <input class="form-control" name="Denom" type="text" placeholder="Denom" value="{{$p->Denom}}">
              <label>Length</label>
              <input class="form-control" name="Length" type="text" placeholder="Length" value="{{$p->Length}}">
              <label>Width</label>
              <input class="form-control" name="Width" type="text" placeholder="Width" value="{{$p->Width}}">
              <label>Height</label>
              <input class="form-control" name="Height" type="text" placeholder="Height" value="{{$p->Height}}">
              <label>Uni</label>
              <input class="form-control" name="Uni" type="text" placeholder="Uni"value="{{$p->Uni}}">
              <label>Volume</label>
              <input class="form-control" name="Volume" id="Volume" type="text"  value="{{$p->Volume}}" onchange="cbm()">
              <label>VUn</label>
              <input class="form-control" name="VUn" type="text" placeholder="VUn" value="{{$p->VUn}}">
              <label>Gross Weight</label>
              <input class="form-control" name="Gross_weight" id="Gross_weight" type="text"  onchange="cbm()" value="{{$p->Gross_weight}}">
              <label>Net Weight</label>
              <input class="form-control" name="Net_Weight" type="text" placeholder="Net Weight"value="{{$p->Net_Weight}}">
              </div>
              <div class="col-md-6">
              <label>Un</label>
              <input class="form-control" name="Un" type="text" placeholder="Un" value="{{$p->Un}}">
              <label>EAN UPC</label>
              <input class="form-control" name="EAN_UPC" type="text" placeholder="EAN UPC" value="{{$p->EAN_UPC}}">
              <label>Ct</label>
              <input class="form-control" name="Ct" type="text" placeholder="Ct" value="{{$p->Ct}}">
              <label>LuN</label>
              <input class="form-control" name="LuN" type="text" placeholder="LuN" value="{{$p->LuN}}">
              <label>Number</label>
              <input class="form-control" name="Number" type="text" placeholder="Number" value="{{$p->Number}}">
              <label>PID</label>
              <input class="form-control" name="PID" type="text" placeholder="PID" value="{{$p->PID}}">
              <label>LID</label>
              <input class="form-control" name="LID" type="text" placeholder="LID"  value="{{$p->LID}}">
              <label>CS/20FT(CBM)</label>
              <input class="form-control" type="text" name="CS_20FT_CBM" id="CBM20" value="{{$p->CS_20FT_CBM}}">
              <label>CS/40FT(CBM)</label>
              <input class="form-control" type="text" name="CS_40FT_CBM" id="CBM40" value="{{$p->CS_40FT_CBM}}">
              <label>CS/20FT(GW)</label>
              <input class="form-control" type="text" name="CS_20FT_GW" id="GW20" value="{{$p->CS_20FT_GW}}">
              <label>CS/40FT(GW)</label>
              <input class="form-control" type="text" name="CS_40FT_GW" id="GW40" value="{{$p->CS_40FT_GW}}">
              <label>CS/20FT</label>
              <input class="form-control" type="text" name="CS_20ft" id="cs20" value="{{$p->CS_20ft}}">
              <label>CS/40FT</label>
              <input class="form-control" type="text" name="CS_40ft" id="cs40" value="{{$p->CS_40ft}}">
              </div>
              </div>
              <div class="box-footer">
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url ('material') }}"><button type="button" class="btn btn-cancel">Discard</button></a>
              </div>
              </div>
            </form>
            @endforeach
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <script type="text/javascript">
		function cbm() {
    var gw20 =18000/(parseInt(document.getElementById('Gross_weight').value));
    var gw40 = 25000/parseInt(document.getElementById('Gross_weight').value);
		var vcbm20 = 28/( parseInt(document.getElementById('Volume').value)/1000000);
    var vcbm40 = 55/( parseInt(document.getElementById('Volume').value)/1000000);

		document.getElementById('CBM20').value =(Math.round(vcbm20));
    document.getElementById('CBM40').value =(Math.round(vcbm40));
    document.getElementById('GW20').value =(Math.round(gw20));
    document.getElementById('GW40').value =(Math.round(gw40));
    
    if(gw20<vcbm20){ document.getElementById('cs20').value =(Math.round(gw20));} 
    else {document.getElementById('cs20').value =(Math.round(vcbm20));}
    if(gw40<vcbm40){ document.getElementById('cs40').value =(Math.round(gw40));} 
    else {document.getElementById('cs40').value =(Math.round(vcbm40));}
  
		}
 
   
	</script>	
    @endsection