@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

        </div>
        <!--end breadcrumb-->
        <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
       
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Plans</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.plan') }}" class="btn btn-primary ">Add Plan</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
       
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>amount</th>
                                <th>first title</th>
                                <th>second title</th>
                                <th>third title</th>
                                <th>forth title</th>
                                <th>fifth title</th>
                                <th>sixth title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plan as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->title_1 }}</td>
                                    <td>{{ $item->title_2 }}</td>
                                    <td>{{ $item->title_3 }}</td>
                                    <td>{{ $item->title_4 }}</td>
                                    <td>{{ $item->title_5 }}</td>
                                    <td>{{ $item->title_6 }}</td>
                                    <td>
                                        <a href="{{ route('edit.plan',$item->id) }}" class="font-22 text-warning "> <i class="fadeIn animated bx bx-edit-alt"></i></a>
                                        <a href="{{ route('delete.plan',$item->id) }}" class="font-22 text-danger" id="delete"><i class="fadeIn animated bx bx-trash-alt"></i></a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <hr />

    </div>
@endsection
