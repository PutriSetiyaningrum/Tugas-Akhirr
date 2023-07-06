@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Tambah Data Event</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/master/event') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama Event">Nama Event</label>
                            <input type="text" class="form-control @error("Nama_Event") {{ 'is-invalid' }} @enderror" id="Nama_Event"
                            value="{{ old('Nama_Event') }}" name="Nama_Event" placeholder="Nama Event" autocomplete="off">
                            @error("Nama_Event")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mulai">Mulai</label>
                            <input type="datetime-local" class="form-control @error("mulai") {{ 'is-invalid' }} @enderror"
                            value="{{ old('mulai') }}" id="mulai" name="mulai" placeholder="mulai">
                            @error("mulai")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="selesai">Selesai</label>
                            <input type="datetime-local" class="form-control @error("selesai") {{ 'is-invalid' }} @enderror"
                            value="{{ old('selesai') }}" id="selesai" name="selesai" placeholder="selesai">
                            @error("selesai")
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
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
                            <textarea  type="text" class="form-control @error("deskripsi") {{ 'is-invalid' }} @enderror" id="Deskripsi"
                            name="deskripsi" placeholder="Deskripsi" autocomplete="off" rows="8" tabindex="4">{{ old('deskripsi') }}</textarea>
                            @error("deskripsi")
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

