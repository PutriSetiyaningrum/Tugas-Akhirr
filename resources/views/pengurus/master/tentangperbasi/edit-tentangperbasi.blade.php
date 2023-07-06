@extends('layouts.main')
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
                <form action="{{ url('/master/tentangperbasi/' . $item->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method("PUT")
                    <input type="hidden" name="gambarLama" value="{{ $item->gambar }}" />
                    <div class="card-body">
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control @error("gambar") {{ 'is-invalid'}} @enderror"
                            value="{{ old("gambar") ?? $item->name ?? '' }}" id="gambar" name="gambar" placeholder="gambar">
                            @error("gambar")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ url('/storage/'.$item->gambar) }}" height="100%" width="150" alt="srcset">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control @error("Deskripsi") {{ 'is-invalid'}} @enderror"
                            value="{{ old("Deskripsi") ?? $item->Deskripsi ?? '' }}" id="Deskripsi" name="Deskripsi" placeholder="Deskripsi" autocomplete="off">
                            @error("Deskripsi")
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

