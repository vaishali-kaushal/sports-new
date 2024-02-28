@extends('dso.layouts.app')
@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nursery</h1>
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
                            <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Nursery Name</th>
                                        <th>Email</th>
                                        <th>District</th>
                                        <th>Games</th>
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
                                        {{$application->nursery->name_of_nursery ?? ''}}
                                    </td> 
                                    <td>
                                        {{$application->nursery->email ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->district->name ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->game->name ?? ''}}
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
                                        <a href="#" class="btn btn-primary">View</a>
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