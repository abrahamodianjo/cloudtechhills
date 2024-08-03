@extends('frontend.main_master')
@section('main')
    @php
        $Aboutusbanner = App\Models\Aboutus::find(1);
    @endphp
    <!--Breadcrumb START-->
    <div class="breadcrumb-section jarallax pixels-bg" data-jarallax data-speed="0.6"   style="	background-image: url('{{ asset($Aboutusbanner->image) }}');">
        <div class="container text-center">
            <h1>News Category</h1>
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
                <div class="col-md-10 col-sm-12 col-12 offset-md-1">
                    <div class="row">
                        @foreach ($blog as $item)
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="blog-grid">
                                    <img src="{{ asset($item->post_image) }}" alt="blog">
                                    <div class="blog-team-box">
                                        <h6>{{ $item->created_at->format('M d Y') }}</h6>
                                    </div>
                                    <h4><a href="{{ url('blog/details/' . $item->post_slug) }}">{{ $item->post_titile }}</a>
                                    </h4>
                                    <p>{{ $item->short_descp }}</p>
                                    <a href="{{ url('blog/details/' . $item->post_slug) }}"
                                        class="button-simple-primary mt-20">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pagination mt-20">
                        {{ $blog->links('vendor.pagination.custom') }}
                    </div>
                </div>
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
@endsection
