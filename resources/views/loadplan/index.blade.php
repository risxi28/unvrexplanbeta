@extends('layouts.backend')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Transaksi
      </h1>
      <ol class="breadcrumb">
		<a href="{{url('loadplanadd')}}" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i>Add Transaksi</a>	
	<div class="btn-group">
	
                  <button type="button" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</button>
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ URL::to('loadplan/export/xls') }}">Download Excel xls</a></li>
                    <li><a href="{{ URL::to('loadplan/export/xlsx') }}">Download Excel xlsx</a></li>
                    <li><a href="{{ URL::to('loadplan/export/csv') }}">Download CSV</a></li>
                    <li><a href="{{ URL::to('loadplan/print') }}">Download PDF</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('loadplan/download/template') }}">Download Tamplate</a></li>
                  </ul>
        </div>
                <a target="_blank" href="import_export" class="btn bg-navy btn-flat btn-sm" ><i class="fa fa-upload"></i> Upload</a></a>
     
      </ol> 
    </section>

    <!-- Main content -->
    <section class="content">
		@if(session()->get('success'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
      {{ session()->get('success') }}  
    </div>
  @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            
            @include('sweet::alert')
            <div class="box-body ">   
						<body class="wide comments example">
              <table id="example" class="display nowrap table table-bordered table-striped" width="100%">
                <thead>
                <tr>
              <th>No</th>
							<th>SKU No</th>
							<th>reff</th>
							<th>Destination</th>
							<th>Vendor</th>
							<th>Category</th>
							<th>Week</th>
							<th>Shipment Type</th>
							<th>Type Week</th>
							<th>Origin</th>
							<th>_Volume</th>
							<th>Total Quantity</th>
							<th>40FT</th>
							<th>20FT</th>
							<th>LCL AF</th>
							<th>Stuffing Place</th>
							<th>Stuffing Date</th>
							<th>Invoice No</th>
							<th>BL Number</th>
							<th>Shipping Line</th>
							<th>Vesel</th>
							<th>ETD</th>
							<th>ETA</th>
							<th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $p)
                                        
                <tr>
              <td>{{ $no++ }}</td>
							<td ><a href="loadplan/{{$p->id_planing}}/edit"><i class="fa fa-pencil" aria-hidden="true" ></i>{{ $p->id_material }}</a></td>
							<td>{{ $p->reff }}</td>
							<td>{{ $p->id_destination}}</td>
							<td>{{ $p->id_vendor }}</td>
							<td>{{ $p->id_category }}</td>
							<td>{{ $p->week }}</td>
							<td>{{ $p->type_week }}</td>
							<td>{{ $p->shipment_type }}</td>
							<td>{{ $p->origin }}</td>
							<td>{{ $p->_volume }}</td>
							<td>{{ $p->total_quantity }}</td>
							<td>{{ $p->FT40 }}</td>
							<td>{{ $p->FT20 }}</td>
							<td>{{ $p->LCL_AF }}</td>
							<td>{{ $p->id_stuffing_place }}</td>
							<td>{{ $p->stuffing_date }}</td>
							<td>{{ $p->invoice_no }}</td>
							<td>{{ $p->bl_number }}</td>
							<td>{{ $p->shipping_line }}</td>
							<td>{{ $p->vesel }}</td>
							<td>{{ $p->etd }}</td>
							<td>{{ $p->eta }}</td>
							
                  <td>
          <div class="btn-group">
					
					<a href="loadplan/{{$p->id_planing}}/edit"><button type="button"data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button></a>
          <a href="loadplan/{{$p->id_planing}}/delete"><button type="button"data-toggle="tooltip" title="Trash" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
            
          </div>     
                  </td>
               </tr>
                @endforeach              
               </tbody>
               
                <tr>
                <th>No</th>
							<th>SKU No</th>
							<th>reff</th>
							<th>Destination</th>
							<th>Vendor</th>
							<th>Category</th>
							<th>Week</th>
							<th>Shipment Type</th>
							<th>Type Week</th>
							<th>Origin</th>
							<th>_Volume</th>
							<th>Total Quantity</th>
							<th>40FT</th>
							<th>20FT</th>
							<th>LCL AF</th>
							<th>Stuffing Place</th>
							<th>Stuffing Date</th>
							<th>Invoice No</th>
							<th>BL Number</th>
							<th>Shipping Line</th>
							<th>Vesel</th>
							<th>ETD</th>
							<th>ETA</th>
							<th>Action</th>
                </tr>
               
              </table>
							</body>
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
  
    @endsection