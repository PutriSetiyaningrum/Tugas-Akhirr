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
                <div class="col-sm-10">
                    <h1 class="m-0">Persyaratan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">
            @can("pelatih")
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ url('/event/persyaratan/'.$id.'/create') }}" class="btn btn-success">Tambah Persyaratan <i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            @endcan
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Jenis Cabang</th>
                            <th class="text-center">Sekolah</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">Surat Rekomendasi</th>
                            <th class="text-center">Form Pendaftaran</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Ijazah</th>
                            <th class="text-center">Akte</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $item)
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}.</td>
                            <td class="text-center">{{$item->kategori->Nama_Kategori_Event}}</td>
                            <td class="text-center">{{$item->cabang->Nama_Jenis_Cabang_Event}}</td>
                            <td class="text-center">{{ $item->sekolah }}</td>
                            <td class="text-center" style="width: 10px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center" style="width: 10px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center" style="width: 10px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center"  style="width: 10px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center"  style="width: 10px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center"  style="width: 10px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/persyaratan/event/'.$item["kategori"]["id"].'/persyaratan/'.$item['id'].'/edit') }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ url('/persyaratan/event/'.$item["kategori"]["id"].'/persyaratan/'.$item['id'].'/destroy') }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
