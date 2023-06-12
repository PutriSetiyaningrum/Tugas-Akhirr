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
                    <h1 class="m-0">Bagan Event</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        @foreach ($baganevent as $data)
        <div class="card" style="max-width: 1500%;">
            <div class="row no-gutters justify-content-center">
                <div class="text-center">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $data->Deskripsi }}</b></h5>
                    </div>
                </div>
                <div class="text-center">
                    <img src="{{ asset('storage/'. $data['gambar']) }}" alt="gambar"  height="95%" width="900">
                </div>

            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection
