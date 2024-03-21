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
                        
                            <h3 class="card-title">District Applications</h3>
                        
                        </div>

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover display">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>District (Total {{$totalDistricts }})</th>
                                        <th>Count (Total {{$totalRecords}})</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($districtApplications))
                                    @foreach($districtApplications as $key => $application)
                                    <tr>
                                        <td>
                                            {{$key+1}}
                                        </td>
                                       <td>
                                          {{ $application->district->name ?? ''}} 
                                       </td>
                                       <td>
                                           {{ $application->count ?? '-'}}
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


  <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->

    <!-- DataTables JavaScript -->
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->

@endsection