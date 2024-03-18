@extends('dso.layouts.app')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Pending Applications</h1> -->
                </div>
                <div class="col-sm-6 text-right">
                    <!-- <a href="{{ route('dso.nursery.register')}}" class="btn btn-primary">Add Nursery</a> -->

                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol> -->
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Applications</h3>
                            <div class="text-right">
                                <a href="{{ route('dso.nursery.register')}}" class="btn btn-primary">Add Nursery</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Application ID</th>
                                        <th>Games</th>
                                        <th>Nursery Venue</th>
                                        <!-- <th>District</th> -->
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($nursery))
                                @foreach($nursery as $key => $value)
                                <tr>
                                    <td>
                                        {{ $key+1 }}
                                    </td>
                                    <td>
                                        {{ $value->application_number ?? '' }}
                                    </td>
                                    <td>
                                        {{ $value->game->name ?? ''}}
                                    </td>
                                    <td>
                                        {{ $value->head_pricipal ?? ''}}
                                    </td>
                                    <td>
                                        {{ date('d-M-Y', strtotime($value->created_at)) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('view.userNursery',$value->secure_id ?? '')}}" class="btn btn-primary">View</a>
                                        <a href="{{ route('dso.nursery.register',$value->secure_id ?? '')}}" class="btn btn-primary">Edit</a>
                                       <!--  <a href="{{ route('dso.nursery.delete',$value->secure_id ?? '')}}" class="btn btn-danger">Delete</a> -->
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                </tbody>

                            </table>
                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>


@endsection