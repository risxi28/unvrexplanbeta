@extends('layouts.backend')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Destination
      </h1>
	   <ol class="breadcrumb">
		<a href="{{url('destinationadd')}}" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i>Add Destination</a>	
	<div class="btn-group">
	
                  <button type="button" class="btn btn-success  btn-sm"><i class="fa fa-download"></i> Download</button>
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ URL::to('destination/export/xls') }}">Download Excel xls</a></li>
                    <li><a href="{{ URL::to('destination/export/xlsx') }}">Download Excel xlsx</a></li>
                    <li><a href="{{ URL::to('destination/export/csv') }}">Download CSV</a></li>
                    <li><a href="{{ URL::to('destination/print') }}">Download PDF</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('destination/download/template') }}">Download Tamplate</a></li>
                  </ul>
        </div>
                <a target="_blank" href="destination/import-export" class="btn bg-navy btn-flat btn-sm" ><i class="fa fa-upload"></i> Upload</a></a>
     
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
            <body class="wide comments example">
            <div class="box-body">
              <table id="example" class="display nowrap table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                   <th>No</th>
                  <th>Destination</th>
                  <th>Country</th>
                  <th>Country Code</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $p)
                                        
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $p->destination }}</td>
                  <td>{{ $p->country }}</td>
                  <td>{{ $p->country_code }}</td>
                  <td>
             <div class="btn-group">
          
                <a href="destination/{{$p->id_destination}}/edit"><button type="button"data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button></a>
                <a href="destination/{{$p->id_destination}}/delete"><button type="button"data-toggle="tooltip" title="Trash" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
            
             </div>     
                  </td>
               </tr>
                @endforeach              
               </tbody>
               <tfoot>
                <tr>
                   <th>No</th>
                  <th>Destination</th>
                  <th>Country</th>
                  <th>Country Code</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              
            </div>
            </body>
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