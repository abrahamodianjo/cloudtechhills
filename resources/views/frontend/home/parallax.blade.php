@php
$parallax = App\Models\Parallax::find(1);
@endphp

<div class="section-block-parallax jarallax black-overlay-70" data-jarallax data-speed="0.6" style="background-image: url('{{ asset($parallax->image) }}');">
    <div class="container">
		<div class="large-heading text-center">
			<small class="semi-bold white-color">{{ ($parallax->caption) }}</small>
			<h4 class="semi-bold white-color">{{ ($parallax->title) }}</h4>
			<div class="section-heading-line"></div>
		</div>
		<div class="mt-25 text-center">
			<a href="#" class="button-md button-white-bordered mt-10">Learn More</a>
		</div>
    </div>
</div>