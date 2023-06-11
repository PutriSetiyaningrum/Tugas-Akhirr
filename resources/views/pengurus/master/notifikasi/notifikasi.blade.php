@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Data Event</h1>
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
                    <a href="{{ url('/master/notifikasi/create') }}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">No</th>
                        <th class="text-center">Pesan</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                    @foreach ($notifikasi  as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td >{{ $item->pesan }}</td>
                        <td width="11%" class="text-center">
                            <button type="button" class="btn btn-warning btn-sm">
                                <a href="{{ url('/master/notifikasi/' . $item->id) . '/edit' }}"><i class="fa fa-edit"></i></a>
                            </button>
                            |
                            <form action="{{ url('/master/notifikasi/'.$item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
