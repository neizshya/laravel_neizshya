@extends('layouts.app')
@section('content')
    <header class="card container py-3 mb-4 border-bottom d-flex justify-content-between ">
        <p class="h1 d-flex">{{ $title }}</p>
    </header>

    <div class="container">
        <a href="{{ route('rumah-sakit.create') }}" class="btn btn-primary mb-3">Tambah Rumah Sakit</a>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="rs-body">
                    @if ($rs->count())
                        @foreach ($rs as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger btn-delete"
                                        data-id="{{ $item->id }}">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data rumah sakit.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


    </div>
@endsection
