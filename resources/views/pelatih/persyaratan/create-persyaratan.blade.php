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
                <form action="{{ url('/persyaratan') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="event_id">Event</label>
                                    <select name="event_id" class="form-control" id="event_id">
                                        <option value="">- Pilih -</option>
                                        @foreach ($event as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->Nama_Event}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori_id">Kategori Event</label>
                                    <select name="kategori_id" class="form-control" id="kategori_id">
                                        <option value="">- Pilih -</option>
                                        @foreach ($kategorievent as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->Nama_Kategori_Event}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">Jenis Cabang Event</label>
                                    <select name="jenis_cabang_id" class="form-control" id="jenis_cabang_id">
                                        <option value="">- Pilih -</option>
                                        @foreach ($jeniscabang as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->Nama_Jenis_Cabang_Event}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">Sekolah</label>
                                    <input type="text" class="form-control" id="Deskripsi" name="sekolah" placeholder="Sekolah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Logo Sekolah</label>
                                    <input type="file" class="form-control" id="logo_sekolah" name="logo_sekolah" placeholder="Logo Sekolah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Surat Rekomendasi Kepala Sekolah</label>
                                    <input type="file" class="form-control" id="surat_rekomendasi_kepala_sekolah" name="surat_rekomendasi_kepala_sekolah" placeholder="Surat Rekomendasi Sekolah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Form Pendaftaran</label>
                                    <input type="file" class="form-control" id="form_pendaftaran" name="form_pendaftaran" placeholder="From Pendaftaran">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="gambar">Ijazah</label>
                                <input type="file" class="form-control" id="ijazah" name="ijazah" placeholder="Ijazah">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="gambar">Akte</label>
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

