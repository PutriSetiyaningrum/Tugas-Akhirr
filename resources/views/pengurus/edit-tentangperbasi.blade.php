@extends('pengurus.panel')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">Ubah Tentang PERBASI</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
      <div class="card card-info card-outline">
            <div class="card-body">
              <form action="{{ url('update-tentangperbasi', $dt->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="gambar">
                  </div>
                  <div class="form-group">
                    <img src="{{ asset('img/'. $dt->gambar) }}" height="100%" width="150" alt="" srcset="">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="Deskripsi" name="deskripsi" placeholder="Deskripsi" value="{{ $dt->Deskripsi }}">
                  </div>
                </div>
                <!-- /.card-body -->

                  <div class="card-body">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                  </div>
              </form>
            </div>
      </div>
    </div>
  </div>
@endsection

