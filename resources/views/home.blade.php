@extends('layouts.template')

@section('content')
<h4 class="display-4">
    Selamat Datang
    @auth
    {{ Auth::user()->name }} !
@endauth
</h4>
    <div class="jumbotron py-2 px-3">
        <h4>Dashboard</h4>
        <div class="row">
            <div class="col-md-3 mb-2">
                <div class="card">
                    <h5 class="card-header bg-primary">Surat Keluar</h5>
                    <div class="card-body">
                        <p class="card-text"><i class="bi-envelope-paper"></i>
                            {{ App\Models\Letters::count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5 class="card-header bg-primary">Klasifikasi Surat</h5>
                    <div class="card-body">
                        <p class="card-text"><i class="bi-person-circle"></i>
                            {{ App\Models\User::where('role', 'guru')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="card">
                    <h5 class="card-header bg-primary">Staff Tata Usaha</h5>
                    <div class="card-body">
                        <p class="card-text"><i class="bi-person-circle"></i>
                            {{ App\Models\User::where('role', 'staff')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5 class="card-header bg-primary">Guru</h5>
                    <div class="card-body">
                        <p class="card-text"><i class="bi-person-circle"></i>
                            {{ App\Models\User::where('role', 'guru')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5 class="card-header bg-primary">Data Surat Masuk</h5>
                    <div class="card-body">
                        <p class="card-text"><i class="bi-person-circle"></i>
                            {{ App\Models\Letters::count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
