@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Tambah Atlet</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/atlet/create-atlet') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Atlet</label>
                            <input type="text" class="form-control @error("nama") {{ 'is-invalid' }} @enderror"
                            value="{{ old('nama') }}" id="nama" name="nama"
                            placeholder="Nama Atlet" autocomplete="off">
                            @error("nama")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control @error("tanggal_lahir") {{ 'is-invalid' }} @enderror"
                            value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" name="tanggal_lahir"
                            placeholder="Tanggal Lahir" autocomplete="off">
                            @error("tanggal_lahir")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="posisi">Posisi</label>
                            <input type="text" class="form-control @error("posisi") {{ 'is-invalid' }} @enderror"
                            value="{{ old('posisi') }}" id="posisi" name="posisi"
                            placeholder="posisi" autocomplete="off">
                            @error("posisi")
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

