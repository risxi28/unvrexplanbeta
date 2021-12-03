@extends('layouts.master1')
@section('dalam')


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
           
            <div class="box-body">
            <div class="box-body">
            @foreach($data as $p)
            <form action="{{url ('container/update') }}" method="POST">
             {{ csrf_field() }}
             <input class="hidden" name="id" type="text" placeholder="Container Number" value="{{ $p->id_container }}">
             <label>Container Number</label>
              <input class="form-control" name="container_number" type="text" placeholder="Container Number" value="{{ $p->container_number }}">
              <label>TR Planning</label>
              <select name="id_tr_planning" class="form-control">
              @foreach($data as $p)
              <option values="{{$p->id_tr_planning}}">{{$p->id_tr_planning}}</option>
              @endforeach
              </select>
              <label>REFF A</label>
              <input class="form-control" name="reff_a" type="text" placeholder="REFF A" value="{{ $p->reff_a }}">
              <label>Shipment Number</label>
              <input class="form-control" name="shipment_number" type="text" placeholder="Shipment Number"value="{{ $p->shipment_number }}">
              <label>Seal Number</label>
              <input class="form-control" name="seal_number" type="text" placeholder="Seal Number" value="{{ $p->seal_number }}">
              <label>Container Party</label>
              <input class="form-control" name="container_party" type="text" placeholder="Container Party" value="{{ $p->container_party }}">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
             <a href="{{url ('container') }}"><button type="button" class="btn btn-cancel"><i class="fa fa-remove" aria-hidden="true"></i> Discard</button></a>
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
    @endsection