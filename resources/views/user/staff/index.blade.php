@extends('layouts.template')

@section('content')
 @if (Session::get('success'))
 <div class="alert alert-success">{{Session::get('success')}}</div>

 @endif
 @if (Session::get('deleted'))
 <div class="alert alert-warning">{{Session::get('deleted')}}</div>
 @endif
 <h1 class="mb-0">Data Staff Tata Usaha</h1>
 <a href="{{ route('user.staff.create') }}" class="btn btn-primary">Tambah Data</a>
    <table class="table table-bordered table-striped mt-3">
        {{-- <form method="GET" action="{{ route('user.staff.index')}}">
            <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari nama...">
        <button type="submit" class="btn btn-outline-secondary">Cari</button>
    </div>
    </form> --}}
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
            @php $no =1; @endphp
            @foreach($staff as $item)

            <tr>

                <td>{{$no++}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['email']}}</td>
                <td>{{$item['role']}}</td>
                <td class="d-flex">
                    {{-- atau kalau path parameternya ada lebih dari satu : route ('medicine.edit',['param1' => $isi1, 'param2'=>isi2]) --}}
                         <a href="{{ route('user.staff.edit',$item['id']) }}" class="btn btn-primary">edit</a>
                         <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-{{ $item['id']}}">Hapus</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="confirmDeleteModal-{{ $item['id']}}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="confirmDeleteModalLabel">Konfirmasi hapus data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    mau dihapus?
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ route('data.klasifikasi.delete', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
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
