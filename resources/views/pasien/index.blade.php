@extends('layouts.app')
@section('content')
    <header class="card container py-3 mb-4 border-bottom d-flex justify-content-between ">
        <p class="h1 d-flex">{{ $title }}</p>
    </header>
    <div class="container">
        <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>
        <div class="form-group">
            <label>Filter Rumah Sakit</label>
            <select id="filter-rs" class="form-control">
                <option value="">Semua Rumah Sakit</option>
                @foreach ($rumahSakits as $rs)
                    <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="table-responsive">
            <table class="table" id="pasien-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Rumah Sakit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="pasien-body"></tbody>
            </table>
        </div>
    </div>
@endsection
