@extends('layouts.main')

@section("css")
<link rel="stylesheet" href="{{ url('/AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('/AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('/AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pelatih</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pelatih</li>
                    </ol>
                </div>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Sekolah</th>
                            @can("pengurus")
                            <th class="text-center">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatih as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->email }}</td>

                            <td class="text-center">{{ $item->pelatih->sekolah }}</td>

                            @can("pengurus")
                            <td class="text-center">
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
                    </tbody>
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
                    <label for="sekolah"> Sekolah </label>
                    <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Masukkan sekolah" value="{{ $item->pelatih->sekolah }}">
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

@section("js")

<script src="{{ url('/adminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/adminLTE') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection

