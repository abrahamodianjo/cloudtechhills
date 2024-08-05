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
                        <li class="breadcrumb-item active" aria-current="page">Add Plan</li>
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

                            <form id="myForm"  action="{{ route('plan.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="row mb-3">
                                  
                                        <div class="form-group col-sm-9 text-secondary">
                                            <span class="mb-0">1. Name of plan offer</span>
                                            <input type="text" name="name" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    <div class="form-group col-sm-9 text-secondary">
                                            <span class="mb-0">2. Amount of money monthly</span>
                                            <input type="text" name="amount" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    <div class="form-group col-sm-9 text-secondary">
                                            <span class="mb-0">3. What plan do you Offer as a service <br> (you can add up to six monthly services)</span>
                                            <input type="text" name="title_1" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                       
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="title_2" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                      
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="title_3" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                     
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="title_4" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                   
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="title_5" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                     
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="title_6" class="form-control" />
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
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    }, 
                    postion: {
                        required : true,
                    }, 
                    facebook: {
                        required : true,
                    }, 
                    image: {
                        required : true,
                    },
                    
                },
                messages :{
                    name: {
                        required : 'Please Enter Team Name',
                    }, 
                    postion: {
                        required : 'Please Enter Team Postion',
                    }, 
                    facebook: {
                        required : 'Please Enter Facebook Url',
                    },
                    image: {
                        required : 'Please Select Image',
                    }, 
                     
    
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
        
    </script>
@endsection
