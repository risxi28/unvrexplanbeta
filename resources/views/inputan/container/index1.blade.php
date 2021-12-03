@extends('layouts.backend')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Container 
      </h1>
      
      <ol class="breadcrumb">
      <a href="{{url('containeradd')}}" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i>Add Container</a>
      <a href="#" class="btn btn-info btn-sm" ><i class="fa fa-download"></i> Download</a></a>
        
      </ol> 
      </section>
    <!-- Main content -->
    <section class="content">
   
              @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
      {{ session()->get('success') }}  
  
  @endif
  @include('sweet::alert')
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Container Table </h3>
            </div>
            <!-- /.box-header -->
          
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Container Number</th>
                  <th>Shipment Number</th>
                  <th>Seal Number</th>
                  <th>Container Party</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $p)
                                      
                <tr>
                   <td>{{ $no++ }}</td>
                  <td>{{ $p->id_container }}</td>
                  <td>{{ $p->container_number }}</td>
                  <td>{{ $p->shipment_number }}</td>
                  <td>{{ $p->seal_number }}</td>
                  <td>{{ $p->container_party }}</td>
                  <td>
                  <div class="btn-group">
                 <a href="container/{{ $p->id_container}}/edit"><button type="button"data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button></a>
                 <a href=""><button type="button"data-toggle="tooltip" title="Trash" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                  </div>                   
                  </td>
               </tr>
                @endforeach              
               </tbody>
               
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