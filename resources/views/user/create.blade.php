@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('user.store') }}" method="PUT">
            @csrf
            @method('PUT')
             <div class="form-group">
                <label>Nama<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="name" />
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="email" />
            </div>
            <div class="form-group">
                <label>role <span class="text-danger">*</span></label>
                <input class="form-control" type="role" name="role" value="role" />
            </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ route('user.staff.home') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
