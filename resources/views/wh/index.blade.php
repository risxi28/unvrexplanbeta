@extends('layouts.backend')
@section('content')
    <section class="content-header">
      <h1>
        Data Stuffing Place
      </h1>
      <ol class="breadcrumb">
    
      <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</button>
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ URL::to('wh/export/xls') }}">Download Excel xls</a></li>
                    <li><a href="{{ URL::to('wh/export/xlsx') }}">Download Excel xlsx</a></li>
                    <li><a href="{{ URL::to('wh/export/csv') }}">Download CSV</a></li>
                    <li><a href="{{ URL::to('wh/print') }}">Download PDF</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Download Tamplate</a></li>
                  </ul>
        </div>
                <a target="_blank" href="wh/import-export" class="btn bg-navy btn-flat btn-sm" ><i class="fa fa-upload"></i> Upload</a></a>
     
     
      </ol> 
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
    <div class="box-header with-border">
              <h3 class="box-title">Add Stuffing Place</h3>
    <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
    </div>
    <div class="box-footer">

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
           <div class="box-body">
           
           <form action="{{url('whstore')}}" method="POST">
            {{ csrf_field() }}
             <input class="form-control" name="location" type="text" placeholder="location">
             <div class="box-footer">
               <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
               <a href="{{url ('wh') }}"><button type="button" class="btn btn-cancel"><i class="fa fa-remove" aria-hidden="true"></i> Discard</button></a>
             </div>
           </form>
           </div>
           </div>
              
            <!-- /.box-body -->
          </div>
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
              <h3 class="box-title">Stuffing Place Table</h3>
            </div>
            <!-- /.box-header -->
            @include('sweet::alert')
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                  <th>Vendor Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $p)
                                        
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $p->location }}</td>
                  <td>
                  <div class="btn-group"> 

                 <a href="wh/{{$p->id_st_place}}/edit"><button type="button"data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button></a>
                 <a href="wh/{{$p->id_st_place}}/delete"><button type="button"data-toggle="tooltip" title="Trash" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                
               
                </div>
                  </td>
               </tr>
                @endforeach              
               </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Vendor Name</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
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