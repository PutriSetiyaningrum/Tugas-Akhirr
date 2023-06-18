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
                    <h1>Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/panitia/home') }}">Panitia</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">

            <div class="card-header">
                <h5 class="card-title">
                    <a href="{{ url('/persyaratan/')}}">
                        Kembali
                    </a>
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="text-right" style="width: 200px">Event</td>
                            <td class="text-center">:</td>
                            <td>
                                {{ $persyaratan->event->Nama_Event }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Kategori</td>
                            <td class="text-center">:</td>
                            <td>
                                {{ $persyaratan->kategori->Nama_Kategori_Event }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Jenis Cabang Event</td>
                            <td class="text-center">:</td>
                            <td>
                                {{ $persyaratan->cabang->Nama_Jenis_Cabang_Event }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Sekolah</td>
                            <td class="text-center">:</td>
                            <td>
                                {{ $persyaratan->sekolah }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Logo Sekolah</td>
                            <td class="text-center">:</td>
                            <td>
                                <a target="_blank" href="{{ url('/persyaratan/file/' . $persyaratan->id . '/logo_sekolah') }}">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Surat Rekomendasi Kepala Sekolah</td>
                            <td class="text-center">:</td>
                            <td>
                                <a target="_blank" href="{{ url('/persyaratan/file/' . $persyaratan->id . '/surat_rekomendasi') }}">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Form Pendaftaran</td>
                            <td class="text-center">:</td>
                            <td>
                                <a target="_blank" href="{{ url('/persyaratan/file/' . $persyaratan->id . '/form_pendaftaran') }}">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Foto</td>
                            <td class="text-center">:</td>
                            <td>
                                <a target="_blank" href="{{ url('/persyaratan/file/' . $persyaratan->id . '/foto') }}">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Ijazah</td>
                            <td class="text-center">:</td>
                            <td>
                                <a target="_blank" href="{{ url('/persyaratan/file/' . $persyaratan->id . '/ijazah') }}">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right" style="width: 200px">Akte</td>
                            <td class="text-center">:</td>
                            <td>
                                <a target="_blank" href="{{ url('/persyaratan/file/' . $persyaratan->id . '/akte') }}">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
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

