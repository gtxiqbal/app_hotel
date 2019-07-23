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

                        <form action="{{ route('proc_kamar', ['kamar_kode' => null]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="kamar_kode">Kamar Kode</label>
                                <input type="text" class="form-control" id="kamar_kode" name="kamar_kode" placeholder="Kamar Kode">
                            </div>

                            <div class="form-group">
                                <label for="kamar_nama">Kamar Nama</label>
                                <input type="text" class="form-control" id="kamar_nama" name="kamar_nama" placeholder="Nama Kamar">
                            </div>

                            <div class="form-group">
                                <label for="kamar_desk">Deskripsi</label>
                                <textarea class="form-control" id="kamar_desk" name="kamar_desk" placeholder="Deskripsi Kamar"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="kamar_ketersediaan">Tersedia</label>
                                <input type="number" class="form-control" id="kamar_ketersediaan" name="kamar_ketersediaan" placeholder="Jumlah">
                            </div>

                            <div class="form-group">
                                <label for="kamar_harga">Harga</label>
                                <input type="number" class="form-control" id="kamar_harga" name="kamar_harga" placeholder="Masukkan Harga">
                            </div>
                            <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
