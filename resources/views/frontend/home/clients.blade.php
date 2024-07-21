@php
    $clients = App\Models\Clients::latest()->get();
@endphp
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
