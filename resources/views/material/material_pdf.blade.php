<!DOCTYPE html>
<html>
<head>
	<title>Data Material</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Material</h4>
		<h6><a target="_blank"></a>PT. Unilever Indonesia</h5>
		@php
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date('l, d-m-Y, H:i:s') @endphp
        <h6>{{$tgl}}</h6>
	</center>

	<table class='table table-bordered' border="1">
		<thead>
			<tr><th>No</th>
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
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
                            <td>{{ $i++ }}</td>
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
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>