@extends('layouts.backend')
@section('content')
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="row-middle">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
            <div class="box-header with-border">
              <h3 class="box-title">Add Vendor</h3>
            </div>
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
            <div class="box-body">
            
            <form action="{{url('vendorstore')}}" method="POST">
             {{ csrf_field() }}
             
             <label>Vendor Name</label>
              <input class="form-control" name="vendor_name" type="text" placeholder="Vendor Name">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                <a href="{{url ('vendor') }}"><button type="button" class="btn btn-cancel"><i class="fa fa-remove" aria-hidden="true"></i> Discard</button></a>
              </div>
            </form>
           
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