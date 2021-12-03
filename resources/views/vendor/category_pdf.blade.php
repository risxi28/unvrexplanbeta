<!DOCTYPE html>
<html>
<head>
	<title>Data Vendor</title>
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
		<h5>Data Vendor</h4>
		<h6><a target="_blank"></a>Load Plan PT. Unilever Indonesia</h5>
		@php
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date('l, d-m-Y, H:i:s') @endphp
        <h6>{{$tgl}}</h6>
	</center>

	<table class='table table-bordered' border="1">
		<thead>
			<tr>
			     <th>No</th>
                  <th>ID Vendor</th>
                  <th>Vendor Name</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
				  <td>{{ $i++ }}</td>
                  <td>{{ $p->id_vendor }}</td>
                  <td>{{ $p->vendor_name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>