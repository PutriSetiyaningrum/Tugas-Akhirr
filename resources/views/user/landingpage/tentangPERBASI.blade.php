@extends('layouts_user.main')
@section('container')
            <section class="flat-title-page"><div class="overlay-page"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="breadcrumbs">
                                <h1>Tentang PERBASI<span class="style-color"></h1>
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
                                    <p class="text-center">{{ $data['Deskripsi'] }}</p>
                                </div>
                                @empty
                                <p class="text-center">Data tidak ada!</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
