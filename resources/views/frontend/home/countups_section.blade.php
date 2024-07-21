@php
    $countups = App\Models\Countups::find(1);
@endphp


<div class="container-fluid pl-0 pr-0">
	<div class="row no-gutters">
		<div class="col-md-6 col-sm-12 col-12">
			<div class="full-background min-350" style="background-image: url('{{ asset($countups->image) }}');">
			</div>
		</div>
		<div class="col-md-6 col-sm-12 col-12">
			<div class="padding-10-perc">
				<div class="section-heading text-left">
					<small class="grey-color font-size-20 font-weight-normal">{{ ($countups->caption) }}</small>
					<h4 class="semi-bold font-size-35">{{ ($countups->title) }}</h4>
				</div>
				<div class="row mt-45">
					<div class="col-sm-5 col-12">
						<div class="countup-box-2">
							<h3 class="countup semi-bold">{{ ($countups->team_members) }}</h3><span class="semi-bold"> k</span>
							<h4>Team Members</h4>
							<p>{{ ($countups->team_members_note) }}</p>
						</div>
					</div>
					<div class="col-sm-5 col-12 offset-sm-1">
						<div class="countup-box-2">
							<h3 class="countup semi-bold">{{ ($countups->happy_clients) }}</h3><span class="semi-bold"> k</span>
							<h4>Happy Clients</h4>
							<p>{{ ($countups->happy_clients_note) }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>