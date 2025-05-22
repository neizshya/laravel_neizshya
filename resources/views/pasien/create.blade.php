@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ isset($pasien) ? route('pasien.update', $pasien->id) : route('pasien.store') }}" method="POST">
            @csrf
            @if (isset($pasien))
                @method('PUT')
            @endif
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pasien->nama ?? '' }}">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $pasien->alamat ?? '' }}">
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="{{ $pasien->telepon ?? '' }}">
            </div>
            <div class="form-group">
                <label>Rumah Sakit</label>
                <select name="rumah_sakit_id" class="form-control">
                    @foreach ($rumahSakits as $rs)
                        <option value="{{ $rs->id }}"
                            {{ isset($pasien) && $pasien->rumah_sakit_id == $rs->id ? 'selected' : '' }}>
                            {{ $rs->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
