@extends('layouts.template')

@section('content')
    <form action="{{ route('user.guru.update', $user['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value=" {{ $user['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email"  value=" {{ $user['email'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Ubah Password :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah data</button>
    </form>
@endsection
