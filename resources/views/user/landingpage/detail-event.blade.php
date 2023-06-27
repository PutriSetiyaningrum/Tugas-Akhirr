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
                    <h1>
                        {{ $event->Nama_Event }}
                        <br>
                        <span class="style-color"></span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="flat-contact flat-blog-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article class="post">
                    <div id="comments">
                        <h2 class="title-comment">deskripsi event <span class="text-color-3"></span></h2>
                        <p class="text">{{ $event->deskripsi}}</p>
                        <h2 class="title-comment"><span class="text-color-3">berikan komentarmu</span></h2>
                        @if (empty(Auth::user()))
                        <div class="alert alert-danger">
                            Anda Harus Login Terlebih Dahulu Untuk Mengisi Komentar
                        </div>
                        @else
                        <fieldset class="message-wrap">
                            <div class="btn-group">
                                <button class="btn btn-danger" id="btn-komentar" style="height: 40px; font-size: 16px; border-radius: 5px; width: 120px">
                                    <i class="fa fa-comment"></i> Komentar
                                </button>
                            </div>
                        </fieldset>
                        <form action="" style="display:none" id="komentar" method="POST">
                            @csrf
                            <input type="hidden" name="id_event" value="{{$event->id}}">
                            <input type="hidden" name="parent" value="0">
                            <textarea class="form-control mt-3" name="komentar" rows="8" tabindex="4"
                            placeholder="Enter Your Message" aria-required="true" style="font-size: 16px"></textarea>
                            <button class="btn btn-primary" style="margin-top: 10px; height: 40px; font-size: 16px; border-radius: 5px; width: 120px">
                                <i class="fa fa-save"></i> Submit
                            </button>
                        </form>
                        @endif
                        <hr>
                        <ol class="comment-list">
                            @foreach ($event->komentar()->where("parent", 0)->orderBy("created_at", "DESC")->get() as $item)
                            <li class="comment-01">
                                <div class="comment-avatar">
                                    @if (empty($item->user->foto))
                                    <img src="{{ url('/AdminLTE/dist/img/user.png') }}" width="50">
                                    @else
                                    <img src="{{ url('/storage/'.$item->user->foto) }}" width="50">
                                    @endif
                                </div>
                                <div class="comment-content" >
                                    <div class="comment-meta">
                                        <div class="comment-author">
                                            <h5>
                                                {{ $item["user"]["name"] }}
                                            </h5>
                                        </div>
                                        <div class="star">
                                            {{ $item["created_at"]->diffForHumans() }}
                                        </div>
                                    </div>
                                    <div class="comment-text">
                                        <p>
                                            {{ $item["komentar"] }}
                                        </p>
                                    </div>
                                    @foreach ($item->childs()->orderBy("created_at", "DESC")->get() as $child)

                                    <div class="comment-meta pt-3">
                                        @if (empty($child->user->foto))
                                        <img src="{{ url('/AdminLTE/dist/img/user.png') }}" width="50">
                                        @else
                                        <img src="{{ url('/storage/'.$child->user->foto) }}" width="50">
                                        @endif
                                        <div class="comment-author pl-3" style="margin-top: 15px;">
                                            <h5>
                                                {{ $child["user"]["name"] }}
                                            </h5>
                                        </div>
                                        <div class="star" style="margin-top: 15px">
                                            {{ $child["created_at"]->diffForHumans() }}
                                        </div>
                                    </div>
                                    <div class="comment-text">
                                        <p>
                                            {{ $child["komentar"] }}
                                        </p>
                                    </div>
                                    @endforeach

                                    <form action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_event" value="{{$item->id_event}}">
                                        <input type="hidden" name="parent" value="{{$item->id}}">
                                        <textarea name="komentar" class="form-control" rows="5" style="margin-top: 10px; font-size: 16px" placeholder="Masukkan Balasan Komentar"></textarea>
                                        @if (empty(Auth::user()))

                                        @else
                                        <button type="reset" class="btn btn-danger mt-3" style="height: 40px; font-size: 16px; border-radius: 5px; width: 70px">
                                            <i class="fa fa-times"></i> Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary mt-3" style="height: 40px; font-size: 16px; border-radius: 5px; width: 80px">
                                            <i class="fa fa-save"></i> Balas
                                        </button>
                                        @endif
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
</section>
@endsection

@section("javascript")
<script>
    $(document).ready(function() {
        $("#btn-komentar").click(function() {
            $('#komentar').toggle('slide')
        });
    })
</script>
@endsection
