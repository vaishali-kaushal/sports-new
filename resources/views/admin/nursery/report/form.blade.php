@extends($layout)

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nursery Process</h1>
                </div>
                <div class="col-sm-6 text-right">

                           
                                <a class="btn btn-primary"
                                    href="javascript:void(0)"
                                    onClick="downloadPdf()"
                                    role="button">
                                    Download Complete Application
                                </a>
                           
                           
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-5">
                       <form class="regis-form" method="post">

                            <div class="row mt-3">
                                <div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Application Number</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['application_number']) }}</div>
                                    </div>
                                </div><div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Category of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['cat_of_nursery']) }}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Games</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{$nursery['game']['name']}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">District</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['district']['name'] }}</div>
                                    </div>
                                </div> 

                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Type of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($nursery['cat_of_nursery'] == 'private')
                                            @if($nursery['type_of_nursery'] == 'pvt_institute')
                                                <div>Private Institute</div>
                                            @elseif($nursery['type_of_nursery'] == 'pvt_school')
                                                <div>Private School</div>
                                            @endif
                                        @else
                                        <div> {{ ucfirst($nursery['type_of_nursery'])}}</div>
                                        @endif
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Name of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['name_of_nursery'] ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Address</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['address'] ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Registration No. </label>
                                    </div>
                                    <div class="col-sm-6">
                                       <div>{{ $nursery['reg_no_running_nursery'] ?? ''}}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Name of Head/Principal</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['head_pricipal'] ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Email</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['email'] ?? ''}}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Mobile Number </label>
                                    </div>
                                    <div class="col-sm-6">
                                       <div>{{ $nursery['mobile_number'] ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Game Discipline</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['game_disp'] ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Playground available</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['playground_hall_court_available']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Equipment available</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['equipment_related_to_selected_games_available']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Fee Concession</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['whether_nursery_will_provide_fee_concession_to_selected_players']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Number of Students</label>
                                    </div>
                                     @if($nursery['game_disp'] == 'boys')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['boys'] ?? '0' }} Boys</div>
                                    </div>
                                    @endif
                                    @if($nursery['game_disp'] == 'girls')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['girls'] ?? '' }} Girls</div>
                                    </div>
                                    @endif
                                    @if($nursery['game_disp'] == 'mix')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery['girls'] ?? '' }} Girls and {{ $nursery['girls'] ?? '' }} Boys</div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Provide Sports Kit</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['whether_nursery_will_provide_sports_kits_to_selected_players']) ?? ''}}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Coach Available</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['whether_qualified_coach_is_available_for_the_concerned_game']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Achievement</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['any_specific_achievements_of_the_institute_during_last']) ?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                           
                        </form>
                     


                    </div>


                </div>

            </div>

        </div>

    </section>
    <?php
    if ($nursery['nursery_status']['approved_by_admin_or_reject_by_admin'] == 0 && !empty($nurseryRemarks)) {

        ?>


        <section class="content">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-12">
                        <h4>DSO Feasibility Report</h4>
                        <div class="card p-5">
                           <div class="row">
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Site visit done ?</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nurseryRemarks['site_visit']) ?? ''}}</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Nursery Recommendations</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nurseryRemarks['recommend_status']) ?? ''}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4 mt-3">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Remarks</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nurseryRemarks['remarks'] ?? '' }}</div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 mt-3">
                                    <label class="form-label">Nursery Photographs</label>
                                    <div class="row">

                                    @if (!empty($nurseryRemarks['files']))

                                        @php
                                            $reportPhotographs = explode(',', $nurseryRemarks['files']);
                                        @endphp
                                       
                                        @foreach($reportPhotographs as $photo)
                                        <div class="col-sm-4 pb-2">
                                            
                                            <a href="{{ asset('storage/'.$nursery['application_number'].'/'.$photo)}}" target="_blank"><img src="{{ asset('storage/'.$nursery['application_number'].'/'.$photo)}}" class="img-thumbnail" width="20%"></a>

                                        </div>

                                        @endforeach
                                    @endif


                                    </div>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <label class="form-label">Inspection Report</label>
                                    <div class="row">
                                        @if (!empty($nurseryRemarks['inspection_report'])) 
                                            @php
                                                $inspectionReport = explode(',', $nurseryRemarks['inspection_report']);
                                            @endphp
                                            @foreach ($inspectionReport as $photo)

                                                <div class="col-sm-4 pb-2">
                                                    <a href="{{ asset('storage/'.$nursery['application_number'].'/'.$photo)}}" target="_blank"><img src="{{ asset('storage/'.$nursery['application_number'].'/'.$photo)}}" class="img-thumbnail" width="20%"></a>

                                                </div>

                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>

        </section>
        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Present Status of Pending/Approved Nurseries (District-wise)</b></h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Total (in {{strtoupper($nurseryStatus['district'])}})</th>
                                        <th>Approved</th>
                                        <th>Pending </th>
                                        <th>Rejected </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                       <td>{{$nurseryStatus['total'] ?? ''}}</td>
                                       <td>{{$nurseryStatus['approved'] ?? ''}}</td>
                                       <td>{{$nurseryStatus['pending'] ?? ''}}</td>
                                       <td>{{$nurseryStatus['rejected'] ?? ''}}</td>
                                   </tr>
                                </tbody>

                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Details of Allotted Nurseries (Game-wise)</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Total (in {{strtoupper($nursery['game']['name']) ?? ''}})</th>
                                            <th>Approved</th>
                                            <th>Pending</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ count($games['total']) ?? '' }}</td>
                                            <td>{{ $games['totalApprovedCount']}}</td>
                                            <td>{{ $games['totalPendingCount']}}</td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4>Admin / HQ Report</h4>
                    <div class="card p-5">
                        <form class="admin-remarks-form" action="{{ route('admin.saveNurseryReport',$nursery['secure_id'])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <input type="hidden" id="statuss" name="status" value="0">
                                @if($nursery['nursery_status']['approved_reject_by_dso']== 1)
                                <div class="col-sm-4">
                                    <label class="form-label">Nursery Status</label>
                                    <select class="form-control" name="status" id="nursery_status">
                                        <option value="">-----Select-----</option>
                                        <option value="1">Approve</option>
                                        <option value="2">Reject</option>
                                        <option value="3">Raise Objection</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 pb-2">
                                    <label class="form-label">Upload Signed Document</label>
                                    <input type="file" class="form-control" name="admin_nursery_report[]" id="admin_nursery_report">


                                </div>
                                @elseif($nursery['nursery_status']['approved_reject_by_dso']== 2)
                                 <div class="col-sm-4">
                                    <label class="form-label">Nursery Status</label>
                                    <select class="form-control" name="status" id="nursery_status">
                                        <option value="">-----Select-----</option>
                                        <option value="2">Reject</option>
                                    </select>
                                </div>
                                @endif
                                <div class="col-sm-4 pb-2">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" name="remarks" id="remarks"></textarea>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <a href="{{ route('admin.pendingList')}}" class="btn btn-primary">Back</a>
                                    <span class="btn btn-success" id="submit_btn">Submit</span>
                                   <!--  <span class="btn btn-primary" id="approve_btn">Approve</span>
                                    <span class="btn btn-danger" id="reject_btn">Reject</span>

                                    <span class="btn btn-danger" id="objection_btn">objection</span> -->

                                </div>

                        </form>

                    </div>


                </div>

            </div>

        </div>

    </section>
    <?php } ?>

</div>

<script>
    $(document).ready(function() {
        // $('#approve_btn').click(function() {
        //     // let id = $(this).data("id");
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         // text: 'Some text.',
        //         type: 'success',
        //         showCancelButton: true,
        //         // confirmButtonColor: '#DD6B55',
        //         confirmButtonText: 'Yes!',
        //         cancelButtonText: 'No.'
        //     }).then((isConfirm) => {
        //         if (isConfirm.isConfirmed) {
        //             $('#statuss').val('1');
        //             $('.admin-remarks-form').submit();
        //         }
        //     });

        // });
        // $('#reject_btn').click(function() {
        //     // let id = $(this).data("id");
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         // text: 'Some text.',
        //         type: 'success',
        //         showCancelButton: true,
        //         // confirmButtonColor: '#DD6B55',
        //         confirmButtonText: 'Yes!',
        //         cancelButtonText: 'No.'
        //     }).then((isConfirm) => {
        //         if (isConfirm.isConfirmed) {
        //             $('#statuss').val('2');
        //             $('.admin-remarks-form').submit();
        //         }
        //     });

        // });
        // $('#objection_btn').click(function() {
        //     // let id = $(this).data("id");
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         // text: 'Some text.',
        //         type: 'success',
        //         showCancelButton: true,
        //         // confirmButtonColor: '#DD6B55',
        //         confirmButtonText: 'Yes!',
        //         cancelButtonText: 'No.'
        //     }).then((isConfirm) => {
        //         if (isConfirm.isConfirmed) {
        //             $('#statuss').val('3');
        //             $('.admin-remarks-form').submit();
        //         }
        //     });

        // });
         $('#submit_btn').click(function() {
            var nursery_status = $("#nursery_status").val();
            if (!nursery_status) {
                Swal.fire('Select Nursery Status ', '', 'error');
                return false;
            }
            var remarks = $("#remarks").val();
            if (!remarks) {
                Swal.fire('Enter Remarks', '', 'error');
                return false;
            }
            var status = "{{$nursery['nursery_status']['approved_reject_by_dso']}}";
            if(status == 1){
                var admin_nursery_report = $("#admin_nursery_report").val();
                if (!admin_nursery_report) {
                    Swal.fire('Upload Nursery Report ', '', 'error');
                    return false;
                }
            }
            Swal.fire({
                title: 'Are you sure?',
                // text: 'Some text.',
                type: 'success',
                showCancelButton: true,
                // confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No.'
            }).then((isConfirm) => {
                if (isConfirm.isConfirmed) {
                    // $('#statuss').val('3');
                    $('.admin-remarks-form').submit();
                }
            });

        });


    });

         function downloadPdf() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            $.ajax({
                url: '{{ route("admin.printNursery") }}',
                type: 'POST',
                data: {nursery: {!! json_encode($nursery) !!}, remarks: {!! json_encode($remarks) !!}},
                xhrFields: {
                responseType: 'blob'
            },
                success: function(response) {
                    var blobUrl = URL.createObjectURL(response);
                    var a = document.createElement('a');
                    a.href = blobUrl;
                    a.download = 'nursery.pdf';
                    document.body.appendChild(a);
                    a.click();
                    URL.revokeObjectURL(blobUrl);
                    $(a).remove();
                    },
                error: function(xhr, status, error) {
            console.error(error);
            // Handle error here
        }
            });
        }
</script>
@endsection