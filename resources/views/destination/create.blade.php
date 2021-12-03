@extends('layouts.backend')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> Add Destination</h3>
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
            <form action="{{url('destinationstore')}}" method="POST">
             {{ csrf_field() }}
             <div class="row">
            <div class="col-md-6">
             <label>Destination</label>
              <input class="form-control" name="destination" type="text" placeholder="Destination">
             </div>
              <div class="col-md-6">
              <label>Country</label>
              <input class="form-control" name="country" type="text" placeholder="Country">
              </div>
              <div class="col-md-6">
              <label>Country Code</label>
              <input class="form-control" name="country_code" type="text" placeholder="Country code">
              </div>
              </div>

              <div class="box-footer">
              <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                <a href="{{url ('destination') }}"><button type="button" class="btn btn-cancel"><i class="fa fa-remove" aria-hidden="true"></i> Discard</button></a>
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
    <!-- /.content -->
    @endsection