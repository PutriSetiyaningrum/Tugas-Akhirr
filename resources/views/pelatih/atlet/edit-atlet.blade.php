@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Ubah Atlet</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/atlet/' . $dt->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Atlet</label>
                            <input type="text" class="form-control @error("nama") {{ 'is-invalid' }} @enderror"
                            id="nama" name="nama" placeholder="nama"
                            value="{{ $dt->nama }}"  autocomplete="off">
                            @error("nama")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">kategori Event</label>
                            <input type="text" class="form-control @error("tanggal_lahir") {{ 'is-invalid' }} @enderror"
                            id="tanggal_lahir" name="tanggal_lahir" placeholder="tanggal_lahir"
                            value="{{ $dt->tanggal_lahir }}"  autocomplete="off">
                            @error("tanggal_lahir")
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

