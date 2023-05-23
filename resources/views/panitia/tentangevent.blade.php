@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">Data Tentang Event</h1>
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
            <a href="{{ url('/informasi/tentangevent/create') }}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
          </div>
        </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Gambar</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>

                    @foreach ($tentangevent  as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td width="10%">
                        <img src="{{ url('/storage/'.$item->gambar) }}" height="100%" width="150" alt="srcset">
                      <td>{{ $item->Deskripsi }}</td>
                      <td width="11%">
                        <button type="button" class="btn btn-warning btn-sm">
                            <a href="{{ url('/informasi/tentangevent/' . $item->id) . '/edit' }}"><i class="fa fa-edit"></i></a>
                        </button>
                        |
                        <form action="{{ url('/informasi/tentangevent/'.$item->id) }}" method="POST" style="display: inline;">
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

