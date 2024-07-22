@php
$setting = App\Models\SiteSetting::find(1);
@endphp

<div class="section-block grey-bg jarallax" data-jarallax data-speed="0.9" style="background-image: url('{{ asset($setting->additional_image) }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
                <div class="section-heading">
                    <h3 class="semi-bold">Need a Quick Query ?</h3>
                    <p>Our team is here to help! Reach out to us for personalized assistance, expert advice, and prompt responses to all your questions.</p>
                </div>
                <!-- Contact icons Start -->
                <div>
                    <div class="contact-icon-box">
                        <i class="icon-phone-book"></i>
                        <h4>Direct line numbers</h4>
                        <h5>{{ ($setting->phone) }}</h5>
                    </div>

                    <div class="contact-icon-box">
                        <i class="icon-opened-email-outlined-interface-symbol"></i>
                        <h4>Our Email</h4>
                        <h5>{{ ($setting->email) }}</h5>
                    </div>

                    <div class="contact-icon-box">
                        <i class="icon-location"></i>
                        <h4>Our Locations</h4>
                        <h5>{{ ($setting->address) }}</h5>
                    </div>
                </div>
                <!-- Contact icons End -->
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <div class="pl-45-md">
                    <div class="callback-block">
                        <h4 class="bold text-center">Make a request now.</h4>
                        <div class="section-heading-line line-thin"></div>
                        <div class="text-content-big text-center mt-20">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                        </div>
                        <form  method="POST" action="{{ route('store.contact') }}"class="primary-form mt-30">
                            @csrf
                    
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-12">
                                    <input type="text"  id="name" name="name" placeholder="Name*">
                                </div>
                                <div class="col-md-6 col-sm-6 col-12">
                                    <input type="text"  id="email" name="email" placeholder="Email*">
                                </div>
                                <div class="col-md-6 col-sm-6 col-12">
                                    <input type="text" id="phone_number" name="phone" placeholder="Phone Number*">
                                </div>
                                <div class="col-md-6 col-sm-6 col-12">
                                    <input type="text" id="msg_subject" name="subject" placeholder="subject*">
                                </div>
                             
                                <div class="col-12">
                                    <textarea placeholder="Message*" id="message" name="message"></textarea>
                                </div>
                            </div>
                            <div class="text-center mt-15">
                                <button type="submit" class="button-md button-primary text-uppercase ml-0">Request a call back</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>