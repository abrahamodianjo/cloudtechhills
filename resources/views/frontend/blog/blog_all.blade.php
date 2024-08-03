@extends('frontend.main_master')
@section('main')
    @php
        $Aboutusbanner = App\Models\Aboutus::find(1);
    @endphp
    <!--Breadcrumb START-->
    <div class="breadcrumb-section jarallax pixels-bg" data-jarallax data-speed="0.6"
        style="	background-image: url('{{ asset($Aboutusbanner->image) }}');">
        <div class="container text-center">
            <h1>News List</h1>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('blog.list') }}">News</a></li>
            </ul>
        </div>
    </div>
    <!--Breadcrumb END-->

    <div class="section-block">
        <div class="container">
            <div class="row">
                <!-- Left Side START -->
                <div class="col-md-9 col-sm-12 col-12">

                    @foreach ($blog as $item)
                        <div class="blog-list">
                            <img src="{{ asset($item->post_image) }}" alt="img">
                            <h4><a href="{{ url('blog/details/' . $item->post_slug) }}">{{ $item->post_titile }}</a></h4>
                            <ul class="blog-list-info">
                                <li><i class="ti-user"></i><span>Admin</span></li>
                                <li><i class="ti-calendar"></i><span>{{ $item->created_at->format('M d Y') }}</span></li>
                                {{-- <li><i class="ti-pin-alt"></i><span>Business</span></li> --}}
                            </ul>
                            <p class="mt-25">{{ $item->short_descp }}
                            </p>
                            <div class="mt-5">
                                <a href="{{ url('blog/details/' . $item->post_slug) }}" class="button-simple mt-15">Continue
                                    Reading <i class="fa fa-arrow-right primary-color"></i></a>
                            </div>
                        </div>
                    @endforeach

                    <div class="pagination mt-20">
                        {{-- --}}
                        {{ $blog->links('vendor.pagination.custom') }}
                    </div>
                </div>
                <!-- Left Side END -->

                <!-- Right Side START -->
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="blog-post-right">
                        

                        <h4 class="blog-widget-title">Categories</h4>
                        <div class="blog-post-categories mt-20">
                            @foreach ($bcategory as $cat)
                                <ul>
                                    <li><a href="{{ url('blog/cat/list/' . $cat->id) }}">{{ $cat->category_name }}</a>
                                    </li>

                                </ul>
                            @endforeach
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
                                            <h3><a href="{{ url('blog/details/' . $item->post_slug) }}">{{ $post->post_titile }}</a></h3>
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
@endsection
