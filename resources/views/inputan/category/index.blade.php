@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Category
      </h1>
      <ol class="breadcrumb">
      <a target="_blank" href="category/import-export" class="btn btn-info btn-sm" ><i class="fa fa-download"></i> Download</a></a>
     
      </ol> 
    </section>

    <!-- Main content -->
    <section class="content-header">
    <section class="content">
    <div class="row">
             <div class="col-xs-12">
    <div class="box">
    
    <div class="box-header with-border">
              <h3 class="box-title"> Add Category</h3>
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
 
            </script>
            <div class="box-body">
            
            <form action="{{url('categorystore')}}" method="POST">
             {{ csrf_field() }}
           
            
              <input class="form-control" name="category" type="text" placeholder="Category">
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                <a href="{{url ('category') }}"><button type="button" class="btn btn-cancel"><i class="fa fa-remove" aria-hidden="true"></i> Discard</button></a>
              </div>
            </form>
            </div></div>
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
            <div class="box-header with-border">
              <h3 class="box-title">Category Table</h3>
            </div>
            <!-- /.box-header -->
            @include('sweet::alert')
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>No</th>
                  <th>Category Name</th>
                  <th>Act</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $p)
                                        
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $p->category }}</td>
                  <td>
                 <div class="btn-group"> 
                 
                 <a href="category/{{$p->id_category}}/edit"><button type="button"data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button></a>
                 <a data-toggle="modal" data-target="#delete" data-catid="{{$p->id_category}}"><button type="button" data-toggle="tooltip" title="Delete"  class="btn btn-danger btn-sm" ><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                 
                 
                 
                 

                </div>
                
                  </td>
               </tr>
                @endforeach              
               </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Category Name</th>
                  <th>Act</th>
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
    <div class="modal modal-danger fade" id="delete" style="top:200px">
          <div class="modal-dialog">
            <div class="modal-content ">
            @foreach($data as $p)
            <form action="{{url('category/update')}}" method="POST">
             {{ csrf_field() }}
            <input class="hidden" name="id_category" id="catid" type="text" placeholder="category" value="{{$p->id_category}}"> 
             <label>Category</label>
              <input class="form-control" name="category" type="text" placeholder="Category Name" value="{{$p->category}}">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                <a href="{{url ('category') }}"><button type="button" class="btn btn-cancel"><i class="fa fa-remove" aria-hidden="true"></i> Discard</button></a>
              </div>
            </form>
            @endforeach
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

    <script>
      $(#delete).on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id_category = button.data(catid)
        var modal = $(this)

        modal.find('.modal-body #id_category').val(id_category);
      })
    </script>
</div>    
    
    <!-- /.content -->
    @endsection