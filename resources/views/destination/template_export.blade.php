<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Destination</th>
            <th>Country</th>
            <th>Country Code</th>
			<th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($data as $p)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $p->id_destination }}</td>
            <td>{{ $p->country }}</td>
            <td>{{ $p->country_code }}</td>
			<td>{{ $p->created_at }}</td>
            <td>{{ $p->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>