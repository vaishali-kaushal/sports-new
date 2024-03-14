@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.css">

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
                       
                            <h3 class="card-title">Total Applications</h3>
                       
                        </div>

                        <div class="card-body">
                            <table id="excel_datatable" class="table table-bordered table-hover display">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Application ID</th>
                                        <th>Mobile</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Reg.No.</th>
                                        <th>Pin</th>
                                        <th>Head/Principal</th>
                                        <th>Received On</th>
                                        <th>Games</th>
                                        <th>Nursery Name</th>
                                        <th>District</th>
                                        <th>Status</th>
                                        <th>Game Discipline</th>
                                        <th>Boys</th>
                                        <th>Girls</th>
                                        <th>Playground</th>
                                        <th>Equipments</th>
                                        <th>Sports Kit</th>
                                        <th>Fee Concession</th>
                                        <th>Percentage</th>
                                        <th>Coach Available</th>
                                        <th>Coach Name</th>
                                        <th>Coach Qualification</th>
                                        <th>Running Nursery</th>
                                        <th>Previous Game</th>
                                        <th>Previous Game Discipline</th>
                                        <th>Achievement</th>
                                        <th>Allotment Year</th>

                                        <!-- <th>Action</th> -->
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
                                        {{$application->nursery->mobile_number ?? ''}}
                                    </td>
                                    <td>
                                        {{ucfirst($application->nursery->cat_of_nursery) ?? ''}}
                                    </td>
                                   @if($application->nursery->type_of_nursery == 'pvt_school')
                                    <td>
                                        Private School
                                    </td>
                                    @elseif($application->nursery->type_of_nursery == 'pvt_institute')
                                    <td>
                                        Private Institute
                                    </td>
                                    @elseif($application->nursery->type_of_nursery == 'govt_school')
                                    <td>
                                        Govt School
                                    </td>
                                    @else
                                    <td>
                                        {{ucfirst($application->nursery->type_of_nursery)}}
                                    </td>
                                    @endif
                                    <td>
                                        {{$application->nursery->reg_no_running_nursery ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->pin_code ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->head_pricipal ?? ''}}
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
                                        @elseif ($application->nursery->nurseryStatus->approved_reject_by_dso == 1)
                                            Recommended
                                        @else
                                            Not Recommended
                                        @endif
                                        @endif
                                    </td>
                                    <td>
                                        {{$application->nursery->game_disp ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->boys ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->girls ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->playground_hall_court_available ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->equipment_related_to_selected_games_available ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->whether_nursery_will_provide_sports_kits_to_selected_players ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->whether_nursery_will_provide_fee_concession_to_selected_players ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->percentage_fee ?? '-'}}
                                    </td>
                                    <td>
                                        {{$application->nursery->whether_qualified_coach_is_available_for_the_concerned_game ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->coach_name ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->coachQualification->name ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->already_running_nursery ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->previousGame->name ?? ''}}
                                    </td>
                                    <td>
                                        {{$application->nursery->game_descipline_previous ?? ''}}
                                    </td>
                                     <td>
                                        {{$application->nursery->any_specific_achievements_of_the_institute_during_last ?? ''}}
                                    </td> 
                                    <td>
                                        {{$application->nursery->year_allotment ?? ''}}
                                    </td>
                                   <!--  <td>  
                                        <a href="{{ route('view.userNursery',$application->nursery->secure_id)}}" class="btn btn-primary">View</a>
                                    </td> -->
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {

     $('#excel_datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'print'
        ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "scrollX": true,
        "scrollY": "400px"
    });

});
</script>
@endsection

