@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
           
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('contact.message')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Message from {{$contact->name}}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="card">

                            <form action="#" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $contact->id }}">

                                <div class="card-body">
                                    <div class="row mb-3">
                                     
                                        <div class="col-sm-9 text-secondary">
                                            <span>Email</span>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ $contact->email }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                 
                                        <div class="col-sm-9 text-secondary">
                                            <span>Phone Number</span>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ $contact->phone }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                      
                                        <div class="col-sm-9 text-secondary">
                                            <span>Subject</span>
                                            <input type="text" name="description" class="form-control"
                                                value="{{ $contact->subject }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    
                                        <div class="col-sm-9 text-secondary">
                                            <span>Message</span>
                                            <textarea  type="text" name="description" class="form-control">{{ $contact->message }}</textarea>
                                     
                                        </div>
                                    </div>
                                 
                                </div>
                            </form>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
