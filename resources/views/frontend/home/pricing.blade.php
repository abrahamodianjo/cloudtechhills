@php
    $plan = App\Models\plan::latest()->get();
@endphp
<div class="section-block grey-bg">
	<div class="background-shape bs-right"></div>
	<div class="container">
		<div class="section-heading text-center">
			<h3 class="semi-bold">Choose The Plan.</h3>
			<div class="section-heading-line line-thin"></div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt<br>ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
		</div>
		
		<div class="row mt-30">
			@foreach ($plan as $item) 
			<div class="col-md-4 col-sm-4 col-12">
				<div class="pricing-box clearfix">
					<div class="pricing-box-icon">
						<i class="icon-startup-5"></i>
					</div>
					<h4>{{ $item->name }}</h4>
					<h2><sup>$</sup>{{ $item->amount }} <span>/ Per Month</span></h2>
					<ul>
						<li>{{ $item->title_1 }} </li>
						<li> {{ $item->title_2 }} </li>
						<li> {{ $item->title_3 }} </li>
						<li> {{ $item->title_4 }}</li>
						<li> {{ $item->title_5 }} </li>
						<li> {{ $item->title_6  }} </li>
					</ul>
					
				</div>
			</div>
			@endforeach
		</div>
	
	</div>
</div>