@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Edit Persyaratan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/event/persyaratan/'. $id_event . '/'. $edit['id'] . '/update' ) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method("PUT")
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori_id">Kategori Event</label>
                                    <select name="kategori_id" class="form-control @error("kategori_id") {{ 'is-invalid' }} @enderror" id="kategori_id">
                                        <option value="">- Pilih -</option>
                                        @foreach ($kategorievent as $item)
                                            @if ($item->id == $edit->kategori_id)
                                                <option value="{{ $item->id }}" {{ old('kategori_id', $edit->kategori_id) == $item->id ? 'selected' : '' }} selected>{{ $item->Nama_Kategori_Event }}</option>
                                            @else
                                                <option value="{{ $item->id }}" {{ old('kategori_id', $edit->kategori_id) == $item->id ? 'selected' : '' }} >{{ $item->Nama_Kategori_Event }}</option>
                                            @endif
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
                                            @if ($item->id == $edit->jenis_cabang_id)
                                                <option value="{{ $item->id }}" {{ old('jenis_cabang_id', $edit->jenis_cabang_id) == $item->id ? 'selected' : '' }} selected>{{ $item->Nama_Jenis_Cabang_Event }}</option>
                                            @else
                                                <option value="{{ $item->id }}" {{ old('jenis_cabang_id', $edit->jenis_cabang_id) == $item->id ? 'selected' : '' }} >{{ $item->Nama_Jenis_Cabang_Event }}</option>
                                            @endif
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
                                    <label for="sekolah">Sekolah</label>
                                    <input type="text" class="form-control @error("sekolah") {{ 'is-invalid' }} @enderror" id="sekolah" name="sekolah" placeholder="Sekolah" value="{{ $edit->sekolah }}" autocomplete="off">
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
                                    <input type="hidden" name="logo_sekolah_lama" value="{{ $edit->logo_sekolah}}">
                                    <input type="file" class="form-control" id="logo_sekolah" name="logo_sekolah" placeholder="Logo Sekolah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Surat Rekomendasi Kepala Sekolah</label>
                                    <input type="hidden" name="surat_rekomendasi_kepala_sekolah_lama" value="{{ $edit->surat_rekomendasi_kepala_sekolah}}">
                                    <input type="file" class="form-control" id="surat_rekomendasi_kepala_sekolah" name="surat_rekomendasi_kepala_sekolah" placeholder="Surat Rekomendasi Sekolah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Form Pendaftaran</label>
                                    <input type="hidden" name="form_pendaftaran_lama" value="{{ $edit->form_pendaftaran}}">
                                    <input type="file" class="form-control" id="form_pendaftaran" name="form_pendaftaran" placeholder="From Pendaftaran">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <input type="hidden" name="foto_lama" value="{{ $edit->foto}}">
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Ijazah</label>
                                    <input type="hidden" name="ijazah_lama" value="{{ $edit->ijazah}}">
                                    <input type="file" class="form-control" id="ijazah" name="ijazah" placeholder="Ijazah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Akte</label>
                                    <input type="hidden" name="akte_lama" value="{{ $edit->akte}}">
                                    <input type="file" class="form-control" id="akte" name="akte" placeholder="Akte">
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

