@extends('panitia.panel')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">Data Jenis Cabang Event</h1>
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
            <a href="/create-jeniscabangevent" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
          </div>
        </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Jenis Cabang Event</th>
                      <th>Aksi</th>
                    </tr>
                  
                    @foreach ($jeniscabangevent  as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->Nama_Jenis_Cabang_Event }}</td>
                      <td width="10%">
                        <a href="{{ url('edit-jeniscabangevent',$item->id) }}"><i class="fas fa-edit"></i></a>
                        |
                        <a href="{{ url('delete-jeniscabangevent',$item->id) }}"><i class="fas fa-trash-alt" style="color: red"></i></a>
                      </td>
                    </tr>
                    @endforeach
                </table>
              </div>
      </div>
    </div>
  </div>
@endsection
