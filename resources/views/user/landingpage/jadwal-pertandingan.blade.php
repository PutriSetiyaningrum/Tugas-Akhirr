@extends('layouts_user.main')
@section('container')
<section class="flat-title-page"><div class="overlay-page"></div>
    <div class="container">
        <div class="team-heading wow fadeInDown" data-wow-delay="0ms" data-wow-duration="500ms">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs">
                        <h1>Jadwal Pertandingan<span class="style-color"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tf-space flat-work home2 home3">
        <div class="container">
            <div class="row">
                @forelse($jadwalpertandingan as $data)
                <div class="col-lg-12">
                    <div class="work-heading wow fadeInDown" data-wow-delay="0ms" data-wow-duration="500ms">
                        <h2 class="tf-title">{{ $data['deskripsi'] }}</span></h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="work-slider">
                        <div class="work-post style wow fadeInUp" data-wow-delay="0ms" data-wow-duration="500ms">
                            <div class="media">
                                <img src={{ asset('storage/'. $data['gambar']) }} alt="images">
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12">
                    <div class="work-heading wow fadeInDown" data-wow-delay="0ms" data-wow-duration="500ms">
                        <h2>Tidak Ada Jadwal Pertandingan</h2>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    @endsection
