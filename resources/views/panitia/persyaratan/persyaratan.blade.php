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
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ url('/persyaratan/create') }}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
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
                        @foreach ($persyaratan as $item)
                        <tr>
                            <td style="width: 10px">{{ $loop->iteration }}.</td>
                            <td class="text-center">{{$item->kategori->Nama_Kategori_Event}}</td>
                            <td class="text-center">{{$item->cabang->Nama_Jenis_Cabang_Event}}</td>
                            <td class="text-center" style="width: 30px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center" style="width: 30px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center" style="width: 30px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center" style="width: 30px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center"  style="width: 30px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center"  style="width: 30px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center"  style="width: 30px">
                                <a href="">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td width="11%">
                                <button class="btn btn-warning btn-sm">
                                    <a href="{{ url('/persyaratan/' . $item->id) . '/edit' }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </button>
                                |
                                <form action="{{ url('/informasi/hasilpertandingan/'.$item->id) }}" method="POST" style="display: inline;">
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
