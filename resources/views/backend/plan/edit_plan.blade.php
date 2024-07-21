@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Plan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Plan</li>
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

                            <form action="{{ route('plan.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $plan->id }}">

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"> Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $plan->name }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Amount</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="amount" class="form-control"
                                                value="{{ $plan->amount }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">title_1</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title_1" class="form-control"
                                                value="{{ $plan->title_1 }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">title_2</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title_2" class="form-control"
                                                value="{{ $plan->title_2 }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">title_3</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title_3" class="form-control"
                                                value="{{ $plan->title_3 }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">title_4</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title_4" class="form-control"
                                                value="{{ $plan->title_4 }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">title_5</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title_5" class="form-control"
                                                value="{{ $plan->title_5 }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">title_6</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="title_6" class="form-control"
                                                value="{{ $plan->title_6}}" />
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
