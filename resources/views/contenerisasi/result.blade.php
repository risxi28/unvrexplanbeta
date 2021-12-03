@extends('layouts.backend')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Containerisasi
      </h1>
      
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
            @if (count($data))   
            @include('sweet::alert')
            <div class="box-body ">   
						<body class="wide comments example">
              <table id="example" class="display nowrap table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                <th>No</th>
							<th>SKU No</th>
							<th>DESCRIPTION</th>
							<th>QTY</th>
							<th>TOTAL CBM</th>
              <th>TOTAL GW</th>
              <th>VOLUME CBM</th>
              <th>VOLUME GW</th>
							<th>Util [%] CBM</th>
							<th>Util [%] GW</th>
              <th>Cont</th>
                </tr>
                </thead>
                <tbody>
                @php
                 $no = 1; 
                 $i = 1; 
	              	$total = 0;
                 @endphp
                @foreach($data as $key => $p)
                @if($i =  1)
               
                @endif
                @php
                
                  $data2 += $p->util_40cmb;
                
                  $data3 += $p->util_40gw;
                  $data4 += $p->util_20cmb;
                  $data5 += $p->util_20gw;
                @endphp
                @php
                 $totalgw = $data->sum('total_gw'); 
                 $totalcmb = $data->sum('total_cmb'); 
                 $persengw = $data->sum('util_20gw');
	              @endphp
                @php
                $f40[] = $p->util_40cmb;$p->util_40gw;
                @endphp
                <tr>
                <td>{{ $no++ }}</td>
							  <td>{{ $p->id_material }}</a></td>
						  	<td>{{ $p->Description }}</td>
						  	<td>{{ $p->total_quantity }}</td>
						  	<td>{{ $p->total_cmb }}</td>
						  	<td>{{ $p->total_gw }}</td>
                
                @if($totalcmb < 28 || $totalgw <= 18000)
                <th>{{$data4 }} %</th>
							  <th>{{$data5 }} %</th>
                <td>{{ $p->util_20cmb }}</td>
							  <td>{{ $p->util_20gw }}</td>
                <td>20FT</td>
                @elseif($data2 >= 95  || $data3 >= 95 )
                <th>{{$data4 }} %</th>
							  <th>{{$data5 }} %</th>
                <td>{{ $p->util_20cmb }}</td>
							  <td>{{ $p->util_20gw }}</td>
                <td>20FT</td>
                @elseif($totalcmb > 28 || $totalgw >= 18001 )
                <th>{{$data2 }} %</th>
							  <th>{{$data3 }} %</th>
                <td>{{ $p->util_40cmb }}</td>
							  <td>{{ $p->util_40gw }}</td>
                <td>40FT</td>
                @elseif($data2 >= 95 || $data3 >= 95)
                  @foreach($ft40 as $key)
                  
                  @php
                  $util40cmb += $key->util_40cmb;
                  $util40gw += $key->util_40gw;
                  $util20cmb += $key->util_20cmb;
                  $util20gw += $key->util_20gw;
                  @endphp
                  
                  <th>{{$util40cmb }} %</th>
							    <th>{{$util40gw }} %</th>
                  <td>{{ $key->util_40cmb }}</td>
							    <td>{{ $key->util_40gw }}</td>
                  <td>40FT</td>
                 
                  @endforeach

                @else
                @if($data2 >= 90 && $data2  < 100 || $data3 >= 90 &&  $data2 < 100 )
                    @break
                  @endif
                  <td>{{$data2 }} %</td>
                  <td>{{$data3 }} %</td>
                  <td>{{ $p->util_40cmb }}</td>
						    	<td>{{ $p->util_40gw }}</td>
                  <td>40FT</td>
                @endif         
               
      
                </tr> 
               </tbody>
               @endforeach 
               <td></td>
                <td>Total:</td>
                <td id="sum"></td>
                           
              </table>
              <span id="val"></span>
							</body>
              
            </div>
            <!-- /.box-body -->
            {{ $data->render() }}    	
        @else
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <h4><i class="icon fa fa-check"></i> Tidak Ditemukan!</h4><script src=""></script>
       </div>       
     @endif
	
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    
    <!-- /.content --> 
    <!--<script="text/javascript">
     let rows = document.querySelectorAll("table tr td:last-child");
        let sum = 0;
        for (let i = 0; i < rows.length-1; i++) {
            sum += Number(rows[i].textContent);
        }
 
        document.getElementById("sum").textContent = sum;
    
    </script> -->
    
    <script type="text/javascript">
            
            var table = document.getElementById("example"), sumVal = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[2].column[7].innerHTML);
            }
            
            document.getElementById("val").innerHTML = "Sum Value = " + sumVal;
            console.log(sumVal);
            
        </script>
    


    @endsection