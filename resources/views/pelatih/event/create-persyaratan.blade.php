@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Tambah Persyaratan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/event/persyaratan/'.encrypt($id)) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori_id">Kategori Event</label>
                                    <select name="kategori_id" class="form-control @error("kategori_id") {{ 'is-invalid' }} @enderror" id="kategori_id">
                                        <option value="">- Pilih -</option>
                                        @foreach ($kategorievent as $item)
                                        <option value="{{ $item["id"] }}" {{ old('kategori_id') == $item["id"] ? 'selected' : '' }}>
                                            {{$item->Nama_Kategori_Event}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error("kategori_id")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">Jenis Cabang Event</label>
                                    <select name="jenis_cabang_id" class="form-control @error("jenis_cabang_id") {{ 'is-invalid' }} @enderror" id="jenis_cabang_id">
                                        <option value="">- Pilih -</option>
                                        @foreach ($jeniscabang as $item)
                                        <option value="{{ $item["id"] }}" {{ old('jenis_cabang_id') == $item["id"] ? 'selected' : '' }}>
                                            {{$item->Nama_Jenis_Cabang_Event}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error("jenis_cabang_id")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">Sekolah</label>
                                    <input type="text" class="form-control @error("sekolah") {{ 'is-invalid' }} @enderror"
                                    id="Deskripsi" name="sekolah" placeholder="Sekolah" value="{{ old('sekolah') }}" autocomplete="off">
                                    @error("sekolah")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Logo Sekolah</label>
                                    <input type="file" class="form-control @error("logo_sekolah") {{ 'is-invalid' }} @enderror" id="logo_sekolah"
                                    value="{{ old('logo_sekolah') == $item["id"] ? 'selected' : '' }}" name="logo_sekolah" placeholder="Logo Sekolah">
                                    @error("logo_sekolah")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Surat Rekomendasi Kepala Sekolah</label>
                                    <input type="file" class="form-control @error("surat_rekomendasi_kepala_sekolah") {{ 'is-invalid' }} @enderror" id="surat_rekomendasi_kepala_sekolah"
                                    value="{{ old('surat_rekomendasi_kepala_sekolah') == $item["id"] ? 'selected' : '' }}" name="surat_rekomendasi_kepala_sekolah" placeholder="Surat Rekomendasi Sekolah">
                                    @error("surat_rekomendasi_kepala_sekolah")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Form Pendaftaran</label>
                                    <input type="file" class="form-control  @error("form_pendaftaran") {{ 'is-invalid' }} @enderror"
                                    value="{{ old('form_pendaftaran') == $item["id"] ? 'selected' : '' }}" id="form_pendaftaran" name="form_pendaftaran" placeholder="From Pendaftaran">
                                    @error("form_pendaftaran")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <input type="file" class="form-control @error("foto") {{ 'is-invalid' }} @enderror"
                                    value="{{ old('foto') == $item["id"] ? 'selected' : '' }}" id="foto" name="foto" placeholder="Foto">
                                    @error("foto")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Ijazah</label>
                                    <input type="file" class="form-control @error("ijazah") {{ 'is-invalid' }} @enderror"
                                    value="{{ old('ijazah') == $item["id"] ? 'selected' : '' }}" id="ijazah" name="ijazah" placeholder="Ijazah">
                                    @error("ijazah")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Akte</label>
                                    <input type="file" class="form-control @error("akte") {{ 'is-invalid' }} @enderror"
                                    value="{{ old('akte') == $item["id"] ? 'selected' : '' }}" id="akte" name="akte" placeholder="Akte">
                                    @error("akte")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
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

