@extends('layouts.app')
@section('content')
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
        <table class="table" id="pasien-table"></table>
    </div>
    <script>
        $(document).ready(function() {
            function loadData(rsId = '') {
                $.get('/filter-pasien/' + rsId, function(data) {
                    $('#pasien-table').html(data);
                });
            }
            $('#filter-rs').on('change', function() {
                loadData($(this).val());
            });
            $(document).on('click', '.btn-delete', function() {
                if (confirm('Hapus data ini?')) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: '/pasien-delete/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            loadData($('#filter-rs').val());
                        }
                    });
                }
            });
            loadData();
        });
    </script>
@endsection
