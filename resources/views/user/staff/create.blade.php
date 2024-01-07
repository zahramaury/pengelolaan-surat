@extends('layouts.template')

@section('content')
    <div class="table-container">
        <p class="fs-2 fw-semibold">Tambah Data Staff Tata Usaha!</p>
        <form action="{{ route('user.staff.store') }}" method="POST" class="card p-5">
            @csrf
            @method('POST')

            @if (Session::get('success'))
                <div class="alert alert-success"> {{ Session::get('success') }} </div>
            @endif
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
            {{-- <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna :</label>
                <div class="col-sm-10">
                    <select name="role" id="role" class="form-control">
                        <option selected disabled hidden>Pilih</option>
                        <option value="staff">Staff</option>
                        <option value="guru">Guru</option>
                    </select>
                </div>
            </div> --}}
            <button type="submit" class="btn btn-primary">Tambah data</button>
        </form>
    </div>
@endsection