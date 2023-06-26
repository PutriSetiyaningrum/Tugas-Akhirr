@php
use App\Models\hasilpertandingan;
@endphp

@extends('layouts_user.main')
@section('container')
<section class="flat-title-page"><div class="overlay-page"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs">
                    <h1>Hasil Pertandingan<span class="style-color"></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tf-space flat-blog-grid">
        <div class="container">
            <h2 class="title-contact">Jadwal Pertandingan Hari Ini</h2>
            <br>
            <br>
            <div class="row">
                @forelse($hasilpertandingan as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="grid-post">

                        <div class="media">
                            <img src="{{ asset('storage/'. $data['gambar']) }}" alt="images">
                        </div>
                        <div class="content">
                            <h4 class="text-center">{{ $data['Deskripsi'] }}</h4>
                        </div>
                    </div>
                </div>
                @empty
                <h4 class="text-center">tidak ada jadwal pertandingan</h4>
                @endforelse
            </div>
        </div>
    </section>
    @endsection
