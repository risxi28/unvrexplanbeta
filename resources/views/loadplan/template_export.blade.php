<table>
    <thead>
        <tr>
           
        <th>No</th>
							<th>SKU No</th>
							<th>reff</th>
							<th>Destination</th>
							<th>Vendor</th>
							<th>Category</th>
							<th>Week</th>
							<th>Shipment Type</th>
							<th>Type Week</th>
							<th>Origin</th>
							<th>_Volume</th>
							<th>Total Quantity</th>
							<th>40FT</th>
							<th>20FT</th>
							<th>LCL AF</th>
							<th>Stuffing Place</th>
							<th>Stuffing Date</th>
							<th>Invoice No</th>
							<th>BL Number</th>
							<th>Shipping Line</th>
							<th>Vesel</th>
							<th>ETD</th>
							<th>ETA</th>
	
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($data as $p)
        <tr>
        <td>{{ $no++ }}</td>
							<td>{{ $p->reff }}</td>
							<td>{{ $p->sku_no }}</td>
							<td>{{ $p->destination}}</td>
							<td>{{ $p->vendor_name }}</td>
							<td>{{ $p->category }}</td>
							<td>{{ $p->week }}</td>
							<td>{{ $p->type_week }}</td>
							<td>{{ $p->shipment_type }}</td>
							<td>{{ $p->origin }}</td>
							<td>{{ $p->_volume }}</td>
							<td>{{ $p->total_quantity }}</td>
							<td>{{ $p->FT40 }}</td>
							<td>{{ $p->FT20 }}</td>
							<td>{{ $p->LCL_AF }}</td>
							<td>{{ $p->location }}</td>
							<td>{{ $p->stuffing_date }}</td>
							<td>{{ $p->invoice_no }}</td>
							<td>{{ $p->bl_number }}</td>
							<td>{{ $p->shipping_line }}</td>
							<td>{{ $p->vesel }}</td>
							<td>{{ $p->etd }}</td>
							<td>{{ $p->eta }}</td>
        </tr>
    @endforeach
    </tbody>
</table>