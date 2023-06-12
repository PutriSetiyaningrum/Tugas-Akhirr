@php
    use App\Models\hasilpertandingan;
@endphp

@extends('layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Hasil Pertandingan Hari Ini</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                @foreach ($hasilpertandingan as $data)
                <div class="col-lg-3 col-sm-5">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="text-center">
                            <br>
                            <h3>
                                <img src="{{ asset('storage/'. $data['gambar']) }}" alt="gambar" width="150px">
                            </h3>
                        </div>
                        <br>
                        <a href=""class="small-box-footer"><b>{{ $data->Deskripsi }}</b></a>
                    </div>
                </div>
                @endforeach
                <!-- fix for small devices only -->
                {{-- <div class="clearfix hidden-md-up"></div> --}}
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

