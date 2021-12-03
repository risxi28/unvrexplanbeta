@extends('layouts.backend')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> Add Category</h3>
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
            <form action="{{url('categorystore')}}" method="POST">
             {{ csrf_field() }}
             
             <label>Category</label>
              <input class="form-control" name="category" type="text" placeholder="Category">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url ('category') }}"><button type="button" class="btn btn-cancel">Discard</button></a>
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