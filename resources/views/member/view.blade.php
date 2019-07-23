@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $page_title }}</div>

                    <div class="card-body">
                        <a href="{{ route('add_member') }}" class="btn btn-primary">Tambah Member</a>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped tb-kamar">
                            <thead>
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($member as $m)
                                <tr class="text-center">
                                    <th id="member_nama">{{ $m->member_nama }}</th>
                                    <th>{{ $m->member_user }}</th>
                                    <th>{{ $m->email }}</th>
                                    <th>
                                        <a href="{{ route('edit_member', ['id' => $m->id]) }}" class="btn btn-primary">Edit</a> ||
                                        <a href="{{ route('del_member', ['id' => $m->id]) }}" onclick="return confirm('Hapus member '+document.getElementById('member_nama').innerHTML+' ?');" class="btn btn-danger">Delete</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $member->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
