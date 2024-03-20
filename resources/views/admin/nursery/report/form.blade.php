@extends($layout)

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nursery</h1>
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
                        <!-- <form class="regis-form" method="post"> -->
                          <!--   <div class="row mt-3">
                                <div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Category of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery['cat_of_nursery']) }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">District</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>dfgdfg</div>
                                    </div>
                                </div>
                                 <div class="row col-sm-4">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">District</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>dfgdfg</div>
                                    </div>
                                </div>
                               
                            </div> -->
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" name="application_id" value="{{ $nursery['application_number'] ?? ''}}">
                                <label class="form-label">Category of Nursery</label>
                                <select disabled class="form-control form-select" aria-label="Default select example" name="cat_of_nursery">
                                    <option <?php if (empty($nursery['cat_of_nursery'])) {
                                                echo "selected";
                                            } ?>>Open this select menu</option>
                                    <option value="1" <?php if (!empty($nursery['cat_of_nursery'])) {
                                                            if ($nursery['cat_of_nursery'] = "1") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Private
                                    </option>
                                    <option value="2" <?php if (!empty($nursery['cat_of_nursery'])) {
                                                            if ($nursery['cat_of_nursery'] = "2") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Government
                                    </option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Games</label>

                                <input disabled type="text" class="form-control" name="name_of_nursery" value="{{!empty($nursery['game']['name']) ? $nursery['game']['name'] : '--' }}">

                            </div>
                            <!-- </div> -->
                            <div class="col-sm-6">
                                <label class="form-label">District</label>
                                <select disabled class="form-control" name="district_id">
                                    <option value="">-----Select District------</option>
                                    <?php foreach ($districts as $district) { ?>

                                        <option value="{{$district['id']}}" <?php if (!empty($nursery['district_id'])) {
                                                                                if ($nursery['district_id'] == $district['id']) {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?>>{{$district['name']}}</option>


                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Type of Nursery</label>
                                <select disabled class="form-control form-select" aria-label="Default select example" name="type_of_nursery">
                                    <option <?php if (empty($nursery['type_of_nursery'])) {
                                                echo "selected";
                                            } ?>>Open this select menu</option>
                                    <option value="1" <?php if (!empty($nursery['type_of_nursery'])) {
                                                            if ($nursery['type_of_nursery'] = "1") {
                                                                echo "selected";
                                                            }
                                                        } ?>>School
                                    </option>
                                    <option value="2" <?php if (!empty($nursery['type_of_nursery'])) {
                                                            if ($nursery['type_of_nursery'] = "2") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Institute
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Name of Nursery</label>
                                <input disabled type="text" class="form-control" name="name_of_nursery" value="{{!empty($nursery['name_of_nursery']) ? $nursery['name_of_nursery'] : '' }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" name="address" readonly>{{!empty($nursery['address']) ? $nursery['address'] : '' }}</textarea>

                            </div>
                            <!-- div class="col-sm-6">
                                <label class="form-label">PAN No. (for private only)</label>
                                <input disabled type="text" class="form-control" name="pan_private" value="{{!empty($nursery['pan_private']) ? $nursery['pan_private'] : '' }}">
                            </div> -->
                            <div class="col-sm-6">
                                <label class="form-label">Registration No. of Society who will be running
                                    Nursery</label>
                                <input disabled type="text" class="form-control" name="reg_no_running_nursery" value="{{!empty($nursery['reg_no_running_nursery']) ? $nursery['reg_no_running_nursery'] : '' }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Name of Head/Principal</label>
                                <input disabled type="text" class="form-control" name="head_pricipal" value="{{!empty($nursery['head_pricipal']) ? $nursery['head_pricipal'] : '' }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Email</label>
                                <input disabled type="email" class="form-control" name="email" value="{{!empty($nursery['email']) ? $nursery['email'] : '' }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Mobile Number</label>
                                <input disabled type="number" class="form-control" name="mobile_number" value="{{!empty($nursery['mobile_number']) ? $nursery['mobile_number'] : '' }}">
                            </div>
                         <!--    <div class="col-sm-6">
                                <label class="form-label">Bank Account Number</label>
                                <input disabled type="number" class="form-control" name="bank_ac" value="{{!empty($nursery['bank_ac']) ? $nursery['bank_ac'] : '' }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Bank Name</label>
                                <input disabled type="text" class="form-control" name="bank_name" value="{{!empty($nursery['bank_name']) ? $nursery['bank_name'] : '' }}">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Bank IFSC Code</label>
                                <input disabled type="text" class="form-control" name="bank_ifc_code" value="{{!empty($nursery['bank_ifc_code']) ? $nursery['bank_ifc_code'] : '' }}">
                            </div> -->

                            <div class="col-sm-6">
                                <label class="form-label">Select Games/Disciplines</label>

                                <select disabled class="form-control form-control" name="game_disp">
                                    <option value="boys" <?php if (!empty($nursery['game_disp'])) {
                                                            if ($nursery['game_disp'] = "boys") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Boys</option>
                                    <option value="girls" <?php if (!empty($nursery['game_disp'])) {
                                                            if ($nursery['game_disp'] = "girls") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Girls</option>
                                    <option value="mix" <?php if (!empty($nursery['game_disp'])) {
                                                            if ($nursery['game_disp'] = "mix") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Mix</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Playground/Hall/Court available</label>
                                <select disabled class="form-control form-select" aria-label="Default select example" name="playground_hall_court_available">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php if (!empty($nursery['playground_hall_court_available'])) {
                                                            if ($nursery['playground_hall_court_available'] = "yes") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Yes</option>
                                    <option value="2" <?php if (!empty($nursery['playground_hall_court_available'])) {
                                                            if ($nursery['playground_hall_court_available'] = "no") {
                                                                echo "selected";
                                                            }
                                                        } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Equipment related to selected Games
                                    available</label>
                                <select disabled class="form-control form-select" aria-label="Default select example" name="equipment_related_to_selected_games_available">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php if (!empty($nursery['equipment_related_to_selected_games_available'])) {
                                                            if ($nursery['equipment_related_to_selected_games_available'] = "yes") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Yes</option>
                                    <option value="2" <?php if (!empty($nursery['equipment_related_to_selected_games_available'])) {
                                                            if ($nursery['equipment_related_to_selected_games_available'] = "no") {
                                                                echo "selected";
                                                            }
                                                        } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Whether Nursery will provide Sports kits to
                                    selected players?</label>
                                <select disabled class="form-control form-select" aria-label="Default select example" name="whether_nursery_will_provide_sports_kits_to_selected_players">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php if (!empty($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'])) {
                                                            if ($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'] = "yes") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Yes</option>
                                    <option value="2" <?php if (!empty($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'])) {
                                                            if ($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'] = "no") {
                                                                echo "selected";
                                                            }
                                                        } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Whether Nursery will provide fee concession to
                                    selected players?</label>
                                <select disabled class="form-control form-select" aria-label="Default select example" name="whether_nursery_will_provide_fee_concession_to_selected_players">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php if (!empty($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'])) {
                                                            if ($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'] = "yes") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Yes</option>
                                    <option value="2" <?php if (!empty($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'])) {
                                                            if ($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'] = "no") {
                                                                echo "selected";
                                                            }
                                                        } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Whether qualified coach is available for the
                                    concerned game?</label>
                                <select disabled class="form-control form-select" aria-label="Default select example" name="whether_qualified_coach_is_available_for_the_concerned_game">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php if (!empty($nursery['whether_qualified_coach_is_available_for_the_concerned_game'])) {
                                                            if ($nursery['whether_qualified_coach_is_available_for_the_concerned_game'] = "1") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Yes</option>
                                    <option value="1" <?php if (!empty($nursery['whether_qualified_coach_is_available_for_the_concerned_game'])) {
                                                            if ($nursery['whether_qualified_coach_is_available_for_the_concerned_game'] = "2") {
                                                                echo "selected";
                                                            }
                                                        } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">No. of students playing concerned games</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label">Boys</label>
                                        <input disabled type="text" class="form-control" name="boys" value="{{!empty($nursery['boys']) ? $nursery['boys'] : '' }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Girls</label>
                                        <input disabled type="text" class="form-control" name="girls" value="{{!empty($nursery['girls']) ? $nursery['girls'] : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Any specific achievements of the Institute during
                                    last 5 years</label>
                                <textarea class="form-control" disabled name="any_specific_achievements_of_the_institute_during_last">{{!empty($nursery["any_specific_achievements_of_the_institute_during_last"]) ? $nursery["any_specific_achievements_of_the_institute_during_last"] : '' }}
                                </textarea>

                            </div>


                        </div>
                        <!-- </form> -->

                    </div>


                </div>

            </div>

        </div>

    </section>
    <?php
    if ($nursery['nursery_status']['approved_by_admin_or_reject_by_admin'] == 0 && $nursery['nursery_status']['approved_reject_by_dso']== 1) {

        ?>


        <section class="content">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-12">
                        <h1>DSO Feasibility Report</h1>
                        <div class="card p-5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="form-label">Site visit done?</label>
                                    <select class="form-control site_visit" name="site_visit" readonly>
                                        <option value="">-----Select-----</option>
                                        <option value="yes" {{ !empty($nurseryRemarks['site_visit']) && $nurseryRemarks['site_visit'] == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ !empty($nurseryRemarks['site_visit']) && $nurseryRemarks['site_visit'] == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div> 
                                <div class="col-sm-12">
                                    <label class="form-label">Nursery Recommendations</label>
                                    <select class="form-control recommended" name="recommend_status" readonly>
                                        <option value="">-----Select-----</option>
                                        <option value="yes"{{ !empty($nurseryRemarks['recommend_status']) && $nurseryRemarks['recommend_status'] == 'yes' ? 'selected' : '' }}>Recommended for Approval</option>
                                        <option value="no"  {{ !empty($nurseryRemarks['recommend_status']) && $nurseryRemarks['recommend_status'] == 'no' ? 'selected' : '' }}>Not Recommended</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" name="remarks" disabled>{{ $nurseryRemarks['remarks'] ?? '' }}</textarea>
                                </div>
                                <div class="col-sm-12 pb-2">
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
                                <div class="col-sm-12 pb-2">
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
                <div class="col-12">
                    <div class="card p-5">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Pending for Approval</th>
                                    <th scope="col">Total Nursery Approved in  {{$nursery['district']['name']}} </th>
                                    <th scope="col">Total Nursery Approved</th>
                                </tr>
                            </thead>
                            <tbody>
                             <tr>
                                <td>{{$count['pendingapproval']}}</td>
                                <td>{{$count['totalapprovednurserydistrict']}}</td>
                                <td>{{$count['totalapprovednursery']}}</td>
                             <tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Admin / HQ Report</h1>
                    <div class="card p-5">
                        <form class="admin-remarks-form" action="{{ route('admin.saveNurseryReport',$nursery['secure_id'])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <input type="hidden" id="statuss" name="status" value="0">
                                <div class="col-sm-12">
                                    <label class="form-label">Nursery Status</label>
                                    <select class="form-control" name="status" id="nursery_status">
                                        <option value="">-----Select-----</option>
                                        <option value="1">Approve</option>
                                        <option value="2">Reject</option>
                                        <option value="3">Raise Objection</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label class="form-label">Remarks</label>
                                    <textarea class="form-control" name="remarks" id="remarks"></textarea>
                                </div>
                                <div class="col-sm-12 pb-2">
                                    <label class="form-label">Upload Signed Document</label>
                                    <input type="file" class="form-control" name="admin_nursery_report[]" id="admin_nursery_report">
                                    <div class="row mt-5 pb-5">
                                        <div class="col-sm-12 text-center">
                                            <span class="btn btn-primary" id="submit_btn">Submit</span>
                                           <!--  <span class="btn btn-primary" id="approve_btn">Approve</span>
                                            <span class="btn btn-danger" id="reject_btn">Reject</span>

                                            <span class="btn btn-danger" id="objection_btn">objection</span> -->

                                        </div>
                                        <!-- <input type="submit" value="submit" > -->
                                    </div>


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
            var admin_nursery_report = $("#admin_nursery_report").val();
            if (!admin_nursery_report) {
                Swal.fire('Upload Nursery Report ', '', 'error');
                return false;
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