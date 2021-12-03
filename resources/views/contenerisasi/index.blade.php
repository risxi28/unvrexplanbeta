@extends('layouts.backend')
@section('content')
<section class="content">
        <div class="col-md-6">   

              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Masukan No Reff</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <div class="form-group">
            <form action="{{ url('contenerisasi/result') }}" method="GET">
             
                <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="q">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Cari!</button>
                    </span>
            </form>
            </div>
              </div>
          </div>
          </div>
 </section>
 @endsection