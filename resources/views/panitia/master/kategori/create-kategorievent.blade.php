@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Tambah Kategori Event</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/master/kategorievent') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama Kategori Event">Nama Kategori Event</label>
                            <input type="text" class="form-control @error("Nama_Kategori_Event") {{ 'is-invalid' }} @enderror"
                            value="{{ old('Nama_Kategori_Event') }}" id="Nama_Kategori_Event" name="Nama_Kategori_Event"
                            placeholder="Nama kategori Event" autocomplete="off">
                            @error("Nama_Kategori_Event")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

