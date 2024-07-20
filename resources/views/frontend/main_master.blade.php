<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Cloud Tech Hills</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="{{asset('frontend/assets/img/logos/logo-shortcut.png')}}" />	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

	<!-- Themify icons -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/themify-icons.css')}}">
	
	<!-- Font-Awesome -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/fontawesome-all.css')}}">  

	<!-- Icomoon -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/icomoon.css')}}">

	<!-- Plugins -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/plugins.css')}}">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">	

	<!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">

	<!-- Revolution Slider  -->
	<link rel="stylesheet" href="{{asset('frontend/assets/css/rev-settings.css')}}">

	<!-- Main Styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/styles.css')}}" id="main_styles">
</head>
<body>


<!-- Preloader Start-->
<div id="preloader">
	<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>
<!-- Preloader End -->

<!-- Top-Bar START -->
@include('frontend.body.header')
<!-- Navbar END -->

@yield('main')

<!--Footer START-->
@include('frontend.body.footer')
<!--Footer END-->


<!-- Scroll to top button Start -->
<a href="#" class="scroll-to-top"><i class="fas fa-chevron-up"></i></a>	
<!-- Scroll to top button End -->



<!-- Jquery -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>

<!-- Plugins JS-->
<script src="{{asset('frontend/assets/js/plugins.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('frontend/assets/js/Chart.bundle.js')}}"></script>
<script src="{{asset('frontend/assets/js/utils.js')}}"></script>

<!-- Navbar JS -->
<script src="{{asset('frontend/assets/js/navigation.js')}}"></script>
<script src="{{asset('frontend/assets/js/navigation.fixed.js')}}"></script>

<!-- Revolution Slider -->
<script src="{{asset('frontend/assets/js/rev-slider/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/rev-slider/jquery.themepunch.revolution.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.navigation.min.j')}}s"></script>
<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/rev-slider/revolution.extension.video.min.js')}}"></script>

<!-- Google Map -->
<script src="{{asset('frontend/assets/js/map.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>
</html>