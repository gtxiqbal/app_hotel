@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $page_title }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('proc_kamar', ['kamar_kode' => $kamar->kamar_kode]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="kamar_kode">Kamar Kode</label>
                                <input type="text" class="form-control" id="kamar_kode" name="kamar_kode" value="{{ $kamar->kamar_kode }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="kamar_nama">Kamar Nama</label>
                                <input type="text" class="form-control" id="kamar_nama" name="kamar_nama" placeholder="Nama Kamar" value="{{ $kamar->kamar_nama }}">
                            </div>

                            <div class="form-group">
                                <label for="kamar_desk">Deskripsi</label>
                                <textarea class="form-control" id="kamar_desk" name="kamar_desk" placeholder="Deskripsi Kamar">{{ $kamar->kamar_desk }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="kamar_ketersediaan">Tersedia</label>
                                <input type="number" class="form-control" id="kamar_ketersediaan" name="kamar_ketersediaan" placeholder="Jumlah" value="{{ $kamar->kamar_ketersediaan }}">
                            </div>

                            <div class="form-group">
                                <label for="kamar_harga">Harga</label>
                                <input type="number" class="form-control" id="kamar_harga" name="kamar_harga" placeholder="Masukkan Harga" value="{{ $kamar->kamar_harga }}">
                            </div>
                            <button type="submit" class="btn btn-primary" name="simpan">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
