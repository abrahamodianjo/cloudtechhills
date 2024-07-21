@php
    $clients = App\Models\Clients::latest()->get();
@endphp

<div class="section-block section-sm border-bottom">
    <div class="container">
        <div class="owl-carousel owl-theme clients clients-carousel">
            @foreach ($clients as $item)
                <div class="item">
                    <img src="{{ asset($item->image) }}" alt="partner-image">
                </div>
            @endforeach
        </div>
    </div>
</div>
