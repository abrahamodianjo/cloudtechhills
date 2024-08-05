@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
       
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('edit.pie.chart')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Pie Chart note </li>
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

                            <form action="{{ route('pie.chart.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $piechart->id }}">

                                <div class="card-body">
                                 
                                    <div class="row mb-3">
                                 
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Caption</span>
                                            <input type="text" name="caption" class="form-control"
                                                value="{{ $piechart->caption }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                   
                                        <div class="col-sm-9 text-secondary">
                                            <span class="mb-0">Short description</span>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $piechart->title }}" />
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
