@extends($layout)

@section('content')
<script>
    $(document).ready(function () {
        $("input").prop("disabled", true);
        $("select").prop("disabled", true);
        $("textarea").prop("disabled", true);

    });
</script>


<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nursery</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- p -->
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-5">
                        <ul class="navbar-nav ml-auto">
                            @if($role == 'admin')
                            <li class="nav-item mr-2">
                                <a class="btn btn-primary"
                                    href="javascript:void(0)"
                                    onClick="downloadPdf()"
                                    role="button">
                                    Download Complete Application
                                </a>
                            </li>
                            @endif
                        </ul>
                        <form class="regis-form" method="post">

                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Category of Nursery</label>
                                    <select class="form-control form-select" aria-label="Default select example"
                                        name="cat_of_nursery">
                                        <option <?php if (empty($nursery['cat_of_nursery'])) { echo "selected" ; } ?>
                                            >Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['cat_of_nursery'])) { if
                                            ($nursery['cat_of_nursery']="1" ) { echo "selected" ; } } ?>>Private
                                        </option>
                                        <option value="2" <?php if (!empty($nursery['cat_of_nursery'])) { if
                                            ($nursery['cat_of_nursery']="2" ) { echo "selected" ; } } ?>>Government
                                        </option>
                                    </select>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Games</label>
                                    <div class="form-control">
                                        <span class="">
                                            {{ $nursery['game']['name']}}
                                        </span>


                                    </div>


                                </div>
                                <!-- </div> -->
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">District</label>
                                    <select class="form-control" name="district_id">
                                        <option value="">-----Select District------</option>
                                        <?php foreach ($districts as $district) { ?>

                                        <option value="{{$district['id']}}" <?php if (!empty($nursery['district_id'])) {
                                            if ($nursery['district_id']==$district['id']) { echo "selected" ; } } ?>
                                            >{{$district['name']}}</option>


                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Type of Nursery</label>
                                    <select class="form-control form-select" aria-label="Default select example"
                                        name="type_of_nursery">
                                        <option <?php if (empty($nursery['type_of_nursery'])) { echo "selected" ; } ?>
                                            >Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['type_of_nursery'])) { if
                                            ($nursery['type_of_nursery']="1" ) { echo "selected" ; } } ?>>School
                                        </option>
                                        <option value="2" <?php if (!empty($nursery['type_of_nursery'])) { if
                                            ($nursery['type_of_nursery']="2" ) { echo "selected" ; } } ?>>Institute
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Name of Nursery</label>
                                    <input type="text" class="form-control" name="name_of_nursery"
                                        value="{{!empty($nursery['name_of_nursery']) ? $nursery['name_of_nursery'] : '' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control"
                                        name="address">{{!empty($nursery['address']) ? $nursery['address'] : '' }}</textarea>

                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">PAN No. (for private only)</label>
                                    <input type="text" class="form-control" name="pan_private"
                                        value="{{!empty($nursery['pan_private']) ? $nursery['pan_private'] : '' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Registration No. of Society who will be running
                                        Nursery</label>
                                    <input type="text" class="form-control" name="reg_no_running_nursery"
                                        value="{{!empty($nursery['reg_no_running_nursery']) ? $nursery['reg_no_running_nursery'] : '' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Name of Head/Principal</label>
                                    <input type="text" class="form-control" name="head_pricipal"
                                        value="{{!empty($nursery['head_pricipal']) ? $nursery['head_pricipal'] : '' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{!empty($nursery['email']) ? $nursery['email'] : '' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="number" class="form-control" name="mobile_number"
                                        value="{{!empty($nursery['mobile_number']) ? $nursery['mobile_number'] : '' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Bank Account Number</label>
                                    <input type="number" class="form-control" name="bank_ac"
                                        value="{{!empty($nursery['bank_ac']) ? $nursery['bank_ac'] : '' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name"
                                        value="{{!empty($nursery['bank_name']) ? $nursery['bank_name'] : '' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Bank IFSC Code</label>
                                    <input type="text" class="form-control" name="bank_ifc_code"
                                        value="{{!empty($nursery['bank_ifc_code']) ? $nursery['bank_ifc_code'] : '' }}">
                                </div>
                                <!-- <div class="col-sm-6">
                                    <label class="form-label">Type of Nursery</label>
                                     <select class="form-control form-select" aria-label="Default select example" name="typr_of_nursery">
                                        <option selected>Open this select menu</option>
                                        <option value="1">School</option>
                                         <option value="2"<?php  //if(!empty($nursery['game_disp)){ if($nursery['game_disp ="2"){  echo"selected";   }} 
                                                            ?>   >Institute</option>
                                    </select>
                                </div> -->
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Select Games/Disciplines</label>
                                    <!--  <select class="form-control selectpicker form-control" multiple>
                                        <option value="1">One</option>
                                         <option value="2"<?php // if(!empty($nursery['game_disp)){ if($nursery['game_disp ="2"){  echo"selected";   }} 
                                                            ?>   >Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select> -->
                                    <select class="form-control form-control" name="game_disp">
                                        <option value="1" <?php if (!empty($nursery['game_disp'])) { if
                                            ($nursery['game_disp']="1" ) { echo "selected" ; } } ?>>One</option>
                                        <option value="2" <?php if (!empty($nursery['game_disp'])) { if
                                            ($nursery['game_disp']="2" ) { echo "selected" ; } } ?>>Two</option>
                                        <option value="3" <?php if (!empty($nursery['game_disp'])) { if
                                            ($nursery['game_disp']="3" ) { echo "selected" ; } } ?>>Three</option>
                                        <option value="4" <?php if (!empty($nursery['game_disp'])) { if
                                            ($nursery['game_disp']="4" ) { echo "selected" ; } } ?>>Four</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Playground/Hall/Court available</label>
                                    <select class="form-control form-select" aria-label="Default select example"
                                        name="playground_hall_court_available">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if (!empty($nursery['playground_hall_court_available']))
                                            { if ($nursery['playground_hall_court_available']="1" ) { echo "selected" ;
                                            } } ?>>Yes</option>
                                        <option value="2" <?php if (!empty($nursery['playground_hall_court_available']))
                                            { if ($nursery['playground_hall_court_available']="2" ) { echo "selected" ;
                                            } } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Equipment related to selected Games
                                        available</label>
                                    <select class="form-control form-select" aria-label="Default select example"
                                        name="equipment_related_to_selected_games_available">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if
                                            (!empty($nursery['equipment_related_to_selected_games_available'])) { if
                                            ($nursery['equipment_related_to_selected_games_available']="1" ) {
                                            echo "selected" ; } } ?>>Yes</option>
                                        <option value="2" <?php if
                                            (!empty($nursery['equipment_related_to_selected_games_available'])) { if
                                            ($nursery['equipment_related_to_selected_games_available']="2" ) {
                                            echo "selected" ; } } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Whether Nursery will provide Sports kits to
                                        selected players?</label>
                                    <select class="form-control form-select" aria-label="Default select example"
                                        name="whether_nursery_will_provide_sports_kits_to_selected_players">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if
                                            (!empty($nursery['whether_nursery_will_provide_sports_kits_to_selected_players']))
                                            { if
                                            ($nursery['whether_nursery_will_provide_sports_kits_to_selected_players']="1"
                                            ) { echo "selected" ; } } ?>>Yes</option>
                                        <option value="2" <?php if
                                            (!empty($nursery['whether_nursery_will_provide_sports_kits_to_selected_players']))
                                            { if
                                            ($nursery['whether_nursery_will_provide_sports_kits_to_selected_players']="2"
                                            ) { echo "selected" ; } } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Whether Nursery will provide fee concession to
                                        selected players?</label>
                                    <select class="form-control form-select" aria-label="Default select example"
                                        name="whether_nursery_will_provide_fee_concession_to_selected_players">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if
                                            (!empty($nursery['whether_nursery_will_provide_fee_concession_to_selected_players']))
                                            { if
                                            ($nursery['whether_nursery_will_provide_fee_concession_to_selected_players']="1"
                                            ) { echo "selected" ; } } ?>>Yes</option>
                                        <option value="2" <?php if
                                            (!empty($nursery['whether_nursery_will_provide_fee_concession_to_selected_players']))
                                            { if
                                            ($nursery['whether_nursery_will_provide_fee_concession_to_selected_players']="2"
                                            ) { echo "selected" ; } } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Whether qualified coach is available for the
                                        concerned game?</label>
                                    <select class="form-control form-select" aria-label="Default select example"
                                        name="whether_qualified_coach_is_available_for_the_concerned_game">
                                        <option selected>Open this select menu</option>
                                        <option value="1" <?php if
                                            (!empty($nursery['whether_qualified_coach_is_available_for_the_concerned_game']))
                                            { if
                                            ($nursery['whether_qualified_coach_is_available_for_the_concerned_game']="1"
                                            ) { echo "selected" ; } } ?>>Yes</option>
                                        <option value="1" <?php if
                                            (!empty($nursery['whether_qualified_coach_is_available_for_the_concerned_game']))
                                            { if
                                            ($nursery['whether_qualified_coach_is_available_for_the_concerned_game']="2"
                                            ) { echo "selected" ; } } ?>>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">No. of students playing concerned games</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label">Boys</label>
                                            <input type="text" class="form-control" name="boys"
                                                value="{{!empty($nursery['boys']) ? $nursery['boys'] : '' }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Girls</label>
                                            <input type="text" class="form-control" name="girls"
                                                value="{{!empty($nursery['girls']) ? $nursery['girls'] : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Any specific achievements of the Institute during
                                        last 5 years</label>
                                    <textarea class="form-control"
                                        name="any_specific_achievements_of_the_institute_during_last">{{!empty($nursery["any_specific_achievements_of_the_institute_during_last"]) ? $nursery["any_specific_achievements_of_the_institute_during_last"] : '' }}
                                    </textarea>

                                </div>
                                <!-- <div class="col-sm-12 text-end pt-4">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div> -->

                            </div>
                        </form>

                    </div>



                </div>

            </div>

        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <h2>DSO Report </h2>


            <div class="row">
                <div class="col-12">
                    <div class="card p-5">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Files</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($remarks as $key => $remark)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$remark['user']['name']}}</td>
                                        <td>{{ $remark['remarks']}}</td>
                                        <td>{{ (!empty($remark['grade'])&& !is_null($remark['grade'])
                                            )?$remark['grade']:'N/A' }}</td>

                                        <td>
                                            @if (!empty($remark['files']) && !is_null($remark['files']))
                                                @php
                                                    $picss = json_decode($remark['files']);
                                                @endphp
                                                @if(!empty($picss))
                                                    @foreach ($picss as $p)
                                                        <a href="{{url('public/docs/').'/'.$nursery['secure_id'].'/'.$p}}"
                                                            target="_blank">

                                                            <img src="{{url('public/docs/').'/'.$nursery['secure_id'].'/'.$p}}"
                                                                class="img-thumbnail" width="50px" height="50px">
                                                        </a>
                                                    @endforeach
                                                @else
                                                    echo"N/A";
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>fma
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </section>
</div>

<!-- remarks -->

<script>

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