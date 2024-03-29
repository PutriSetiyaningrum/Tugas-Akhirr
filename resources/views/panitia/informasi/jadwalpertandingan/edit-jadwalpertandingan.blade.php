@extends('layouts.main')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0">Ubah Jadwal Pertandingan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
      <div class="card card-info card-outline">
            <div class="card-body">
              <form action="{{ url('/informasi/jadwalpertandingan/' . $dt->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              @method("PUT")
              <input type="hidden" name="gambarLama" value="{{ $dt->gambar }}" />
                <div class="card-body">
                  <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="gambar">
                  </div>
                  <div class="form-group">
                    <img src="{{ url('/storage/'.$dt->gambar) }}" height="100%" width="150" alt="srcset">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control @error("deskripsi") {{ 'is-invalid' }} @enderror"
                    id="deskripsi" name="deskripsi" placeholder="deskripsi" value="{{ $dt->deskripsi }}" autocomplete="off">
                    @error("deskripsi")
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
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

