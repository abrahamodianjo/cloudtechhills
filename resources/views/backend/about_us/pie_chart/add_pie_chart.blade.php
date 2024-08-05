@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
           
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('all.pie.chart')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Pie Chart</li>
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

                            <form id="myForm" action="{{ route('pie.chart.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="row mb-3">
                                      
                                        
                                        <div class="form-group col-sm-9 text-secondary">
                                            <span class="mb-0">Insert Percentage (From 1 - 100)</span>
                                            <input type="text" name="percentage" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                 
                                        <div class="form-group col-sm-9 text-secondary">
                                            <span class="mb-0">What is the name of the service you offer?</span>
                                            <input type="text" name="service" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                      
                                        <div class="form-group col-sm-9 text-secondary">
                                            <span class="mb-0">What is the approach of the service ? (eg. IT officer, cyber division, etc)</span>
                                            <input type="text" name="approach" class="form-control" />
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
@endsection
