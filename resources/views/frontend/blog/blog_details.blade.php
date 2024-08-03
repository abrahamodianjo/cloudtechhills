@extends('frontend.main_master')
@section('main')
    @php
        $Aboutusbanner = App\Models\Aboutus::find(1);
    @endphp
    <!--Breadcrumb START-->
    <div class="breadcrumb-section jarallax pixels-bg" data-jarallax data-speed="0.6"
        style="	background-image: url('{{ asset($Aboutusbanner->image) }}');">
        <div class="container text-center">
            <h1>News Post</h1>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('blog.list') }}">News Home</a></li>
            </ul>
        </div>
    </div>
    <!--Breadcrumb END-->

    <div class="section-block">
        <div class="container">
            <div class="row">
                <!-- Left Side START -->
                <div class="col-md-9 col-sm-12 col-12">
                    <div class="blog-list">
                        <img src="{{ asset($blog->post_image) }}" alt="img">
                        <h4><a href="#">{{ $blog->post_titile }}</a></h4>
                        <ul class="blog-list-info">
                            <li><i class="ti-user"></i><span>Admin</span></li>
                            <li><i class="ti-calendar"></i><span>{{ $blog->created_at->format('M d Y') }}</span></li>
                            {{-- <li><i class="ti-pin-alt"></i><span>Business</span></li> --}}
                        </ul>
                        <p class="mt-25">
                            {!! $blog->long_descp !!}
                        </p>

                        @php
                            $comments = App\Models\Comment::where('post_id', $blog->id)->latest()->limit(5)->get();
                        @endphp

                        <!-- Comments Start -->
                        <div class="blog-comments mt-50">
                            <h3 class="blog-widget-title">All Comments</h3>
                            <div class="blog-comment-user">
                                <div class="row">
                                    @if ($comments->isEmpty())
                                    <div class="col-md-12 col-xs-12">
                                        <div class="comment-block clearfix">
                                            <p>No comments on this post yet!</p>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($comments as $item)
                                        <div class="col-md-11 col-xs-12">
                                            <div class="comment-block clearfix">
                                                <h6>{{ $item->name }}</h6>
                                                <strong>{{ $item->created_at->format('M d Y') }}</strong>
                                                <p>
                                                    {{ $item->message }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>

                            <h3 class="blog-widget-title">Your Comment</h3>
                            <form class="primary-form-3 mt-20" method="POST" action="{{ route('store.comment') }}">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $blog->id }}">

                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <input type="text" name="name" placeholder="Name *">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <input type="text" name="email" placeholder="E-mail *">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="message" id="message" placeholder="Message *"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="button-sm button-primary">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Comments End -->
                    </div>
                </div>
                <!-- Left Side END -->

                <!-- Right Side START -->
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="blog-post-right">


                        <h4 class="blog-widget-title">Categories</h4>
                        <div class="blog-post-categories mt-20">
                            <ul>
                                <div class="blog-post-categories mt-20">
                                    @foreach ($bcategory as $cat)
                                        <ul>
                                            <li><a
                                                    href="{{ url('blog/cat/list/' . $cat->id) }}">{{ $cat->category_name }}</a>
                                            </li>

                                        </ul>
                                    @endforeach
                            </ul>
                        </div>

                        <h4 class="blog-widget-title">Top News</h4>
                        <div class="top-news mt-20">
                            @foreach ($lpost as $post)
                                <div class="top-news-info">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-12 pr-0">
                                            <img src="{{ asset($post->post_image) }}" alt="img">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-12">
                                            <h3><a
                                                    href="{{ url('blog/details/' . $post->post_slug) }}">{{ $post->post_titile }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>


                    </div>
                </div>
                <!-- Right Side END -->
            </div>
        </div>
    </div>

    @php
        $clients = App\Models\Clients::latest()->get();
    @endphp
    <!-- Clients Carousel START -->
    <div class="section-block section-sm grey-bg">
        <div class="container">
            <div class="owl-carousel owl-theme clients clients-carousel">
                @foreach ($clients as $item)
                    <div class="item">
                        <img src="{{ asset($item->image) }}" alt="partner-image">
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Clients Carousel END -->
    <!-- Clients Carousel END -->
@endsection
