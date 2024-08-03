@php
    $setting = App\Models\SiteSetting::find(1);
@endphp
<div id="top-bar" class="hidden-md-down">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-12">
                <ul class="top-bar-info">
                    <li><i class="fas fa-phone"></i> <a href="{{ asset($setting->phone) }}">{{ $setting->phone }}</li>
                    <li><i class="fas fa-map-marker-alt"></i> <a href="{{asset($setting->address) }}">{{ $setting->address }} </li>
                    <li><i class="fa fa-envelope"></i><a href="{{ asset($setting->email) }}"> {{ $setting->email }} </li>
                </ul>
            </div>
            <div class="col-md-3 col-12">
                <ul class="social-icons hidden-sm">
                    <li><a href="{{ asset($setting->twitter) }}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{ asset($setting->linkedin) }}"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Top-Bar END -->

<!-- Navbar START -->
<header>
	<nav id="navigation4" class="container navigation">
		<div class="nav-header">
			<a class="nav-brand" href="{{url('/')}}">
				<img src="{{ $setting->logo }}" class="main-logo" alt="logo" id="main_logo">
			</a>
			<div class="nav-toggle"></div>
		</div>
		<div class="nav-menus-wrapper">
			<ul class="nav-menu align-to-right">
				<li><a href="{{url('/')}}">Home</a>	
				</li>
				<li><a href="{{route('about.us')}}">About us</a>
				</li>
				<li><a href="{{route('services.page')}}">Services</a>
				</li>
				<li><a href="{{ route('blog.list') }}">News</a>
				</li>
				<li><a href="{{route('contact.us')}}">Contact us</a>	
				</li>
			</ul>
		</div>
	</nav>	
</header>	