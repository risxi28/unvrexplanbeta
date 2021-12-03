@extends('layouts.backend')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Container
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
                    <li><a href="#">Download Tamplate</a></li>
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
                  <th>PO number</th>
                  <th>QTY plan</th>
                  <th>Qty Aktual</th>
                  <th>reason deferent</th>
                  <th>do number</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $p)
                                        
                <tr>
                <td>{{ $no++ }}</td>
                <td></td>
                <td></td>
                <td><input  name="reff_a" type="text" placeholder="Qty Aktual"></td>
                <td>{{ $p->shipment_number }}</td>
                <td>{{ $p->seal_number }}</td>
               
							
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
                  <th>PO number</th>
                  <th>QTY plan</th>
                  <th>Qty Aktual</th>
                  <th>reason deferent</th>
                  <th>do number</th>
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