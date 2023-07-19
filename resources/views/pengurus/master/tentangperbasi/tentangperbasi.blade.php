@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tentang PERBASI</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tentang PERBASI</li>
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
                <div class="card-tools">
                    <a href="{{ url('/master/tentangperbasi/create') }}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>

                        @foreach ($tentangperbasi  as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td width="10%" class="text-center">
                                <img src="{{ url('/storage/'.$item->gambar) }}" height="100%" width="150" alt="srcset">
                                <td class="text-center">{{ $item->Deskripsi }}</td>
                                <td width="11%" class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <a href="{{ url('/master/tentangperbasi/' . $item->id) . '/edit' }}"><i class="fa fa-edit"></i></a>
                                    </button>
                                    |
                                    <form action="{{ url('/master/tentangperbasi/'.$item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

