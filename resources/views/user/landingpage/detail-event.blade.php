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
                        <h2 class="title-comment">02 <span class="text-color-3">[COMMENTS]</span></h2>
                        <p class="text">{{ $event->deskripsi}}</p>
                        <ol class="comment-list">
                            <li class="comment-01">
                                <div class="comment-avatar">
                                    <img src="{{ url('') }}/assets/user/images/image-box/comment-avatar-01.png" alt="images">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-meta">
                                        <div class="comment-author">
                                            <h5> Monsur Rahman Lito </h5>
                                        </div>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="comment-text">
                                        <p>
                                            Phasellus ac consequat turpis, sit amet fermentum nulla. Donec dignissim augue nunc. Praesent bibendum
                                            erat ac lectus molestie lobortis. Curabitur ultrices justo ac leo facilisis tincidunt. Maecenas et
                                            dui eget nisl ornare scelerisque.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="comment-avatar">
                                    <img src="{{ url('') }}/assets/user/images/image-box/comment-avatar-02.png"
                                    alt="images">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-meta">
                                        <div class="comment-author"><h5> Monsur Rahman Lito </h5></div>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="comment-text">
                                        <p>Phasellus ac consequat turpis, sit amet fermentum nulla. Donec dignissim augue nunc. Praesent bibendum
                                            erat ac lectus molestie lobortis. Curabitur ultrices justo ac leo facilisis tincidunt. Maecenas et
                                            dui eget nisl ornare scelerisque.</p>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                            <div id="respond" class="respond-comment">
                                <h2 class="title-comment">good <span class="text-color-3">[COMMENTS]</span></h2>
                                <p class="text"> Nunc velit metus, volutpat elementum euismod eget, cursus nec nunc.</p>
                                <form method="post" id="contactform" class="comment-form form-submit"
                                action="./contact/contact-process.php" accept-charset="utf-8"
                                novalidate="novalidate">

                                <div class="text-wrap clearfix">
                                    <fieldset class="name-wrap style-text">
                                        <input type="text" id="name" class="tb-my-input" name="name"
                                        tabindex="1" placeholder="Enter Full Name" value="" size="32"
                                        aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="email-wrap style-text">
                                        <input type="email" id="email" class="tb-my-input" name="email"
                                        tabindex="2" placeholder="Enter Your Email Address" value="" size="32"
                                        aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="phone-wrap style-text">
                                        <input type="tel" id="phone" class="tb-my-input" name="phone"
                                        tabindex="1" placeholder="+55 (121) 234 444" value="" size="32"
                                        aria-required="true" required="">
                                    </fieldset>
                                    <fieldset class="site-wrap style-text">
                                        <input type="text" id="site" class="tb-my-input" name="site"
                                        tabindex="1" placeholder="Enter Your Website" value="" size="32"
                                        aria-required="true" required="">
                                    </fieldset>
                                </div>
                                <fieldset class="message-wrap">
                                    <textarea id="comment-message" name="message" rows="8" tabindex="4"
                                    placeholder="Enter Your Message"
                                    aria-required="true"></textarea>
                                </fieldset>
                                <button name="submit" type="submit" id="comment-reply"
                                class="button btn-style4 btn-submit-comment"><span>Submit Now </span></button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection
