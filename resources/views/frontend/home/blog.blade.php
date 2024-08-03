@php
	$blog = App\Models\BlogPost::latest()->take(3)->get();
@endphp

<div class="section-block">
	<div class="container">
		<div class="section-heading text-center">
			<h3 class="semi-bold">Recent News</h3>
			<div class="section-heading-line line-thin dark-bg"></div>
			
		</div>
		
		<div class="row mt-40">
			@foreach ($blog as $item)
			<div class="col-md-4 col-sm-4 col-12">
				<div class="blog-grid">
					<img src="{{ asset($item->post_image) }}" alt="blog">
					<div class="blog-team-box">
						<h6>{{ $item->created_at->format('M d Y') }}</h6>
					</div>
					<h4><a href="{{ url('blog/details/' . $item->post_slug) }}">{{ $item->post_titile }}</a></h4>
					<p>{{ $item->short_descp }}</p>
					<a href="{{ url('blog/details/' . $item->post_slug) }}" class="button-simple-primary mt-20">Read More <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>