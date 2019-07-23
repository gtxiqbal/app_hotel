@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $page_title }} {{ $users->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('update_user') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Member" value="{{ $users->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="aaa@aaa.com" value="{{ $users->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password user" value="{{ $users->password }}" required>
                            </div>

                            <div class="form-group">
                                <label for="level">Level</label>
                                <select class="form-control" id="level" name="level" required>
                                    <option value="pilih">Pilih Level</option>
                                    @foreach($level as $lvl)
                                        @if($users->level == $lvl)
                                            <option value="{{ $lvl }}" selected>{{ ucfirst($lvl) }}</option>
                                        @else
                                            <option value="{{ $lvl }}">{{ ucfirst($lvl) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary" name="simpan">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
