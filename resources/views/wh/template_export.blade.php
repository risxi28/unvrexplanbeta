<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Stuffing Place</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($data as $p)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $p->id_st_place }}</td>
            <td>{{ $p->location }}</td>
            <td>{{ $p->created_at }}</td>
            <td>{{ $p->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>