@extends('layouts.backend')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Material
      </h1>
      <ol class="breadcrumb">
		<a href="{{url('materialadd')}}" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i>Add Material</a>	
	<div class="btn-group">
	
                  <button type="button" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</button>
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ URL::to('material/export/xls') }}">Download Excel xls</a></li>
                    <li><a href="{{ URL::to('material/export/xlsx') }}">Download Excel xlsx</a></li>
                    <li><a href="{{ URL::to('material/export/csv') }}">Download CSV</a></li>
                    <li><a href="{{ URL::to('material/print') }}">Download PDF</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Download Tamplate</a></li>
                  </ul>
        </div>
                <a target="_blank" href="material/import-export" class="btn bg-navy btn-flat btn-sm" ><i class="fa fa-upload"></i> Upload</a></a>
     
      </ol> 
    </section>

    <!-- Main content -->
    <section class="content">
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
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            
            @include('sweet::alert')
            <div class="box-body ">   
						<body class="wide comments example">
              <table id="example" class="display nowrap table table-bordered table-striped" width="100%">
                <thead>
                <tr>
              <th>No</th>
							<th>SKU No</th>
							<th>Description</th>
							<th>Aun</th>
							<th>Numera</th>
							<th>Denom</th>
							<th>Length</th>
							<th>Width</th>
							<th>Height</th>
							<th>Uni</th>
							<th>Volume</th>
							<th>VUn</th>
							<th>Gross Weight</th>
							<th>Net Weight</th>
							<th>Un</th>
							<th>EAN UPC</th>
							<th>Ct</th>
							<th>LuN</th>
							<th>Number</th>
							<th>PID</th>
							<th>LID</th>
							<th>CS 20FT CBM</th>
							<th>CS 40FT CBM</th>
							<th>CS 20FT GW</th>
							<th>CS 40FT GW</th>
							<th>CS 20ft</th>
							<th>CS 40ft</th>
							<th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $p)
                                        
                <tr>
              <td>{{ $no++ }}</td>
							<td>{{ $p->sku_no }}</td>
							<td>{{ $p->Description }}</td>
							<td>{{ $p->Aun}}</td>
							<td>{{ $p->Numera }}</td>
							<td>{{ $p->Denom }}</td>
							<td>{{ $p->Length }}</td>
							<td>{{ $p->Width }}</td>
							<td>{{ $p->Height }}</td>
							<td>{{ $p->Uni }}</td>
							<td>{{ $p->Volume }}</td>
							<td>{{ $p->VUn }}</td>
							<td>{{ $p->Gross_weight }}</td>
							<td>{{ $p->Net_Weight }}</td>
							<td>{{ $p->Un }}</td>
							<td>{{ $p->EAN_UPC }}</td>
							<td>{{ $p->Ct }}</td>
							<td>{{ $p->LuN }}</td>
							<td>{{ $p->Number }}</td>
							<td>{{ $p->PID }}</td>
							<td>{{ $p->LID }}</td>
							<td>{{ $p->CS_20FT_CBM }}</td>
							<td>{{ $p->CS_40FT_CBM }}</td>
							<td>{{ $p->CS_20FT_GW }}</td>
							<td>{{ $p->CS_40FT_GW }}</td>
							<td>{{ $p->CS_20ft }}</td>
							<td>{{ $p->CS_40ft }}</td>
                  <td>
          <div class="btn-group">
					
					<a href="material/{{$p->id_material}}/edit"><button type="button"data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></button></a>
          <a href="material/{{$p->id_material}}/delete"><button type="button"data-toggle="tooltip" title="Trash" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
            
          </div>     
                  </td>
               </tr>
                @endforeach              
               </tbody>
               
                <tr>
              <th>No</th>
							<th>SKU No</th>
							<th>Description</th>
							<th>Aun</th>
							<th>Numera</th>
							<th>Denom</th>
							<th>Length</th>
							<th>Width</th>
							<th>Height</th>
							<th>Uni</th>
							<th>Volume</th>
							<th>VUn</th>
							<th>Gross Weight</th>
							<th>Net Weight</th>
							<th>Un</th>
							<th>EAN UPC</th>
							<th>Ct</th>
							<th>LuN</th>
							<th>Number</th>
							<th>PID</th>
							<th>LID</th>
							<th>CS 20FT CBM</th>
							<th>CS 40FT CBM</th>
							<th>CS 20FT GW</th>
							<th>CS 40FT GW</th>
							<th>CS 20ft</th>
							<th>CS 40ft</th>
							<th>Action</th>
                </tr>
               
              </table>
							</body>
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