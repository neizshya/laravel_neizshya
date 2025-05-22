@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ isset($rumahSakit) ? route('rumah-sakit.update', $rumahSakit->id) : route('rumah-sakit.store') }}"
            method="POST">
            @csrf
            @if (isset($rumahSakit))
                @method('PUT')
            @endif
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $rumahSakit->nama ?? '' }}">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $rumahSakit->alamat ?? '' }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $rumahSakit->email ?? '' }}">
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="{{ $rumahSakit->telepon ?? '' }}">
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
