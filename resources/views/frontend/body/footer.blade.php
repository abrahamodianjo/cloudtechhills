@php
    $setting = App\Models\SiteSetting::find(1);
    $blog = App\Models\BlogPost::latest()->take(3)->get();
    $whoweare = App\Models\WhoWeAre::find(1);

@endphp
<footer>
    <div class="footer-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="{{ url('/') }}"><img id="footer_logo" src="{{ $setting->logo }}" alt="logo"></a>
                    <p class="mt-20">{{$whoweare->title}}</p>
                    <ul class="social-links-footer">

                        <li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>

                        <li><a href="{{ $setting->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <h2>Extra Links</h2>
                    <div class="row mt-25">
                        <div class="col-md-6 col-sm-6">
                            <ul class="footer-nav">
                                <li><a href="{{route('about.us')}}">About Us</a></li>
                                <li><a href="{{route('services.page')}}">Services</a></li>
                                <li><a href="{{route('blog.list')}}">news</a></li>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{route('contact.us')}}">Contact us</a></li>
                                
                            </ul>
                        </div>
                     
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <h2>Recent news</h2>
                    <ul class="footer-news mt-25">
                        @foreach ($blog as $item)
                            <li>

                                <a href="{{ url('blog/details/' . $item->post_slug) }}">{{ $item->post_titile }}</a>
                                <strong><i class="fa fa-calendar"></i> {{ $item->created_at->format('M d Y') }}</strong>

                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <h2>Subscribe</h2>
                    <form id="subscribe-form" class="footer-subscribe-form mt-25" method="POST" action="{{ route('subscribe') }}">
                        @csrf
                        <div class="d-table full-width">
                            <div class="d-table-cell">
                                <input type="email" name="email" placeholder="Your Email address" required>
                            </div>
                            <div class="d-table-cell">
                                <button type="submit"><i class="fas fa-envelope"></i></button>
                            </div>
                        </div>
                    </form>
                    <p class="mt-10">Get latest updates and offers.</p>
                </div>
            </div>
            <div class="footer-1-bar">
                <p>Cloud Tech Hills © 2024. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script>
    document.getElementById('subscribe-form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        var email = document.querySelector('input[name="email"]').value;
        
        fetch('{{ route('subscribe') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    </script>
    