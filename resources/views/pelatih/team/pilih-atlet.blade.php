@extends('layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Pilih Atlet</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="{{ url('/team/pilih-atlet') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="event">Event</label>
                                    <select name="event" class="form-control @error("event") {{ 'is-invalid' }} @enderror" id="event">
                                        <option value="">- Pilih -</option>
                                        @foreach ($event as $item)
                                        <option value="{{ $item["id"] }}" {{ old('event') == $item["id"] ? 'selected' : '' }}>
                                            {{$item->Nama_Event}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error("event")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pelatih">Sekolah</label>
                                    <select name="pelatih" class="form-control @error("pelatih") {{ 'is-invalid' }} @enderror" id="pelatih">
                                        <option value="">- Pilih -</option>
                                        @foreach ($Pelatih as $item)
                                        <option value="{{ $item["id"] }}" {{ old('id') == $item["id"] ? 'selected' : '' }}>
                                            {{$item->sekolah}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error("pelatih")
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
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
                            <div class="content col-md-12">
                                <div class="card-body">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Posisi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>

                                            @foreach ($atlet  as $item)
                                            <tr>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->posisi }}</td>
                                                <td class="text-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="atlet_id[]" value="{{ $item->id }}">
                                                        <label class="form-check-label">Pilih</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
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

