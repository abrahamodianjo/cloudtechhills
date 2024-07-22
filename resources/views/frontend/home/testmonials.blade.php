@php
    $testmonials = App\Models\Testmonials::latest()->get();
@endphp
<div class="section-block">
    <div class="container">
        <div class="section-heading text-center">
            <h3 class="semi-bold">Our Testmonials</h3>
            <div class="section-heading-line"></div>
            <p>Our clients' success stories speak volumes. Hear directly from those who have experienced the
                transformative impact of our tailored solutions, dedicated support, and innovative strategies</p>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme testmonials-carousel">
                @foreach ($testmonials as $item) 
                <div class="testmonial-box">
                    <div class="testmonial-box-icon">
                        <img src="{{ asset($item->image) }}" alt="img">
                    </div>
                    <div class="testmonial-box-content">
                        <h3>{{ $item->name }}</h3>
                        <strong>{{ $item->position }}</strong>
                        <p>{{ $item->description }}</p>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
</div>
