@extends('layouts_user.main')
@section('container')
<section class="flat-title-page"><div class="overlay-page"></div>
    <div class="container">
        <div class="team-heading wow fadeInDown" data-wow-delay="0ms" data-wow-duration="500ms">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs">
                        <h1>Tentang PERBASI Indramayu<span class="style-color"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-contact flat-blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="box">
                        @forelse($about_perbasi as $data)
                        <div class="text-center">
                            <img src="{{ asset('storage/'. $data['gambar']) }}" alt="gambar" width="1000px">
                        </div>
                        <div class="mt-5">
                            <h3 class="text-center">{{ $data['Deskripsi'] }}</h3>
                        </div>
                        @empty
                        <p class="text-center">Data tidak ada!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
<hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-">
                    <div class="box">
                        <div class="heading">
                            <div class="sub-title-contact">Hi Sobat Basket, ini alamat sekretariat PERBASI IMY </div>
                            <div class="title-contact">Jl. Tridaya Timur, Karanganyar
                                Belakang Gor Dharma Ayu, Indramayu</div>
                            </div>
                            <ul class="contact">
                                <li class="link-style-3">Email: <a href="mailto:perbasiimy@gmail.com" class="meta-mail">perbasiimy@gmail.Com</a></li>
                                <li class="link-style-3">Phone: <a href="tel:012345678" class="meta-phone">+682 321 151 092 (Herman) </a></li>
                                <li class="link-style-3">Instagram: <a href="bixos.com" class="meta-web">@perbasi_imy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
