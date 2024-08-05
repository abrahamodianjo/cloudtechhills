@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
           
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Services Banner</li>
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

                            <form action="{{ route('services.banner.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $servicesbanner->id }}">

                                <div class="card-body">
                                    <div class="row mb-3">
                             
                                        <div class="col-sm-9 text-secondary">
                                            <span>Write short caption</span>
                                            <input type="text" name="caption" class="form-control"
                                                value="{{ $servicesbanner->caption }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    
                                        <div class="col-sm-9 text-secondary">
                                            <span>Write Description</span>
                                            <input type="text" name="description" class="form-control"
                                                value="{{ $servicesbanner->description }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                   
                                        <div class="col-sm-9 text-secondary">
                                            <span>insert first photo</span>
                                            <input class="form-control" name="first_image" type="file" id="image">
                                            
                                        </div>
                                        
                                    </div>


                                    <div class="row mb-3">
                                      
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ asset($servicesbanner->first_image) }}" alt="Admin"
                                                class=" p-1 bg-primary" width="80">
                                        </div>
                                    </div>
                                 
                                 
                                    <div class="row mb-3">
                                       
                                        <div class="col-sm-9 text-secondary">
                                            <span>Insert second image</span>
                                            <input class="form-control" name="second_image" type="file" id="image">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                    
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ asset($servicesbanner->second_image) }}" alt="Admin"
                                                class=" p-1 bg-primary" width="80">
                                        </div>
                                    </div>

                                   <div class="row">
                                       
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
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
