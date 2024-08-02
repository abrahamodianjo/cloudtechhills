@extends('frontend.main_master')
@section('main')
    <!--Breadcrumb START-->
    @php
        $Aboutusbanner = App\Models\Aboutus::find(1);
        $piechart = App\Models\PieChart::find(1);
        $whoweare = App\Models\WhoWeAre::find(1);
        $piechartapproach = App\Models\PieChartApproach::latest()->get();
        $clients = App\Models\Clients::latest()->get();
        $team = App\Models\Team::latest()->get();
        $testmonials = App\Models\Testmonials::latest()->get();
    @endphp

    <div class="breadcrumb-section jarallax pixels-bg" data-jarallax data-speed="0.6"
        style="	background-image: url('{{ asset($Aboutusbanner->image) }}');">
        <div class="container text-center">
            <h1>{{ $Aboutusbanner->title }} </h1>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="{{ asset('about.us') }}">{{ $Aboutusbanner->title }}</a></li>
            </ul>
        </div>
    </div>
    <!--Breadcrumb END-->

    <!--Pie Charts Section START-->

    <div class="section-block">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12">
                    <div class="dots-bg-2 pr-30-md">
                        <div class="section-heading text-left">
                            <small class="primary-color">{{ $piechart->caption }}</small>
                            <h4 class="semi-bold">{{ $piechart->title }}</h4>
                            <div class="section-heading-line line-thin"></div>
                            <div class="mt-30">
                                <a href="{{ route('contact.us') }}" class="button-simple">Become a client <i
                                        class="fa fa-arrow-right primary-color"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-12 text-right">
                    <div class="row">
                        @foreach ($piechartapproach as $item)
                            <div class="col-md-4 col-sm-4 col-12">
                                <div class="pie-chart pie-chart-sm">
                                    <div class="chart-percent">
                                        <span class="chart" data-percent="{{ $item->percentage }}" data-width="5"
                                            data-size="125" data-color="#0570fb">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                    <h4>{{ $item->service }}</h4>
                                    <h5 class="italic libre-baskerville">{{ $item->approach }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pie Charts Section END-->

    <!--Info Section START-->
    <div class="section-block pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <img src="{{ asset($whoweare->image) }}" class="rounded-border shadow-primary" alt="">
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="pl-30-md mt-10">
                        <div class="section-heading">
                            <small class="uppercase">{{ $whoweare->caption }}</small>
                            <h4 class="semi-bold font-size-35">{{ $whoweare->title }}</h4>
                        </div>
                        <div class="text-content mt-15">
                            <p>{{ $whoweare->description }}</p>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="features-box-3 text-left">
                                    <div class="features-box-3-icon">
                                        <i class="{{ $whoweare->icon_1 }}"></i>
                                    </div>
                                    <h4>{{ $whoweare->icon_1_title }}</h4>
                                    <p>{{ $whoweare->icon_1_description }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="features-box-3 text-left">
                                    <div class="features-box-3-icon">
                                        <i class="{{ $whoweare->icon_2 }}"></i>
                                    </div>
                                    <h4>{{ $whoweare->icon_2_title }}</h4>
                                    <p>{{ $whoweare->icon_1_description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Info Section END-->

    <!-- Testmonials Section START -->
    <div class="section-block primary-bg background-shape-3">
        <div class="container">
            <div class="owl-carousel owl-theme" id="testmonials-parallax">
                @foreach( $testmonials as $item)
                <div class="testmonial-parallax center-holder">
                    <div class="testmonial-parallax-text">
                        <h6>“</h6>
                        <p>{{ $item->description }}</p>
                        <h4>{{ $item->name }}</h4>
                        <strong>{{ $item->position }}</strong>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testmonials Section END -->

    <!-- Clients START -->

    <div class="section-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="pr-45-md">
                        <div class="section-heading text-left">
                            <h3 class="semi-bold font-size-30">Company Clients</h3>
                            <div class="section-heading-line line-thin"></div>
                        </div>
                        <div class="text-content-big mt-25">
                            <p>Empowering our clients to achieve excellence with tailored solutions, dedicated support, and
                                innovative strategies. Your success is our mission, and we are committed to helping you
                                reach new heights</p>
                        </div>
                        <a href="#" class="button-simple mt-15">Become a client <i
                                class="fa fa-arrow-right primary-color"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="clients-grid">
                        @foreach ($clients as $item)
                            <img src="{{ asset($item->image) }}" alt="client-image">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Clients END -->

    <!--Team Section START-->
    <div class="section-block grey-bg">
        <div class="background-shape bs-right"></div>
        <div class="container">
            <div class="section-heading text-center">
                <small class="grey-color font-weight-normal">YOUR COMPETITIVE EDGE</small>
                <h3 class="semi-bold font-size-32 mt-0">Team Of Professionals</h3>
                <div class="section-heading-line line-thin"></div>
                <p>Our creative team is a team of experience expert who are here to ensure you meet your goals as expect and
                    on time</p>
            </div>
            <div class="row mt-60">
                @foreach ($team as $item)
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="team-box-3">
                            <img src="{{ asset($item->image) }}" alt="team">
                            <div class="team-box-3-info">
                                <h4>{{ $item->name }}</h4>
                                <span>{{ $item->position }}</span>
                                <ul>
                                    <a href="http://www.facebook.com/{{ $item->facebook }}"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="http://www.twitter.com/{{ $item->twitter }}"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="http://www.linkedin.com/{{ $item->linkedin }}"><i
                                                class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!--Team Section END-->

    <!-- Action Box START -->
    <div class="action-box action-box-lg jarallax primary-overlay-80 center-holder-xs" data-jarallax data-speed="0.6"
        style="background-image: url('{{ asset($Aboutusbanner->image) }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-12">
                    <h3 class="white-color bold">Explore our comprehensive range of services designed to meet your unique needs.</h3>
                    <p class="white-color">Discover how we can help you achieve your goals with our expert solutions and dedicated support.</p>
                </div>
                <div class="col-md-2 col-sm-2 col-12 text-right center-holder-xs mt-10">
                    <a href="#" class="button-md button-white-bordered">services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Action Box END -->
@endsection
