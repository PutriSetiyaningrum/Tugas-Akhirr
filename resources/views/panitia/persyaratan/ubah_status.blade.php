@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Status Validasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/panitia/home') }}">Panitia</a></li>
                        <li class="breadcrumb-item active">Ubah Status Validasi</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info card-outline">
                    <form action="{{ url('/persyaratan/' . encrypt($persyaratan->id) . '/status' ) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status"> Ubah Status Validasi </label>
                                <select name="status" class="form-control" id="status">
                                    <option value="">- Pilih -</option>
                                    <option value="1">Disetujui</option>
                                    <option value="2">Penolakan</option>
                                </select>
                            </div>
                            <div class="form-group" id="alasan" style="display: none">
                                <label for="deskripsi"> Alasan Penolakan </label>
                                <textarea name="deskripsi" class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-times"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section("js")

<script>
    $(document).ready(function() {
        $("#status").change(function() {
            let status= $("#status").val();

            if (status == 2) {
                $("#alasan").show();
            } else {
                $("#alasan").hide();
            }

        })
    })
</script>
@endsection


