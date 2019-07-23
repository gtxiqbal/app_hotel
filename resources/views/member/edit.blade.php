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

                        <form action="{{ route('proc_member', ['id' => null]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="member_nama">Nama</label>
                                <input type="text" class="form-control" id="member_nama" name="member_nama" placeholder="Nama Member" required>
                            </div>

                            <div class="form-group">
                                <label for="member_user">Username</label>
                                <input type="text" class="form-control" id="member_user" name="member_user" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="aaa@aaa.com" required>
                            </div>

                            <div class="form-group">
                                <label for="member_alamat">Alamat</label>
                                <textarea class="form-control" id="member_alamat" name="member_alamat" placeholder="Member Alamat" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
