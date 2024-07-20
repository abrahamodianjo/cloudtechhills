@extends('frontend.main_master')
@section('main')
    <!--Contact Boxes Section START-->
    @php
        $setting = App\Models\SiteSetting::find(1);
    @endphp
    <div class="section-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="contact-box-info-4">
                        <i class="icon-phone-book"></i>
                        <h4>Telephone</h4>
                        <h5>Phone: {{ ($setting->phone) }}</h5>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-12">
                    <div class="contact-box-info-4 contact-box-info-4-center">
                        <i class="icon-mail-envelope-opened-outlined-interface-symbol"></i>
                        <h4>E-mail</h4>

                        <h5>{{ ($setting->email) }}</h5>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-12">
                    <div class="contact-box-info-4">
                        <i class="icon-pin"></i>
                        <h4>Our Location</h4>
                        <h5>{{ ($setting->address) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Contact Boxes Section END-->

    <!--Contact Form Section START-->
    <div class="section-block grey-bg">
        <div class="container">
            <div class="section-heading text-center">
                <h3 class="semi-bold font-size-30">We Are Glad We Can Help You</h3>
                <div class="section-heading-line line-thin"></div>
                <p>if you have any questions you would like to ask, or find out how to become a partner please fill free to
                    <br>send us a message and we will get back to you shortly.
                </p>
                <br>
            </div>

            <form class="form-area" method="POST" action="{{ route('store.contact') }}" class="contact-form text-right">
                @csrf

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <input name="name" id="name" placeholder="Enter your name" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control"
                            required="" type="text">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <input name="email" id="email" placeholder="Enter email address"
                            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control"
                            required="" type="email">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <input name="phone" id="phone_number" placeholder="Enter your phone number"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your phone number'"
                            class="common-input mb-20 form-control" required="" type="text">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <input name="subject" id="msg_subject" placeholder="Enter your subject"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'"
                            class="common-input mb-20 form-control" required="" type="text">
                    </div>
                    <div class="col-md-12 form-group">
                        <textarea class="common-textarea form-control" name="message" id="message" placeholder="Messege"
                            onfocus="this.placeholder = "" onblur="this.placeholder = 'Messege'" required=""></textarea>
                    </div>
                    <div class="col-md-12">
                        <div id="alert-msg" style="text-align: left;"></div>
                        <button type="submit" class="submit-btn button-md button-primary full-width"
                            style="float: right;">Send Message</button>
                    </div>
                </div>
            </form>

            <!-- Form End -->
        </div>
    </div>
    <!--Contact Form Section END-->

    {{-- <script>
        $(document).ready(function() {
            var form = $('#myForm'); // contact form
            var submit = $('#submit-btn'); // submit button  
            var alert = $('#alert-msg'); // alert div for show alert message

            // form submit event
            form.on('submit', function(e) {
                e.preventDefault(); // prevent default form submit

                $.ajax({
                    url: 'mail.php', // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: form.serialize(), // serialize form data
                    beforeSend: function() {
                        alert.fadeOut();
                        submit.html('Sending....'); // change submit button text
                    },
                    success: function(data) {
                        alert.html(data).fadeIn(); // fade in response data
                        form.trigger('reset'); // reset form
                        submit.attr("style",
                        "display: none !important");; // reset submit button text
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
            });
        });
    </script> --}}
@endsection
