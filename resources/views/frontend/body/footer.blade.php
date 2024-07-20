@php
    $setting = App\Models\SiteSetting::find(1);
@endphp
<footer>
    <div class="footer-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="{{url('/')}}"><img id="footer_logo" src="{{ $setting->logo }}" alt="logo"></a>
                    <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <ul class="social-links-footer">
                        
                        <li><a href="{{ $setting->logo }}"><i class="fab fa-twitter"></i></a></li>
                       
                        <li><a href="{{ $setting->logo }}"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <h2>Extra Links</h2>
                    <div class="row mt-25">
                        <div class="col-md-6 col-sm-6">
                            <ul class="footer-nav">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Our approach</a></li>
                                <li><a href="#">Case Studies</a></li>
                                <li><a href="#">Our team</a></li>
                                <li><a href="#">Our approach</a></li>
                                <li><a href="#">Accounting</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="footer-nav">
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Consulting</a></li>
                                <li><a href="#">Development</a></li>
                                <li><a href="#">Case Studies</a></li>
                                <li><a href="#">Latest News</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <h2>Recent news</h2>
                    <ul class="footer-news mt-25">
                        <li>
                            <a href="#">Apartamento at ten: a decade of celebrating the everyday.</a>
                            <strong><i class="fa fa-calendar"></i> 11 September 2018</strong>
                        </li>
                        <li>
                            <a href="#">Within the construction industry as their overdraft</a>
                            <strong><i class="fa fa-calendar"></i> 11 September 2018</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <h2>Subscribe</h2>
                    <form class="footer-subscribe-form mt-25">
                        <div class="d-table full-width">
                            <div class="d-table-cell">
                                <input type="text" placeholder="Your Email adress">
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
                <p>SpecThemes © 2019. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>