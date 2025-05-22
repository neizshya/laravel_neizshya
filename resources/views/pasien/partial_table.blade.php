@if ($pasiens->count())
    @foreach ($pasiens as $pasien)
        <tr>
            <td>{{ $pasien->nama }}</td>
            <td>{{ $pasien->alamat }}</td>
            <td>{{ $pasien->telepon }}</td>
            <td>{{ $pasien->rumahSakit->nama ?? '-' }}</td>
            <td>
                <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $pasien->id }}">Hapus</button>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="5" class="text-center">Tidak ada data pasien.</td>
    </tr>
@endif
