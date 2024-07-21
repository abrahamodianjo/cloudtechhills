@php
    $features = App\Models\Features::latest()->get();
@endphp

<div class="section-block grey-bg background-shape-3">
	<div class="container">
		<div class="section-heading text-center">
			<small class="grey-color font-size-20 font-weight-normal">A marketing company focused on results</small>
			<h3 class="semi-bold"><span class="primary-color">Business</span> communication skills</h3>
			<div class="section-heading-line line-thin"></div>
		</div>
		<div class="row mt-30">
			@foreach ($features as $item)
			<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="features-box">
					<div class="features-box-icon">
						<i class="{{ $item->icon }}"></i>
					</div>
					<div class="features-box-content">
						<h3>{{ $item->title }}</h3>
						<p>{{ $item->sub_title }}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="text-center mt-30">
			<a href="#" class="button-primary-bordered button-md text-uppercase">Become a client</a>
		</div>
	</div>
</div>