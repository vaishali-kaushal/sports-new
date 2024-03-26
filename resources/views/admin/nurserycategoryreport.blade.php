@extends('admin.layouts.app')
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
                            @if(request()->is('*govt*'))
                            <h3 class="card-title">Total Applications (Govt)</h3>
                             @elseif(request()->is('*private*'))
                            <h3 class="card-title">Total Applications (Private)</h3>
                            @endif
                        </div>

                        <div class="card-body">
                            <table id="category-datatable" class="table table-bordered table-hover display">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>District</th>
                                        @if(request()->is('*govt*'))
                                        <th>Govt School</th>
                                        <th>Panchayat</th>
                                        @elseif(request()->is('*private*'))
                                        <th>Private School</th>
                                        <th>Private Institute</th>
                                        @endif
                                        <th>Total Count</th>
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
                                          {{ $application->district_name ?? ''}} 
                                        </td>
                                        @if(request()->is('*govt*'))
                                        <td>
                                          {{ $application->count_govt_school ?? ''}}
                                        </td>
                                        <td>
                                          {{ $application->count_panchayat ?? ''}}
                                        </td>
                                        @elseif(request()->is('*private*'))
                                        <td>
                                           {{ $application->count_pvt_school ?? ''}}
                                        </td>
                                        <td>
                                           {{ $application->count_pvt_institute ?? ''}}
                                        </td>
                                        @endif
                                       
                                        <td>
                                           {{ $application->total_count ?? '-'}}
                                        </td>
                                       
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>

                          <!--   <hr>
                                    <tr>
                                        <td></td>
                                    <td class="text-center"><b>Total</b></td>
                                    <td></td><td></td><td>{{ count($applications)}}</td></tr> -->
                            </table>
                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>


  <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->

    <!-- DataTables JavaScript -->
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->

<script>
$(document).ready(function() {

    $('#category-datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 50
    });

});
</script>
@endsection