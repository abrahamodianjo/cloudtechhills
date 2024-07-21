@extends('frontend.main_master')
@section('main')

<!-- Start revolution slider -->
@include('frontend.home.revolution_slider')
<!-- End revolution slider -->

<!--Features Section START-->
@include('frontend.home.features_section')
<!--Features Section END-->

<!--Countups Section START-->
@include('frontend.home.countups_section')
<!--Countups Section END-->

<!-- Services Section START -->
@include('frontend.home.services_section')
<!-- Services Section END -->

<!-- Clients START -->
@include('frontend.home.clients')
<!-- Clients END -->

<!--Team Section START-->
@include('frontend.home.team')
<!--Team Section END-->

<!-- Pricing START-->
@include('frontend.home.pricing')
<!-- Pricing END -->
 
<!--Info Section START-->
@include('frontend.home.info_section')
<!--Info Section END-->

<!--CountUps Section START-->
@include('frontend.home.countups')
<!--CountUps Section END-->

<!-- Parallax Section START -->
@include('frontend.home.parallax')
<!-- Parallax Section END -->

<!-- Clients Carousel START -->
@include('frontend.home.clients_carousel')
<!-- Clients Carousel END -->

<!--Testmonials START-->
@include('frontend.home.testmonials')
<!--Testmonials END-->

<!--Callback Section START-->
@include('frontend.home.callback')
<!--Callback Section END-->

<!--Blog Posts START-->
@include('frontend.home.blog')
<!--Blog Posts END-->
  
<!-- Action Box START -->
@include('frontend.home.action_box')
<!-- Action Box END -->
@endsection