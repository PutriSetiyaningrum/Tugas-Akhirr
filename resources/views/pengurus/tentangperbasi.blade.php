@extends('pengurus.panel')
@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">Data Tentang PERBASI</h1>
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
            <a href="/create-tentangperbasi" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
          </div>
        </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Gambar</th>
                      <th>Deskripsi</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                
                    <tr>
                      <td></td>
                      <td></td>
                      <td><td><span class="badge bg-danger"></span></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td><td><span class="badge bg-warning"></span></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><span class="badge bg-primary"></span></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><span class="badge bg-success"></span></td>
                    </tr>
                  
                </table>
              </div>
      </div>
    </div>
  </div>
@endsection

