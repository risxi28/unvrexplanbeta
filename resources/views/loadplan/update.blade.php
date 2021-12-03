@extends('layouts.backend')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> Update Load Plan</h3>
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
            <div class="box-body">
            @foreach($data as $n)
            <form action="{{url('loadplan/update')}}" method="POST">
             {{ csrf_field() }}
             <div class="row">
            <div class="col-md-6">
            <input class="hidden" name="id" type="text" value="{{$n->id_planing}}"> 
            <label>No SKU</label>
             <select name="id_material" class="form-control">
             <option value="">Choose SKU</option>
              @foreach ($data1 as $p)  
            	  <option value="{{ $p->sku_no  }}"  @if ($p->sku_no === $n->id_material) selected @endif  >{{ $p->sku_no }}</option>
                	@endforeach
            </select>
             </div>
              <div class="col-md-6">
              <label>Reff</label>
              <input class="form-control" name="reff" type="text"  value="{{$n->reff}}">
              </div>
              <div class="col-md-6">
              <label>Destination</label>
              <select name="id_destination" class="form-control">
              <option value="">Choose Destination</option>
	            @foreach ($data2 as $p)  
            	  <option value="{{ $p->id_destination }}" @if ($p->id_destination === $n->id_destination) selected @endif>{{ $p->destination }}</option>
                	@endforeach
             </select>
              </div>
              <div class="col-md-6">
              <label>Vendor</label>
              <select name="id_vendor" class="form-control">
              <option value="">Choose Vendor</option>
	            @foreach ($data4 as $p)  
            	  <option value="{{ $p->id_vendor }}"@if ($p->id_vendor === $n->id_vendor) selected @endif>{{ $p->vendor_name }}</option>
                	@endforeach
             </select>
              </div>
              <div class="col-md-6">
              <label>Category</label>
              <select name="id_category" class="form-control">
              <option value="">Choose Category</option>
	            @foreach ($data3 as $p)  
            	  <option value="{{ $p->id_category }}"@if ($p->id_category === $n->id_category) selected @endif>{{ $p->category }}</option>
                	@endforeach
             </select>
              </div>
              <div class="col-md-6">
              <label>Week</label>
              <input class="form-control" name="week" type="number" value="{{$n->week}}">
              </div>
              <div class="col-md-6">
              <label>Shipment Type</label>
              <input class="form-control" name="shipment_type" type="text" value="{{$n->shipment_type}}">
              </div>
              <div class="col-md-6">
              <label>Type Week</label>
              <input class="form-control" name="type_week" type="text" value="{{$n->type_week}}">
              </div>
              <div class="col-md-6">
              <label>Origin</label>
              <input class="form-control" name="origin" type="text" value="{{$n->origin}}">
              </div>
              <div class="col-md-6">
              <label>_Volume</label>
              <input class="form-control" name="_volume" type="number" value="{{$n->_volume}}">
              </div>
              <div class="col-md-6">
              <label>Total Quantity</label>
              <input class="form-control" name="total_quantity" type="number" value="{{$n->total_quantity}}">
              </div>
              <div class="col-md-6">
              <label>40FT</label>
              <input class="form-control" name="FFT" type="number" value="{{$n->FT40}}"id="price" >
              </div>
              <div class="col-md-6">
              <label>20FT</label>
              <input class="form-control" name="TFT" type="number" value="{{$n->FT20}}" id="prices" >
              </div>
              <div class="col-md-6">
              <label>LCL AF</label>
              <input class="form-control" name="LCL_AF" type="number" value="{{$n->LCL_AF}}">
              </div>
              <div class="col-md-6">
              <label>Stuffing Place</label>
              <select name="id_stuffing_place" class="form-control">
              <option value="">Choose Stuffing Place</option>
	            @foreach ($data5 as $p)  
            	  <option value="{{ $p->id_st_place }}"@if ($p->id_st_place === $n->id_stuffing_place) selected @endif>{{ $p->location }}</option>
                	@endforeach
             </select>
              </div>
              <div class="col-md-6">
              <label>Stuffing Date</label>
              <input class="form-control" name="stuffing_date" type="text" value="{{$n->stuffing_date}}">
              </div>
              <div class="col-md-6">
              <label>Invoice No</label>
              <input class="form-control" name="invoice_no" type="number" value="{{$n->invoice_no}}">
              </div>
              <div class="col-md-6">
              <label>BL Number</label>
              <input class="form-control" name="bl_number" type="text" value="{{$n->bl_number}}">
              </div>
              <div class="col-md-6">
              <label>Shipping Line</label>
              <input class="form-control" name="shipping_line" type="text" value="{{$n->shipping_line}}">
              </div>
              <div class="col-md-6">
              <label>Vesel </label>
              <input class="form-control" name="vesel" type="text" value="{{$n->vesel}}">
              </div>
              <div class="col-md-6">
              <label>ETD</label>
              <input class="form-control" name="etd" type="text" value="{{$n->etd}}">
              </div>
              <div class="col-md-6">
              <label>ETA</label>
              <input class="form-control" name="eta" type="text" value="{{$n->eta}}">
              </div>
              </div>
              <div class="box-footer">
              <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                <a href="{{url ('loadplan') }}"><button type="button" class="btn btn-cancel"><i class="fa fa-remove" aria-hidden="true"></i> Discard</button></a>
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
    $('#material_id').on('change',function(){
    var price = $(this).children('option:selected').data('price');
    var prices = $(this).children('option:selected').data('prices');
    $('#price').val(price);
    $('#prices').val(prices);
});
    </script>
    @endsection