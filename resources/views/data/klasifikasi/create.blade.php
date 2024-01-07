@extends('layouts.template')

@section('content')
<div class="table-container">
    <div class="container mt-5">
        <p class="fs-2 fw-semibold">Tambah Klasifikasi Surat!</p>
        <form action="{{ route('data.klasifikasi.store') }}" method="post" class="card p-5">
            @csrf
            @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
            @endif
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="mb-3 row">
              <label for="letter_code" class="form-label">Kode Surat :</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="letter_code" name="letter_code" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Kode surat wajib diisi.
                </div>
              </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_type" class="form-label">Klasifikasi Surat :</label>
                <div class="input-group has-validation">
                  <input type="text" class="form-control" id="name_type" name="name_type" aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                    Klasifikasi surat wajib diisi.
                  </div>
                </div>
            </div>
              <button class="btn btn-primary mt-3" type="submit">Tambah data </button>
        </form>
    </div>
</div>
