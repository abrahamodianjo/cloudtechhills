@extends('frontend.main_master')
@section('main')
    @php
        $servicesbanner = App\Models\ServiceBanner::find(1);
        $services = App\Models\Service::latest()->get();
    @endphp

    <!--Breadcrumb START-->
    <div class="breadcrumb-section jarallax pixels-bg black-overlay-70" data-jarallax data-speed="0.6"
        style="background-image: url('{{ $servicesbanner->first_image }}');">
        <div class="container text-center">
            <h1>Our Services</h1>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('services.page') }}">services</a></li>
            </ul>

        </div>
    </div>
    <!--Breadcrumb END-->

    <!--Services Section START-->
    <div class="section-block">
        <div class="container">
            @foreach ($services as $item)
                <div class="row reverse-xs mt-70" id="scrollDown">
                    <div class="col-md-5 col-sm-5 col-12">
                        <div class="pr-30-md">
                            <div class="section-heading mt-15">
                                <h4 class="semi-bold mt-30">{{ $item->title }}</h4>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-12">
                        <img src="{{ asset($item->image) }}" class="rounded-border" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--Services Section END-->

    <!-- Parallax Section START -->
    <div class="section-block-parallax jarallax black-overlay-70" data-jarallax data-speed="0.6" data-jarallax
        data-speed="0.6" style="background-image: url('{{ $servicesbanner->second_image }}');" id="scrollDown2">
        <div class="container">
            <div class="large-heading text-center">
                <small class="semi-bold white-color">{{ $servicesbanner->caption }}</small>
                <h4 class="semi-bold white-color"> {{ $servicesbanner->decription }}</h4>
                <div class="section-heading-line"></div>
            </div>

        </div>
    </div>
    <!-- Parallax Section END -->
@endsection
