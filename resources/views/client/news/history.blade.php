@extends('client.layout.master')

@section('content')
<!-- Start Feature Post Area -->
<section class="eblog-featured-post-area area-2 tp-section-gap">
    <div class="container">
        <div class="section-inner">
            <div class="row g-5">
                @foreach ($newsHistory as $new)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="eblog-featured-news style-two small">
                        <div class="image-area">
                            <a href="{{route('news.show',$new -> slug)}}"><img src="{{Storage::url($new -> thumbnail)}}" alt=""></a>
                        </div>
                        <div class="blog-content text-left">
                            @foreach ($new -> categories as $cat)
                                <span class="tag mb--15">{{$cat -> title}}</span>
                            @endforeach
                            <h4 class="heading-title ml--0 mb--10 text-start">
                                <a class="title-animation text-center" href="{{route('news.show',$new -> slug)}}">
                                    {{$new -> title}}
                                </a>
                            </h4>
                            <ul class="blog-meta justify-content-start m--0">
                                <li class="author"><span>BY</span>Elon Mask - 14 Jan, 2024 </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{$newsHistory -> links()}}
    </>
</section>
<!-- End Feature Post Area -->

<!-- Start Newsletter Area -->
<section class="eblog-newsletter-area tp-section-gap">
    <div class="container">
        <div class="section-inner">
            <p class="sub-title">Weekly updates</p>
            <h2 class="section-title">Join our newsletter for <br>
                latest updates!</h2>
            <p class="desc">Nisi dignissim tortor sed quam sed ipsum ut. <br>
                Montes, morbi euismod elit.</p>
            <form action="#" class="newsletter-form">
                <div class="form-inner">
                    <div class="single-input-wrapper">
                        <input type="email" name="email" placeholder="Your email address" required>
                    </div>
                    <div class="single-input-wrapper">
                        <button type="submit" class="subscribe-btn tp-btn btn-primary">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End Newsletter Area -->
@endsection