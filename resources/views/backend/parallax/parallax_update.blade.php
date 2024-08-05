@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('parallax.setting')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Parallax Setting </li>
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

                            <form action="{{ route('parallax.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $parallax->id }}">

                                <div class="card-body">
                                    <div class="row mb-3">
                                     
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Caption</span>
                                            <input type="text" name="caption" class="form-control"
                                                value="{{ $parallax->caption }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Title of parallax section</span>
                                            <textarea type="text" name="title" class="form-control"  id="input11"> {{ $parallax->title }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                     
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Photo for parallax section</span>
                                            <input type="file" name="image" class="form-control" />
                                            <br />

                                            <img src="{{ asset($parallax->image) }}" alt=""
                                                style="width: 270px; height:140px;">


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
