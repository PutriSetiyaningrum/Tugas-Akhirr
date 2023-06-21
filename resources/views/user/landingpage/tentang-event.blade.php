@php
use Carbon\Carbon;
@endphp

@extends('layouts_user.main')
@section('container')

<section class="flat-title-page"><div class="overlay-page"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs">
                    <h1>Event<span class="style-color"></span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="flat-contact flat-blog-details">
    <div class="container">
        <div class="row">
            @foreach ($event as $item)
            <div class="col-md-12">
                <div class="blog-wrap flat-blog-grid">
                    <div class="grid-post post-1">
                        <div class="media">
                            <img src="{{ asset('storage/'. $item['gambar']) }}" alt="gambar" width="1000px">
                            <div class="tags">
                                @php
                                $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $item->mulai);
                                $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                                -
                                @php
                                $mulai = Carbon::createFromFormat('Y-m-d H:i:s', $item->selesai);
                                $format = $mulai->isoFormat('dddd, D MMMM YYYY HH:mm:ss');
                                echo $format;
                                @endphp
                            </div>
                        </div>
                        <div class="content">
                            <div class="meta link-style-3 font">
                                <a class="entry-author" href="team.html">
                                    {{ $item["user"]["name"] }}
                                </a> <a class="entry-comment" href="blog.html">0 Comments</a>
                            </div>
                            <h3 class="title-item">
                                <a href="{{ url('/tentang-event') . '/' . $item->slug }}">
                                    {{ $item["Nama_Event"] }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
