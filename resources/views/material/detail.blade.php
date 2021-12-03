@extends('layouts.backend')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"> Detail Material</h3>
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
 
            @foreach($data as $p)
            <form class="form-horizontal">
            <div class="box-body">    
            <div class="form-group">
                  <label class="col-sm-4 control-label">ID Material :</label>
                  <div class="col-sm-8">
                    <p>{{$p->id_material}}</p>
                  </div>
            </div>      
            <div class="form-group">
                  <label class="col-sm-4 control-label">SKU No :</label>
                  <div class="col-sm-8">
                    <p>{{$p->sku_no}}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Description :</label>
                  <div class="col-sm-8">
                    <p>{{$p->Description}}</p>
                  </div>
                </div>
                            <div class="box-footer">
                <a href="{{url ('material') }}"><button type="button" class="btn btn-cancel">Close</button></a>
              </div>
            @endforeach
            </div>
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