@extends('dso.layouts.app')
@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Nursery</h1> -->
                </div>
                <div class="col-sm-6 text-right">
                    <!-- <a href="{{url('admin/add/dso')}}" class="btn btn-primary">Add DSO</a> -->

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
                        @if(request()->is('*total_applications*'))
                            <h3 class="card-title">Total Applications</h3>
                        @elseif(request()->is('*pending_applications*'))
                            <h3 class="card-title">Pending Applications</h3>
                        @elseif(request()->is('*approved_applications*'))
                            <h3 class="card-title">Approved Applications</h3>
                        @elseif(request()->is('*rejected_applications*'))
                            <h3 class="card-title">Rejected Applications</h3>
                        @endif
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Application ID</th>
                                        <th>Received On</th>
                                        <th>Games</th>
                                        <th>Nursery Name</th>
                                        <th>District</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($applications))
                                @foreach($applications as $key => $application)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$application->nursery->application_number ?? ''}}
                                    </td> 
                                    <td>
                                        {{ date('d-M-Y', strtotime($application->created_at)) ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->game->name ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->name_of_nursery ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->district->name ?? ''}}
                                    </td>
                                    <td>
                                        @if(!empty($application->nursery->nurseryStatus))
                                        @if($application->nursery->nurseryStatus->approved_reject_by_dso == 0)
                                            Pending
                                        @elseif($application->nursery->nurseryStatus->approved_reject_by_dso == 1)
                                            Recommended
                                        @else
                                            Not Recommended
                                        @endif
                                        @endif
                                    </td>
                                    <td>  
                                        <a href="{{ route('view.userNursery',$application->nursery->secure_id ?? '')}}" class="btn btn-primary">View</a>
                                        @if(env('REG_LAST_DATE') < date('Y-m-d'))
                                            @if(request()->is('*pending_applications*'))
                                                @if($application->nursery->nurseryStatus->approved_reject_by_dso == 0)
                                                <a href="{{url('dso/nursery/report/').'/'.$application->nursery->secure_id}}"
                                                    class="btn btn-primary">Proceed</a>

                                                @endif
                                            @endif
                                        @endif
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



<script>
    $(document).ready(function() {
       


    });
</script>
@endsection