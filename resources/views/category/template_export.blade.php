<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Category</th>
            <th>Category</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($data as $p)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $p->id_category }}</td>
            <td>{{ $p->category }}</td>
            <td>{{ $p->created_at }}</td>
            <td>{{ $p->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>