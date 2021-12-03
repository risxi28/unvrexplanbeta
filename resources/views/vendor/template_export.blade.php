<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Vendor</th>
            <th>Vendor Name</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($data as $p)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $p->id_vendor }}</td>
            <td>{{ $p->vendor_name }}</td>
            <td>{{ $p->created_at }}</td>
            <td>{{ $p->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>