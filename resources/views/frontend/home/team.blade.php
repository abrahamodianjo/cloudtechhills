@php
    $team = App\Models\Team::latest()->get();
@endphp
<div class="section-block">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-12">
				<div class="section-heading text-left mt-15">
					<small class="uppercase">Gain a Success With Us!</small>
					<h4 class="semi-bold">Our Creative Experts</h4>
				</div>
				<div class="text-content mt-15">
					<p>Our creative team is a team of experience expert who are here to ensure you meet your goals as expect and on time</p>
				</div>
				
			</div>
			@foreach ($team as $item) 
			<div class="col-md-3 col-sm-6 col-12">
				<div class="team-box-2">
					<img src="{{ asset($item->image) }}" alt="">
					<div class="team-box-2-info">
						<h4>{{ $item->name }}</h4>
						<h6>{{ $item->position }}</h6>
						<ul class="team-box-2-icon">
							<li><a href="http://www.facebook.com/{{ $item->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="http://www.twitter.com/{{ $item->twitter }}"><i class="fab fa-twitter"></i></a></li>
							<li><a href="http://www.linkedin.com/{{ $item->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
						
						</ul>
					</div>
				</div>
			</div>	
			@endforeach
		</div>
	</div>
</div>