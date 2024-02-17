<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Department</title>
    <link href="{{asset('forntend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('forntend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('forntend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <!-- ================================================================================================================================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('forntend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    <script src="{{asset('assets/plugins/jquery')}}/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</head>
 <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust the alpha value for the desired blur effect */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999; /* Adjust the z-index to ensure the loader is on top of other content */
        }

        #loading-image {
            width: 50px; /* Adjust the width of the loading image as needed */
            height: 50px; /* Adjust the height of the loading image as needed */
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }

        .freeze { pointer-events:none; }
    </style>


@if ($message = Session::get('success'))

<script>
    $(document).ready(function() {
        Swal.fire(
            'NURSERY MANAGEMENT SYSTEM',
            '{{ $message }}',
            'success'
        )

    });
</script>
@endif

@if ($message = Session::get('error'))

<script>
    $(document).ready(function() {
        Swal.fire(
            'NURSERY MANAGEMENT SYSTEM',
            '{{ $message }}',
            'error'
        )

    });
</script>
@endif

<body>
    <div class="container-fluid">
        <!-- <div class="loader"></div> -->

        <div class="row">
            <div class="col-sm-12 p-0">
                <header>
                    <div class="top-header">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-sm-8 adjust-width">
                                    <ul class="select-box text-left">
                                        <li><a href="javascript:void(0)"> <i class="fa fa-envelope"></i> <span>abc@gmail.com</span></a></li>

                                    </ul>

                                </div>
                                <div class="col-sm-4 no-padding-left adjust-width">
                                    <ul class="select-box text-end">
                                        <li> <i class="fa fa-phone"></i> <span>1234567890</span></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="main-header pt-3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-2 col-md-2 col-sm-3 full-width">
                                    <div class="logo">
                                        <a href="index.html"><img src="images/department-logo.png" alt="" class="img-fluid" width="80px"></a>
                                    </div>

                                </div>
                                <div class="col-md-8 col-sm-6 half-width">
                                    <div class="consol-port text-center">
                                        <a href="index.html">
                                            <h1 class="text-white mt-3"><span></span></h1>
                                            <strong>NURSERY MANAGEMENT SYSTEM </strong>
                                            <span>Department of Sports &amp; Youth Affairs, Haryana</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 d-none d-md-block text-end">
                                    <span class="float-right cm-picture-box"><img src="images/haryana-logo.png" alt="" class="img-fluid" width="70px"></span>
                                </div>

                            </div>
                        </div>
                    </div> -->


                    <div class="main-header pt-3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-2 col-md-2 col-sm-3 full-width">
                                    <div class="logo">
                                        <a href="{{url('/')}}"><img src="{{url('/forntend')}}/images/department-logo.png" alt="" class="img-fluid" width="80px"></a>
                                    </div>

                                </div>
                                <div class="col-md-8 col-sm-6 half-width">
                                    <div class="consol-port text-center">
                                        <a href="{{url('/')}}">
                                            <h1 class="text-white mt-3"><span></span></h1>
                                            <strong>NURSERY MANAGEMENT SYSTEM </strong>
                                            <span>Department of Sports &amp;, Haryana</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 d-none d-md-block text-end">
                                    <span class="float-right cm-picture-box"><img src="{{url('/forntend')}}/images/haryana-logo.png" alt="" class="img-fluid" width="70px"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </header>
                <div class="content-header">

                </div>
                <section class="main-body">
                    <div class="container">
                        <!-- <div class="loader-container"> -->
                        <div class="loader" style="display: none;">
                            <img id="loading-image" src="{{asset('forntend/images/loading.gif')}}" alt="Loading...">
                        </div>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="heading2 text-center pt-4">
                                Nursery Management  Registration
                                </h2>
                            </div>
                            <div class="col-sm-12">

                                <form class="regis-form" method="post" id="nursery-registration-form">
                                    @csrf
                                    <div class="row" id="step1">
                                    
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4 email-div">
                                            <div class="card card-primary">
                                                <div class="card-body">

                                                <div class="col-sm-12">
                                <h2 class="heading2 text-center">
                                Nursery Details
                                </h2>
                            </div>
                                             
                                                <label class="form-label">Email</label>
                                                <input type="text" name="email" class="form-control controlDiv" autocomplete="off" id="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert" style="display : block;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="otp_html" style="display: none;">
                                                    <label class="form-label">Enter Otp</label>
                                                    <input type="password" name="otp_email" class="form-control" autocomplete="off" id="opt_email" maxlength="6">
                                                </div>
                                                </div>
                                                <div class="mb-2 text-center submit-btn">
                                                    <button type="button" class="btn btn-danger" onclick="validateEmail()" id="submit">Submit</button>
                                                </div>
                                                <div class="mb-2 text-center btnDiv">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                    <div class="row" id="step2" style="display: none;">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card card-primary">
                                                <div class="card-body">
                                                <div class="col-sm-12">
                                <h2 class="heading2 text-center">
                                Nursery Details

                                </h2>
                            </div>
                                                    <label class="form-label">Mobile Number</label>
                                                    <input type="text" name="mobile_number" pattern="[0-9]*" oninput="validateNumber(this)" class="form-control controlDiv" autocomplete="off" id="mobile_number" maxlength="10">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control controlDiv" autocomplete="off" id="name" maxlength="50" onkeypress="return /[a-zA-Z ]/i.test(event.key)">

                                                    <div class="otp_phone_html" style="display: none;">
                                                    <label class="form-label">Enter Otp</label>
                                                    <input type="password" name="otp_mobile" class="form-control" autocomplete="off" id="otp_mobile" maxlength="6">
                                                    </div>
                                                </div>
                                                <div class="mb-2 text-center submit-mbtn">
                                                    <button type="button" class="btn btn-danger text-right" id="submit-mbtn" onclick="validateMobile()">Submit</button>
                                                </div>
                                                <div class="mb-2 text-center btnmdiv">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        </div>

                                    </div>

                                    <div class="row" id="step3" style="display: none;">
                                        <div class="card card-primary">
                                        <div class="row card-body">
                                        <div class="col-sm-6">
                                            <label class="form-label">District</label>
                                            <label for="exampleInputPassword1">District</label>
                                            <select class="form-control" name="district_id" id="district_id">
                                                <option value="">-----Select District------</option>
                                                <?php foreach ($districts as $district) { ?>

                                                    <option value="{{$district['id']}}">{{$district['name']}}</option>


                                                <?php } ?>
                                            </select>

                                            @error('district_id')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Category of Nursery</label>
                                            <select class="form-select cat_of_nursery" aria-label="Default select example" name="cat_of_nursery">
                                                <option value="">Open this select menu</option>
                                                <option value="1">Private</option>
                                                <option value="2">Government</option>
                                            </select>
                                            @error('cat_of_nursery')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label">Type of Nursery</label>
                                            <select class="form-select" aria-label="Default select example" name="type_of_nursery">
                                                <option value="">Open this select menu</option>
                                                <option value="1">School</option>
                                                <option value="2">Institute</option>
                                            </select>

                                            @error('type_of_nursery')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Name of Nursery</label>
                                            <input type="text" class="form-control" name="name_of_nursery">
                                            @error('name_of_nursery')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" name="address"></textarea>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">PAN No. (for private only)</label>
                                            <input type="text" class="form-control pan_private" name="pan_private">
                                            @error('pan_private')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Registration No. of Society who will be running Nursery</label>
                                            <input type="text" class="form-control" name="reg_no_running_nursery">
                                            @error('reg_no_running_nursery')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-sm-12 text-end mb-2">
                                            <button type="button" class="btn btn-danger" id="nursery-details" onclick="saveNurseryDetails('step3')">Next</button>
                                        </div>
                                    </div>
                                    </div>


                                    <div class="row step" id="step4" style="display: none;">
                                        <div class="card card-primary">
                                        <div class="row card-body">
                                        <div class="col-sm-6">
                                            <label class="form-label">Name of Head/Principal</label>
                                            <input type="text" class="form-control" name="head_pricipal">
                                            @error('head_pricipal')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="mobile_number" pattern="[0-9]*" oninput="validateNumber(this)" maxlength="10">
                                            @error('mobile_number')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Bank Account Number</label>
                                            <input type="number" class="form-control" name="bank_ac">
                                            @error('bank_ac')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name">
                                            @error('bank_name')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Bank IFSC Code</label>
                                            <input type="text" class="form-control" name="bank_ifc_code">
                                            @error('bank_ifc_code')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                         <div class="col-sm-12 text-end mb-4">
                                            <button type="button" class="btn btn-primary" onclick="prevStep()">Previous</button>
                                            <button type="button" class="btn btn-danger" id="registrant-details" onclick="saveNurseryDetails('step4')">Next</button>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row step" id="step5" style="display: none;">
                                        <div class="card card-primary">
                                        <div class="row card-body">
                                        <div class="col-sm-6">
                                            <label class="form-label">Games</label>

                                            <select class="form-select" name="game_id">
                                            <option value="">Open this select menu</option>

                                                <?php foreach ($games as $game) { ?>

                                                    <option value="{{$game['id']}}">{{$game['name']}}</option>


                                                <?php } ?>
                                            </select>

                                            @error('game_id')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Select Games/Disciplines</label>
                                            <!-- <select class="selectpicker form-control" multiple>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                            </select> -->
                                            <select class="form-control" name="game_disp">
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>


                                            </select>

                                            @error('game_disp')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Playground/Hall/Court available</label>
                                            <select class="form-select" aria-label="Default select example" name="playground_hall_court_available">
                                                <option value="">Open this select menu</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>


                                            @error('playground_hall_court_available')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Equipment related to selected Games available</label>
                                            <select class="form-select" aria-label="Default select example" name="equipment_related_to_selected_games_available">
                                                <option value="">Open this select menu</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>

                                            @error('equipment_related_to_selected_games_available')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Whether Nursery will provide Sports kits to selected players?</label>
                                            <select class="form-select" aria-label="Default select example" name="whether_nursery_will_provide_sports_kits_to_selected_players">
                                                <option value="">Open this select menu</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>

                                            @error('whether_nursery_will_provide_sports_kits_to_selected_players')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Whether Nursery will provide fee concession to selected players?</label>
                                            <select class="form-select" aria-label="Default select example" name="whether_nursery_will_provide_fee_concession_to_selected_players">
                                                <option value="">Open this select menu</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>

                                            @error('whether_nursery_will_provide_fee_concession_to_selected_players')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Whether qualified coach is available for the concerned game?</label>
                                            <select class="form-select" aria-label="Default select example" name="whether_qualified_coach_is_available_for_the_concerned_game">
                                                <option value="">Open this select menu</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>

                                            @error('whether_qualified_coach_is_available_for_the_concerned_game')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">No. of students playing concerned games</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="form-label">Boys</label>
                                                    <input type="number" class="form-control" name="boys">

                                                    @error('boys')
                                                    <span class="invalid-feedback" role="alert" style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label">Girls</label>
                                                    <input type="number" class="form-control" name="girls">

                                                    @error('girls')
                                                    <span class="invalid-feedback" role="alert" style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Any specific achievements of the Institute during last 5 years</label>
                                            <textarea class="form-control" name="any_specific_achievements_of_the_institute_during_last"></textarea>
                                            @error('any_specific_achievements_of_the_institute_during_last')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        </div>
                                        <div class="col-sm-12 text-end mb-2">
                                            <button type="button" class="btn btn-primary" onclick="prevStep()">Previous</button>
                                            <button type="button" class="btn btn-danger" id="final_submit" onclick="saveNurseryDetails('step5')">Submit</button>
                                        </div>
                                    </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
            </div>
            </section>

        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.pan_private').prop("disabled", true);

            $('.cat_of_nursery').on('change', function() {
                $('.pan_private').prop("disabled", true);

                if (this.value == '1') {
                    $('.pan_private').prop("disabled", false);
                } else {
                    $('.pan_private').prop("disabled", true);

                }
            });


            $('#example-getting-started').multiselect({
                buttonClass: 'form-select',
                templates: {
                    button: '<button type="button" class="multiselect dropdown-toggle" data-bs-toggle="dropdown"><span class="multiselect-selected-text"></span></button>',
                }
                //             onChange: function(element, checked) {
                // var brands = $('#multiselect1 option:selected');
                // var selected = [];
                // $(brands).each(function(index, brand){
                //     selected.push([$(this).val()]);
                // });

                // console.log(selected);
                // }

            });
        });
        function validateEmail() {
            var csrfToken =  $('input[name="_token"]').val();
            var email =$.trim($("#email").val());
            var url = "{{ route('nursery.email') }}"
            if(!email){
                Swal.fire('Enter email address', '', 'error');
                return false;
            }

            if(!isValidEmail(email)){
                Swal.fire('Enter valid email ID', '', 'error');
                return false;
            }
            $(".loader").show();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: url,

            data: {
                _token:csrfToken, email:email
            },
           success: function (response) {
            $(".loader").hide();
                if(response.status == 'success'){
                    var msg = response.message
                    $(".otp_html").show();
                    $(".submit-btn").hide();
                    $(".controlDiv").addClass('freeze');
                    $(".btnDiv").html(response.html);
                    Swal.fire(msg, '', 'success');
                        return false;
                }else{
                    $('#nursery-registration-form')[0].reset();
                    Swal.fire(response.message, '', 'error');
                        return false;
                }
            }
        })

        }

        function validateEmailOTP() {
            var otp = $("#opt_email").val();
            var email =$.trim($("#email").val());
            var csrfToken =  $('input[name="_token"]').val();
            var url = "{{ route('nursery.validateOtp') }}"

            if(!otp){
                Swal.fire('Enter OTP', '', 'error');
                return false;
            }
            $(".loader").show();

             $.ajax({
            type: "POST",
            dataType: "json",
            url: url,

            data: {
                _token:csrfToken, otp:otp, email:email
            },
           success: function (response) {
            $(".loader").hide();

                console.log(response.existingNursery,"cdcdd");
                if (response.status === 'success') {
                    var nursery = response.existingNursery;
                    if(nursery != null){
                        $("#mobile_number").val(nursery.mobile_number);
                        $("#name").val(nursery.name_of_nursery);
                    }
                    $("#step1").hide();
                    $("#step2").show();
                    $(".btnDiv").hide();
                    $(".controlDiv").removeClass('freeze');

                    $("#submit-mbtn").show();
                    Swal.fire(response.message, '', 'success');
                }else{
                    Swal.fire(response.message, '', 'error');
                }
            },
            error: function (xhr, status, error) {
                console.error(error,"errorrrr");
            }
        })
        }
    // Function to validate email format
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateMobile() {
        var csrfToken =  $('input[name="_token"]').val();
        var mobile =$.trim($("#mobile_number").val());
        var name =$.trim($("#name").val());
        var url = "{{ route('nursery.validateNumber') }}"
        // alert(url);
        if(!mobile){
            Swal.fire('Enter Mobile Number', '', 'error');
            return false;
        }

        $(".loader").show();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: url,

            data: {
                _token:csrfToken, mobile:mobile, name:name
            },
           success: function (response) {
            $(".loader").hide();
            console.log(response,"rrrr")
            var msg = response.message
            $(".otp_phone_html").show();
            $(".submit-btn, .btnDiv, .mobile-div, #submit-mbtn ").hide();
            $(".controlDiv").addClass('freeze');
            $(".btnmdiv").html(response.html);
            Swal.fire(msg, '', 'success');
                return false;
            }
        })
    }

    function validateMobileOTP() {
        var otp = $("#otp_mobile").val();
        var csrfToken =  $('input[name="_token"]').val();
        var url = "{{ route('nursery.validateMobileOtp') }}"
        var email =$.trim($("#email").val());
        if(!otp){
            Swal.fire('Enter OTP', '', 'error');
            return false;
        }
        $(".loader").show();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: url,

            data: {
                _token:csrfToken, otp:otp, email:email
            },
            success: function (response) {
            $(".loader").hide();
                if(response.status == 'success'){
                    $("#step1, #step2, .btnDiv, .submit-mbtn ").hide();
                    var nursery = response.existingNursery;
                    if(nursery != null){
                       $('select[name="district_id"]').val(nursery.district_id);
                       $('select[name="cat_of_nursery"]').val(nursery.cat_of_nursery);
                       $('select[name="type_of_nursery"]').val(nursery.type_of_nursery);
                       $('input[name="name_of_nursery"]').val(nursery.name_of_nursery);
                       $('textarea[name="address"]').val(nursery.address);
                       $('input[name="pan_private"]').val(nursery.pan_private);
                       $('input[name="reg_no_running_nursery"]').val(nursery.reg_no_running_nursery);
                    }
                    $("#step3").show();

                    Swal.fire(response.message, '', 'success');
                }else{
                    Swal.fire(response.message, '', 'error');
                    return false;
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);

            }
        })
    }

    function validateNumber(input) {
        // Remove non-numeric characters
        input.value = input.value.replace(/[^0-9]/g, '');
    }

    function saveNurseryDetails(step) {
        var csrfToken =  $('input[name="_token"]').val();
        var email =  $.trim($("#email").val());
        var mobile =$.trim($("#mobile_number").val());
        var name =$.trim($("#name").val());
        var url = "{{ route('nursery.nurseryDetails') }}";
        var formData = new FormData($('#nursery-registration-form')[0]);
        if(!email){
                Swal.fire('Enter email address', '', 'error');
                return false;
            }

            if(!isValidEmail(email)){
                Swal.fire('Enter valid email ID', '', 'error');
                return false;
            }
        // Append additional data to FormData
        formData.append('_token', csrfToken);
        formData.append('mobile_number', mobile);
        formData.append('email', email);
        formData.append('name', name);
        formData.append('step', step);
        console.log(formData,"fsdfsdfsd")
        // alert(step);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: url,
            contentType: false,
            processData: false,

            data:formData,
            beforeSend: function (request) {
                request.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            },
           success: function (response) {
                // hideLoader();
                if(step == "step3"){
                    if(response.status == 'success'){
                        $("#step3").hide();
                        $("#step4").show();
                        var nursery = response.existingNursery;
                        $('input[name="email"]').val(email).attr('readonly',true);
                        $('input[name="mobile_number"]').val(mobile).attr('readonly',true);
                    if(nursery != null){
                       $('input[name="head_pricipal"]').val(nursery.head_pricipal);
                       $('input[name="email"]').val(nursery.email);
                       $('input[name="mobile_number"]').val(nursery.mobile_number);
                       $('input[name="bank_ac"]').val(nursery.bank_ac);
                       $('input[name="bank_name"]').val(nursery.bank_name);
                       $('input[name="bank_ifc_code"]').val(nursery.bank_ifc_code);
                    }
                        Swal.fire(response.message, '', 'success');
                    }else{
                        Swal.fire(response.message, '', 'error');
                    }
                }else if(step == "step4"){
                     if(response.status == 'success'){
                        $("#step3, #step4").hide();
                        $("#step5").show();
                        var nursery = response.existingNursery;
                        if(nursery != null){
                            $('select[name="game_id"]').val(nursery.game_id);
                            $('select[name="game_disp"]').val(nursery.game_disp);
                            $('select[name="playground_hall_court_available"]').val(nursery.playground_hall_court_available);
                            $('select[name="equipment_related_to_selected_games_available"]').val(nursery.equipment_related_to_selected_games_available);
                            $('select[name="whether_nursery_will_provide_sports_kits_to_selected_players"]').val(nursery.whether_nursery_will_provide_sports_kits_to_selected_players);
                            $('select[name="whether_nursery_will_provide_fee_concession_to_selected_players"]').val(nursery.whether_nursery_will_provide_fee_concession_to_selected_players);
                            $('select[name="whether_qualified_coach_is_available_for_the_concerned_game"]').val(nursery.whether_qualified_coach_is_available_for_the_concerned_game);
                            $('select[name="whether_qualified_coach_is_available_for_the_concerned_game"]').val(nursery.whether_qualified_coach_is_available_for_the_concerned_game);
                            $('input[name=boys]').val(nursery.boys);
                            $('input[name=girls]').val(nursery.girls);
                            $('textarea[name=any_specific_achievements_of_the_institute_during_last]').val(nursery.any_specific_achievements_of_the_institute_during_last);
                        }
                        Swal.fire(response.message, '', 'success');
                    }else{
                        Swal.fire(response.message, '', 'error');
                    }
                }else if(step == "step5"){
                    if(response.status == 'success'){
                        $("#step3, #step4").hide();
                        $('#nursery-registration-form')[0].reset();
                        $("step1").show();
                        Swal.fire(response.message, '', 'success');
                        Swal.fire(response.message, '', 'success').then((result) => {

                            if (result.isConfirmed) {

                                window.location.reload();
                            }
                        });
                        return false;
                    }else{
                        Swal.fire(response.message, '', 'error');
                    }
                }
            // alert("success")
            },
           error: function (xhr, status, error) {
                console.error(status, error);

                // Access the error message directly from xhr.responseText
                var errorMessage = xhr.responseText || 'An error occurred';

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage
                });

                return false;
            }
        })
    }

      function prevStep() {
        // Determine current step
        var currentStep = $('.step:visible').attr('id').replace('step', '');
console.log(currentStep,"ccvvcsds")
        // Show previous step
        $('#step' + (parseInt(currentStep) - 1)).show();
        // Hide current step
        $('.step:not(#step' + (parseInt(currentStep) - 1) + ')').hide();
    }
    </script>
</body>

</html>
