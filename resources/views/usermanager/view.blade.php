@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $page_title }}</div>

                    <div class="card-body">
                        <a href="{{ route('add_user') }}" class="btn btn-primary">Tambah User</a>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped tb-kamar">
                            <thead>
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userman as $user)
                                <tr class="text-center">
                                    <th class="user_nama">{{ $user->name }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th>{{ $user->level }}</th>
                                    <th>
                                        <a href="{{ route('edit_user', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a> ||
                                        <a href="{{ route('del_user', ['id' => $user->id]) }}" onclick="return confirm('Hapus User '+$('.user_nama').html()+' ?');" class="btn btn-danger">Delete</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $userman->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
