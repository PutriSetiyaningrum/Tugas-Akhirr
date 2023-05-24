@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Data Pelatih</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">
            @can("pengurus")
            <div class="card-header">
                <button type="button" class="btn btn-success float-right btn-sm" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
            @endcan
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Sekolah</th>
                        @can("pengurus")
                        <th>Aksi</th>
                        @endcan
                    </tr>

                    @foreach ($pelatih as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            @foreach ($item->pelatih as $item2)
                                <td>{{ $item2->sekolah }}</td>
                            @endforeach
                            @can("pengurus")
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit-{{ $item->id }}">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                |
                                <form action="{{ url('/akun/pelatih/'.$item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pelatih</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/akun/pelatih') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="sekolah"> Sekolah </label>
                        <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Masukkan Sekolah">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
@foreach ($pelatih as $item)
<div class="modal fade" id="modal-default-edit-{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pelatih</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/akun/pelatih/'.$item->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap" value="{{ $item->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ $item->email }}">
                    </div>
                    @foreach ($item->pelatih as $item2)
                    <label for="sekolah"> Sekolah </label>
                    <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Masukkan sekolah" value="{{ $item2->sekolah }}">
                    @endforeach
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

@endsection

