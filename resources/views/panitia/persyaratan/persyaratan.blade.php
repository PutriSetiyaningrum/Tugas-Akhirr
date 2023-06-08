@extends('layouts.main')
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            @can("pelatih")
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
                            @endcan

                            @can("panitia")
                            <th class="text-center">No.</th>
                            <th>Nama Event</th>
                            <th class="text-center">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($persyaratan as $item)
                            @can("pelatih")
                            <tr>
                                <td style="width: 10px">{{ $loop->iteration }}.</td>
                                <td class="text-center">{{$item->kategori->Nama_Kategori_Event}}</td>
                                <td class="text-center">{{$item->cabang->Nama_Jenis_Cabang_Event}}</td>
                                <td class="text-center">{{ $item->sekolah }}</td>
                                <td class="text-center" style="width: 10px">
                                    <a href="{{ Storage::url($item->logo_sekolah) }}" download="logo_sekolah">
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
                                @can("panitia")

                                @endcan
                            </tr>
                            @endcan

                            @can("panitia")
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["Nama_Event"] }}</td>
                                <td width="11%" class="text-center">
                                    <a href="{{ url('/persyaratan/'.$item["id"]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @endcan
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

