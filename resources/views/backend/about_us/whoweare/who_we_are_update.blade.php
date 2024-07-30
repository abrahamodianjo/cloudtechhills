@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Update Who we are Setting </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Who We Are Setting </li>
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

                            <form action="{{ route('who.we.are.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $whoweare->id }}">

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> caption </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="caption" class="form-control"
                                                value="{{ $whoweare->caption }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $whoweare->title }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">description</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="description" class="form-control"
                                                value="{{ $whoweare->description }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> icon_1</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="icon_1" class="form-control"
                                                value="{{ $whoweare->icon_1 }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> icon_1_title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="icon_1_title" class="form-control"
                                                value="{{ $whoweare->icon_1_title }}" />
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">icon_1_description</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="icon_1_description" class="form-control"
                                                value="{{ $whoweare->icon_1_description }}" />
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> icon_2</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="icon_2" class="form-control"
                                                value="{{ $whoweare->icon_2 }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> icon_2_title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="icon_2_title" class="form-control"
                                                value="{{ $whoweare->icon_2_title }}" />
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">icon_2_description</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="icon_2_description" class="form-control"
                                                value="{{ $whoweare->icon_2_description }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> Image </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="image" class="form-control" />
                                            <br />

                                            <img src="{{ asset($whoweare->image) }}" alt=""
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
