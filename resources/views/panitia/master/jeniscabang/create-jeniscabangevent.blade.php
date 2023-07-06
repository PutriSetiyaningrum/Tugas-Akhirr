@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Tambah Data Jenis Cabang Event</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/master/jeniscabangevent') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama Jenis Cabang Event">Nama Jenis Cabang Event</label>
                            <input type="text" class="form-control @error("Nama_Jenis_Cabang_Event") {{ 'is-invalid' }} @enderror"
                            value="{{ old('Nama_Jenis_Cabang_Event') }}" id="Nama_Jenis_Cabang_Event" name="Nama_Jenis_Cabang_Event"
                            placeholder="Nama Jenis Cabang Event" autocomplete="off">
                            @error("Nama_Jenis_Cabang_Event")
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

