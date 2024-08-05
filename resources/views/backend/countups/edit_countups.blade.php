@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('edit.countups') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Count up</li>
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

                            <form action="{{ route('countups.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $countups->id }}">

                                <div class="card-body">
                                    <div class="row mb-3">

                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Caption</span>
                                            <input type="text" name="caption" class="form-control"
                                                value="{{ $countups->caption }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Title on count up section</span>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $countups->title }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Numbers of team members</span>
                                            <input type="text" name="team_members" class="form-control"
                                                value="{{ $countups->team_members }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Note on team members</span>
                                            <input type="text" name="team_members_note" class="form-control"
                                                value="{{ $countups->team_members_note }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Numbers of happy clients you've worked with </span>
                                            <input type="text" name="happy_client" class="form-control"
                                                value="{{ $countups->happy_clients }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                   
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Description of happy clients you've worked with </span>
                                            <input type="text" name="happy_clients_note" class="form-control"
                                                value="{{ $countups->happy_clients_note }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                   
                                        <div class="col-sm-9 text-secondary"> <span class="mb-0">Countups section photo (size: 755 x 530 )</span>

                                            <input class="form-control" name="image" type="file" id="image">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                    
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ asset($countups->image) }}" alt="Admin"
                                                class=" p-1 bg-primary" width="80" height="80">
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
