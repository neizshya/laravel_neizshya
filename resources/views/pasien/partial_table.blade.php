<thead>
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telp</th>
        <th>RS</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($pasiens as $p)
        <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->telepon }}</td>
            <td>{{ $p->rumahSakit->nama }}</td>
            <td>
                <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $p->id }}">Hapus</button>
            </td>
        </tr>
    @endforeach
</tbody>
