@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $page_title }}</div>

                    <div class="card-body">
                        <a href="{{ route('add_kamar') }}" class="btn btn-primary">Tambah Kamar</a>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped tb-kamar">
                            <thead>
                            <tr class="text-center">
                                <th>Kamar Kode</th>
                                <th>Kamar Nama</th>
                                <th>Tersedia</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kamar as $k)
                                <tr class="text-center">
                                    <th id="kamar_kode">{{ $k->kamar_kode }}</th>
                                    <th>{{ $k->kamar_nama }}</th>
                                    <th>{{ $k->kamar_ketersediaan }}</th>
                                    <th>{{ $k->kamar_harga }}</th>
                                    <th>
                                        <a href="{{ route('edit_kamar', ['kamar_kode' => $k->kamar_kode]) }}" class="btn btn-primary">Edit</a> ||
                                        <a href="{{ route('del_kamar', ['kamar_kode' => $k->kamar_kode]) }}" onclick="return confirm('Hapus kamar dengan kode '+document.getElementById('kamar_kode').innerHTML+' ?');" class="btn btn-danger">Delete</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
