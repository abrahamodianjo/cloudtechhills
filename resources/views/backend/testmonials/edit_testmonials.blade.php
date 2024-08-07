@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
           
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('all.testmonials')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit {{$testmonials->name}}'s Testmonial</li>
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

                            <form action="{{ route('testmonials.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $testmonials->id }}">

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Name of the client</span>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $testmonials->name }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Clients company name or position</span>
                                            <input type="text" name="position" class="form-control"
                                                value="{{ $testmonials->position }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                     
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Client's testimony</span>
                                            <textarea type="text" name="description" class="form-control"
                                               />{{ $testmonials->description }}</textarea>
                                        </div>
                                    </div>
                                  


                                    <div class="row mb-3">
                                    
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Photo of client</span>
                                            <input class="form-control" name="image" type="file" id="image">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ asset($testmonials->image) }}" alt="Admin"
                                                class="rounded-circle p-1 bg-primary" width="80">
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-sm-3"></div>
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
