@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Data Pengunjung</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">
            @can("pengunjung")
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
                        <th>Alamat</th>
                        <th>Telepon</th>
                        @can("pengurus")
                        <th>Aksi</th>
                        @endcan
                    </tr>

                    @foreach ($pengunjung  as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->users->name }}</td>
                        <td>{{ $item->users->email }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->telepon }}</td>
                        @can("pengurus")
                        <td>
                            <form action="{{ url('/akun/pengunjung/'.$item->users->id) }}" method="POST" style="display: inline;">
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


@endsection

