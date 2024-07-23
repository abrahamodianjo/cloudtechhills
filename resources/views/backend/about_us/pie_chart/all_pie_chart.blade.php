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
                    <li class="breadcrumb-item active" aria-current="page">Pie Chart list</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.pie.chart') }}" class="btn btn-primary ">Add PieChart</a>
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
                                <th>percentage</th>
                                <th>service</th>
                                <th>approach</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($piechartapproach as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->percentage }}</td>
                                    <td>{{ $item->service }}</td>
                                    <td>{{ $item->approach }}</td>
                                    <td>
                                        <a href="{{ route('edit.pie.chart.approach',$item->id) }}" class="font-22 text-warning "> <i class="fadeIn animated bx bx-edit-alt"></i></a>
                                        <a href="{{ route('delete.pie.chart',$item->id) }}" class="font-22 text-danger" id="delete"><i class="fadeIn animated bx bx-trash-alt"></i></a>

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
