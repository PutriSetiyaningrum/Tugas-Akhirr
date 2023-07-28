@extends('layouts.main')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="m-0">Tambah Jadwal Pertandingan</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main Content -->
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="{{ url('/informasi/jadwalpertandingan') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control @error("gambar") {{ 'is-invalid' }} @enderror" id="gambar"
                                value="{{ old('gambar') }}" name="gambar" placeholder="gambar">
                                @error("gambar")
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea type="text" class="form-control @error("deskripsi") {{ 'is-invalid' }} @enderror" id="deskripsi"
                                name="deskripsi" placeholder="deskripsi" autocomplete="off">{{ old('deskripsi') }}</textarea>
                                @error("deskripsi")
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

