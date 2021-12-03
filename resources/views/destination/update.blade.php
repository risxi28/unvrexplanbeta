@extends('layouts.backend')
@section('content')
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> Edit Destination</h3>
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
            @foreach($data as $p)
            <form action="{{url('destination/update')}}" method="POST">
             {{ csrf_field() }}
            <input class="hidden" name="id" type="text" placeholder="Destination" value="{{$p->id_destination}}"> 
             <label>Destination</label>
              <input class="form-control" name="destination" type="text" placeholder="Destination" value="{{$p->destination}}">
              <label>Country</label>
              <input class="form-control" name="country" type="text" placeholder="Country" value="{{$p->country}}">
              <label>Country Code</label>
              <input class="form-control" name="country_code" type="text" placeholder="Country code" value="{{$p->country_code}}">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url ('destination') }}"><button type="button" class="btn btn-cancel">Discard</button></a>
              </div>
            </form>
            @endforeach
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