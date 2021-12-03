@extends('layouts.backend')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> Add Load Plan</h3>
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
 
            </script>
            <div class="box-body">
        
            <form action="{{url('loadplanstore')}}" method="POST">
             {{ csrf_field() }}
             <div class="form-group">
             <div class="row">
            <div class="col-md-6">
            <label>No SKU</label>
             <select class="form-control select2"  name="id_material" id="material_id" >
             <option value="">Choose SKU</option>
              @foreach ($data1 as $p)  
      
            	  <option onselect="cbm()" value="{{ $p->sku_no  }}"  data-prices3="{{ $p->GW_CS }}" data-prices4="{{ $p->Gross_weight }}" data-prices2="{{ $p->Description }}"data-prices="{{ $p->CS_20ft }}" data-price="{{ $p->CS_40ft }}" >{{ $p->sku_no }}</option>
             
                	@endforeach
            </select>
             </div>
              <div class="col-md-6">
              <label>Reff</label>
              <input class="form-control" name="reff" type="text">
              </div>
              <div class="col-md-6">
              <label>Description</label>
              <input class="form-control" name="Description" id="prices2" type="text">
              </div>
              <div class="col-md-6">
              <label>Destination</label>
              <select name="id_destination" class="form-control">
              <option value="">Choose Destination</option>
	            @foreach ($data2 as $p)  
            	  <option value="{{ $p->destination }}">{{ $p->destination }}</option>
                	@endforeach
             </select>
              </div>
              <div class="col-md-6">
              <label>Vendor</label>
              <select name="id_vendor" class="form-control">
              <option value="">Choose Vendor</option>
	            @foreach ($data4 as $p)  
            	  <option value="{{ $p->vendor_name }}">{{ $p->vendor_name }}</option>
                	@endforeach
             </select>
              </div>
              <div class="col-md-6">
              <label>Category</label>
              <select name="id_category" class="form-control">
              <option value="">Choose Category</option>
	            @foreach ($data3 as $p)  
            	  <option value="{{ $p->category }}">{{ $p->category }}</option>
                	@endforeach
             </select>
              </div>
              <div class="col-md-6">
              <label>Week</label>
              <input class="form-control" name="week" type="number">
              </div>
              <div class="col-md-6">
              <label>Shipment Type</label>
              <input class="form-control" name="shipment_type" type="text">
              </div>
              <div class="col-md-6">
              <label>Type Week</label>
              <input class="form-control" name="type_week" type="text">
              </div>
              <div class="col-md-6">
              <label>Origin</label>
              <input class="form-control" name="origin" type="text">
              </div>
              <div class="col-md-6">
              <label>_Volume</label>
              <input class="form-control" name="_volume" type="number">
              </div>
              <div class="col-md-6">
              <label>Total Quantity</label>
              <input class="form-control" id="total_quantity" onkeyup="cbm()" name="total_quantity" type="number">
              </div>
              <div class="col-md-6">
              
              <label hidden="">40FT</label>
              <input type="hidden" class="form-control" name="FT40" type="number" id="price"  readonly>
              </div>
              <div class="col-md-6">
              <label hidden="">20FT</label>
              <input type="hidden"  class="form-control" name="FT20" type="number" id="prices" readonly>
              </div>
              <div class="col-md-6">
              <label>LCL AF</label>
              <input class="form-control" name="LCL_AF" type="number">
              </div>
              <div class="col-md-6">
              <label>Stuffing Place</label>
              <select name="id_stuffing_place" class="form-control">
              <option value="">Choose Stuffing Place</option>
	            @foreach ($data5 as $p)  
            	  <option value="{{ $p->location }}">{{ $p->location }}</option>
                	@endforeach
             </select>
              </div>
              <div class="col-md-6">
              <label>Stuffing Date</label>
              <input class="form-control" name="stuffing_date" type="text">
              </div>
              <div class="col-md-6">
              <label>Invoice No</label>
              <input class="form-control" name="invoice_no" type="number">
              </div>
              <div class="col-md-6">
              <label>BL Number</label>
              <input class="form-control" name="bl_number" type="text">
              </div>
              <div class="col-md-6">
              <label>Shipping Line</label>
              <input class="form-control" name="shipping_line" type="text">
              </div>
              <div class="col-md-6">
              <label>Vesel </label>
              <input class="form-control" name="vesel" type="text">
              </div>
              <div class="col-md-6">
              <label>ETD</label>
              <input class="form-control" name="etd" type="text">
              </div>
              <div class="col-md-6">
              <label>ETA</label>
              <input class="form-control" name="eta" type="text">
              </div>
              <div class="col-md-6">
              <label hidden="">GW/CS</label>
              <input type="hidden" class="form-control"  onchange="cbm()"name="GW_CS" id="prices3" type="text" readonly>
              </div>
              <div class="col-md-6">
              <label hidden="">Grosswight</label>
              <input type="hidden" class="form-control" onchange="cbm()" name="Gross_weight" id="prices4" type="text" readonly>
              </div>
              <div class="col-md-6">
              <label hidden="">Total CMB</label>
              <input type="hidden" class="form-control" id="total_cmb"  name="total_cmb"  type="text" readonly>
              </div>
              <div class="col-md-6">
              <label hidden="" >Total GW</label>
              <input type="hidden" class="form-control" id="total_gw"  name="total_gw" type="text" readonly>
              </div>
              <div class="col-md-6">
              <label hidden="">Util 20 cmb</label>
              <input type="hidden" class="form-control" id="util_20cmb"  name="util_20cmb" type="text" readonly>
              </div>
              <div class="col-md-6">
              <label hidden="">Util 40 cmb</label>
              <input type="hidden" class="form-control" id="util_40cmb"  name="util_40cmb" type="text" readonly>
              </div>            
              <div class="col-md-6">
              <label hidden="">Util 20 gw</label>
              <input type="hidden" class="form-control" id="util_20gw"  name="util_20gw" type="text" readonly>
              </div>
              <div class="col-md-6">
              <label hidden="">Util 40 gw</label>
              <input type="hidden" class="form-control" id="util_40gw"  name="util_40gw" type="text" readonly>
              </div>
              

              </div>
              <div class="box-footer">
              <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                <a href="{{url ('loadplan') }}"><button type="button" class="btn btn-cancel"><i class="fa fa-remove" aria-hidden="true"></i> Discard</button></a>
                </div>
              </div>
            </form>
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
    <script type="text/javascript">
    $('#material_id').on('change',function(){
    var price = $(this).children('option:selected').data('price');
    var prices = $(this).children('option:selected').data('prices');
    var prices2 = $(this).children('option:selected').data('prices2');
    var prices3 = $(this).children('option:selected').data('prices3');
    var prices4 = $(this).children('option:selected').data('prices4');
    

    $('#price').val(price);
    $('#prices').val(prices);
    $('#prices2').val(prices2);
    $('#prices3').val(prices3);
    $('#prices4').val(prices4);
    document.getElementById("total_gw").value = "";
  document.getElementById("total_quantity").value = "";
  document.getElementById("total_cmb").value = "";
  document.getElementById("util_20cmb").value = "";
});
function cbm() {
  var a=document.getElementById('prices4').value;  
  var b=document.getElementById('total_quantity').value;
  var totalgw=parseFloat(a) * parseFloat(b);

  document.getElementById('total_gw').value = totalgw;

  var c=document.getElementById('prices3').value;  
  var d=document.getElementById('total_quantity').value;
  var totalcmb=parseFloat(c) * parseFloat(d);

  document.getElementById('total_cmb').value = totalcmb;

  var until20cmb=parseFloat(totalcmb)*100/28 ;
  document.getElementById('util_20cmb').value = until20cmb;

  var until40cmb=parseFloat(totalcmb)*100/55 ;
  document.getElementById('util_40cmb').value = until40cmb;

  var until20gw=parseFloat(totalgw)*100/28000 ;
  document.getElementById('util_20gw').value = until20gw;

  var until40gw=parseFloat(totalgw)*100/25000 ;
  document.getElementById('util_40gw').value = until40gw;


}




    
    </script>


   

    <!-- /.content -->
    @endsection