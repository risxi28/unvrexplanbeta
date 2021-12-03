<!DOCTYPE html>
<html>
<head>
	<title>Data Load Plan</title>
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
		<h5>Data Load Plan</h4>
		<h6><a target="_blank"></a>PT. Unilever Indonesia</h5>
		@php
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date('l, d-m-Y, H:i:s') @endphp
        <h6>{{$tgl}}</h6>
	</center>
    @php $no=1 @endphp
			@foreach($data as $p)
	<table class='table table-bordered' border="1">
		<thead>
			<tr>
            <th>No</th>
            <td>{{ $no++ }}</td>
            </tr>
            <tr>
							<th>SKU No</th>
                            <td>{{ $p->sku_no }}</td>
                            </tr>
                            <tr>
							<th>reff</th>
                            <td>{{ $p->reff }}</td>
                            </tr>
                            <tr>
							<th>Destination</th>
                            <td>{{ $p->destination}}</td>
                            </tr>
                            <tr>
							<th>Vendor</th>
                            <td>{{ $p->vendor_name }}</td>
                            </tr>
                            <tr>
							<th>Category</th>
                            <td>{{ $p->category }}</td>
                            </tr>
                            <tr>
							<th>Week</th>
                            <td>{{ $p->week }}</td>
                            </tr>
                            <tr>
							<th>Type Week</th>
                            <td>{{ $p->type_week }}</td>
                            </tr>
                            <tr>
							<th>Shipment Type</th>
                            <td>{{ $p->shipment_type }}</td>
                            </tr>
                            <tr>
							<th>Origin</th>
                            <td>{{ $p->origin }}</td>
                            </tr>
                            <tr>
							<th>_Volume</th>
                            <td>{{ $p->_volume }}</td>
                            </tr>
                            <tr>
							<th>Total Quantity</th>
                            <td>{{ $p->total_quantity }}</td>
                            </tr>
                            <tr>
							<th>40FT</th>
                            <td>{{ $p->FT40 }}</td>
                            </tr>
                            <tr>
							<th>20FT</th>
                            <td>{{ $p->FT20 }}</td>
                            </tr>
                            <tr>
							<th>LCL AF</th>
                            <td>{{ $p->LCL_AF }}</td>
                            </tr>
                            <tr>
							<th>Stuffing Place</th>
                            <td>{{ $p->location }}</td>
                            </tr>
                            <tr>
							<th>Stuffing Date</th>
                            <td>{{ $p->stuffing_date }}</td>
                            </tr>
                            <tr>
							<th>Invoice No</th>
                            <td>{{ $p->invoice_no }}</td>
                            </tr>
                            <tr>
							<th>BL Number</th>
                            <td>{{ $p->bl_number }}</td>
                            </tr>
                            <tr>
							<th>Shipping Line</th>
                            <td>{{ $p->shipping_line }}</td>
                            </tr>
                            <tr>
							<th>Vesel</th>
                            <td>{{ $p->vesel }}</td>
                            </tr>
                            <tr>
							<th>ETD</th>
                            <td>{{ $p->etd }}</td>
                            </tr>
                            <tr>
							<th>ETA</th>
                            <td>{{ $p->eta }}</td>
                            </tr>
		</thead>
	</table>
    <br>
    <br>
    @endforeach

</body>
</html>