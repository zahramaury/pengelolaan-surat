@extends('layouts.template')

@section('content')
 @if (Session::get('success'))
 <div class="alert alert-success">{{Session::get('success')}}</div>

 @endif
 @if (Session::get('deleted'))
 <div class="alert alert-warning">{{Session::get('deleted')}}</div>

 @endif
 <h1 class="mb-0">Data guru</h1>
 <br>
 <a href="{{ route('user.guru.create') }}" class="btn btn-primary">Tambah Data</a>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($guru as $item)

            <tr>

                <td>{{$no++}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['email']}}</td>
                <td>{{$item['role']}}</td>
                <td class="d-flex">
                    {{-- atau kalau path parameternya ada lebih dari satu : route ('medicine.edit',['param1' => $isi1, 'param2'=>isi2]) --}}
                    <a href="{{ route('user.guru.edit', $item['id']) }}" class="btn btn-primary">edit</a>
                    <form action="{{ route('user.guru.delete', $item['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hps">Hapus</button>
                      <div class="modal fade" id="hps" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Mau di hapus?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </div>
                        </div>
                      </div>

                  </form>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

    @endsection
