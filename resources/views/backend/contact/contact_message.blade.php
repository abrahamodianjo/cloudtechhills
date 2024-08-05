@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> Messages </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

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
                                <th>Email</th>
                                <th>Phone</th>

                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>

                                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                    <td><a href="{{ route('view.contact.message', $item->id) }}"
                                            class="font-22 text-primary "> <i
                                                class="fadeIn animated bx bx-message"></i></a>
                                    <a href="{{ route('delete.contact.message', $item->id) }}"
                                            class="font-22 text-danger" id="delete"><i
                                                class="fadeIn animated bx bx-trash-alt"></i></a></td>


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
