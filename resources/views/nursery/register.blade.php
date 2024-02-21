@extends('nursery.layouts.app')

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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <!-- ================================================================================================================================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('forntend/js/bootstrap.bundle.min.js')}}"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
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
        background: rgba(0, 0, 0, 0.5);
        /* Adjust the alpha value for the desired blur effect */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 999;
        /* Adjust the z-index to ensure the loader is on top of other content */
    }

    #loading-image {
        width: 50px;
        /* Adjust the width of the loading image as needed */
        height: 50px;
        /* Adjust the height of the loading image as needed */
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #loading-image {
        width: 50px;
        /* Adjust the width of the loading image as needed */
        height: 50px;
        /* Adjust the height of the loading image as needed */
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .freeze {
        pointer-events: none;
    }

    .gen-instr h3 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .gen-instr h4 {
        color: #fff;
        font-size: 16px;
        padding: 6px 10px;
        background: #b81121;
        font-weight: 500;
        border-radius: 5px;
        display: inline-block;
        width: 50%;
        margin-bottom: 10px;
    }

    .gen-instr ul li {
        margin-bottom: 5px;
        line-height: 20px;
        font-size: 14px;
    }

    .gen-instr ul {
        margin-bottom: 20px;
    }

    .gen-instr ul li b {
        margin: 0 10px;
    }
    .star{
        color: red;
        padding: 5px;
    }
    .fontsize{
        font-size: smaller;
    }
    #guidelines{
        width: 100%;
        margin: auto;
    }

</style>
<style>
    .image-row {
        display: flex;
        flex-wrap: wrap;
    }

    .image-container {
        margin-right: 10px; /* Add margin between image containers */
    }
</style>

@if ($message = Session::get('success'))

<script>
    $(document).ready(function () {
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
    $(document).ready(function () {
        Swal.fire(
            'NURSERY MANAGEMENT SYSTEM',
            '{{ $message }}',
            'error'
        )

    });
</script>
@endif
 @if (count($errors) > 0)
dd($errors);
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <header>
                    <div class="top-header">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-sm-8 adjust-width">
                                    <ul class="select-box text-left">
                                        <li><a href="javascript:void(0)"> <i class="fa fa-envelope"></i>
                                                <span>nurserysports@gmail.com</span></a></li>

                                    </ul>

                                </div>
                                <div class="col-sm-4 no-padding-left adjust-width">
                                    <ul class="select-box text-end">
                                        <!-- <li> <a href="{{ route('general_instructions')}}">General Instructions</a></li> -->
                                        <li> <i class="fa fa-phone"></i> <span>9999378678</span></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-header pt-3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-2 col-md-2 col-sm-3 full-width">
                                    <div class="logo">
                                        <a href="{{url('/')}}"><img
                                                src="{{asset('/forntend')}}/images/department-logo.png" alt=""
                                                class="img-fluid" width="80px"></a>
                                    </div>

                                </div>
                                <div class="col-md-8 col-sm-6 half-width">
                                    <div class="consol-port text-center">
                                        <a href="{{url('/')}}">
                                            <h1 class="text-white mt-3"><span></span></h1>
                                            <strong>DEPARTMENT OF SPORTS HARYANA </strong>
                                            <h2><span>Nursery Management System</span></h2>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 d-none d-md-block text-end">
                                    <span class="float-right cm-picture-box"><img
                                            src="{{asset('/forntend')}}/images/haryana-logo.png" alt="" class="img-fluid"
                                            width="70px"></span>
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
                              
                                <form class="fontsize fw-bolder" method="post" name="form" id="nursery-registration-form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="row" id="step1">
                                         <div class="col-sm-12">
                                <h2 class="heading2 text-center pt-4">
                                Application for Sports Nursery
                                </h2>
                            </div>
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card card-primary">
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                       <!--  <h2 class="heading2 text-center">
                                                            Nursery Details

                                                        </h2> -->
                                                    </div>
                                                    <div class="mobile_number mt-4">
                                                        <label class="form-label">Enter your mobile number</label> <span class='star'>*</span>
                                                        <input type="text" name="mobile_number" pattern="[0-9]*" oninput="validateNumber(this)" class="form-control controlDiv" autocomplete="off"  maxlength="10" id="mobile_number">
                                                    </div>
                                                    <div class="row" id="otp_msg"></div>
                                                    <div class="otp_phone_html mt-2" style="display: none;">
                                                        <label class="form-label">Enter OTP</label> <span class='star'>*</span>
                                                        <input type="password" name="otp_mobile" class="form-control" autocomplete="off" id="otp_mobile" maxlength="6">
                                                    </div>
                                                </div>
                                                <div class="mb-2 text-center submit-mbtn">
                                                    <button type="button" class="btn btn-danger text-right"
                                                        id="submit-mbtn" onclick="validateMobile()">Submit</button>
                                                </div>
                                                <div class="mb-2 text-center btnmdiv">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>

                                    <div class="row" id="step2" style="display: none;">
                                        <div class="font-bold m-3">Note: All fields with * are mandatory
                                        </div>
                                        <div class="card card-primary">
                                            <h5 class="text-center fs-5 mt-4">Nursery Details
                                            </h5>
                                            <div class="row card-body">
                                               
                                                <div class="col-sm-6 mt-2" >
                                                    <label class="form-label">District</label> <span class='star'>*</span>
                                                    <!-- <label for="exampleInputPassword1">District</label> <span class='star'>*</span> -->
                                                    <select class="form-control" name="district_id" id="district_id" autocomplete="off">
                                                        <option value="">-----Select------</option>
                                                        <?php foreach ($districts as $district) { ?>

                                                        <option value="{{$district['id']}}">{{$district['name']}}
                                                        </option>


                                                        <?php } ?>
                                                    </select>

                                                    @error('district_id')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Category of Nursery</label> <span class='star'>*</span>
                                                    <select class="form-select cat_of_nursery" aria-label="Default select example" name="cat_of_nursery" id="cat_of_nursery" autocomplete="off">
                                                        <option value="">-----Select-----</option>
                                                        <option value="govt">Government</option>
                                                        <option value="private">Private</option>
                                                    </select>
                                                    @error('cat_of_nursery')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Type of Nursery</label> <span class='star'>*</span>
                                                    <select class="form-select type_of_nursery" aria-label="Default select example" name="type_of_nursery" id="type_of_nursery" autocomplete="off">
                                                        <option value="">-----Select-----</option>
                                                    </select>

                                                    @error('type_of_nursery')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Name of School/Institute/Academy/Panchayat</label> <span class='star'>*</span>
                                                    <input type="text" class="form-control" name="name_of_nursery" maxlength="50" onkeypress="return /[a-zA-Z ]/i.test(event.key)" id="name_of_nursery" autocomplete="off">
                                                    @error('name_of_nursery')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                    <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Name of Head/Principal</label> <span class='star'>*</span>
                                                    <input type="text" class="form-control" name="head_pricipal" id="head_pricipal" autocomplete="off">
                                                    @error('head_pricipal')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Email</label> <span class='star'>*</span>
                                                    <input type="email" class="form-control" name="email" id="email" autocomplete="off">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Address</label> <span class='star'>*</span>
                                                    <textarea class="form-control" name="address" onkeypress = "return !/[<>]/.test(event.key)" id="address"></textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Pin Code</label> <span class='star'>*</span>
                                                    <input type="text" class="form-control" name="pin_code" id="pin_code" pattern="[0-9]*" oninput="validateNumber(this)" maxlength="6" minlength="6" autocomplete="off">
                                                    @error('pin_code')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Registration No. of Society who will be running Nursery</label> <span class='star'>*</span>
                                                    <input type="text" class="form-control" name="reg_no_running_nursery" maxlength="15" id="reg_no_running_nursery" autocomplete="off">
                                                    @error('reg_no_running_nursery')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-sm-12 text-end mb-2">
                                                 <!-- <button type="button" class="btn btn-primary"
                                                    onclick="prevStep()">Previous</button> -->
                                                <button type="button" class="btn btn-danger" id="nursery-details"
                                                    onclick="saveNurseryDetails('step2')">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row step" id="step3" style="display: none;">
                                        <div class="font-bold m-3">Note: All fields with * are mandatory
                                        </div>
                                        <div class="card card-primary">
                                            <h5 class="text-center fs-5 mt-4">Game Details
                                            </h5>
                                            
                                            <div class="row card-body">
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Game Applying For</label> <span class='star'>*</span>

                                                    <select class="form-select" name="game_id" id="game_id">
                                                    <option value="">-----Select-----</option>

                                                        <?php foreach ($games as $game) { ?>

                                                        <option value="{{$game['id']}}">{{$game['name']}}</option>


                                                        <?php } ?>
                                                    </select>

                                                    @error('game_id')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Sports Game Discipline(Gender)</label> <span class='star'>*</span>
                                                    <select class="form-control game_discipline" name="game_disp" id="game_disp">
                                                        <option value="">-----Select-----</option>
                                                        <option value="girls">Girls</option>
                                                        <option value="boys">Boys</option>
                                                        <option value="mix">Mix</option>
                                                    </select>
                                                    @error('game_disp')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                   
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Playground/Hall/Court available</label> <span class='star'>*</span>
                                                    <select class="form-select playground_nursery @error('playground_hall_court_available') is-invalid @enderror" aria-label="Default select example" name="playground_hall_court_available" id="playground_hall_court_available">
                                                        <option value="">-----Select-----</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>


                                                    @error('playground_hall_court_available')

                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Equipment related to selected Games available</label> <span class='star'>*</span>
                                                    <select class="form-select equipment_nursery" aria-label="Default select example" name="equipment_related_to_selected_games_available" id="equipment_related_to_selected_games_available">
                                                        <option value="">-----Select-----</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>

                                                    @error('equipment_related_to_selected_games_available')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                               
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Whether qualified coach is available for the concerned game?</label> <span class='star'>*</span>
                                                    <select class="form-select coach_available" aria-label="Default select example" name="whether_qualified_coach_is_available_for_the_concerned_game" id="coach_available">
                                                        <option value="">-----Select-----</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>

                                                    @error('whether_qualified_coach_is_available_for_the_concerned_game')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                               
                                                <div class="col-sm-6 mb-3 name_coach " style="display : none;">
                                                    <label class="form-label">Name of Coach</label> <span class='star'>*</span>
                                                    <input type="text" class="form-control" name="coach_name" id="coach_name" autocomplete="off">

                                                    @error('coach_name')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 qualification_coach" style="display : none;">
                                                    <label class="form-label">Highest Qualification of Coach</label> <span class='star'>*</span>
                                                     <select class="form-select" name="coach_qualification" id="coach_qualification">
                                                    <option value="">-----Select-----</option>

                                                        <?php foreach ($coach_qualification as $qualification) { ?>

                                                        <option value="{{$qualification['id']}}">{{$qualification['name']}}</option>


                                                        <?php } ?>
                                                    </select>

                                                    @error('coach_qualification')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                   
                                                </div>
                                                <div class="col-sm-6 mt-2 gender" style="display : none;">
                                                    <label class="form-label">No. of students playing concerned
                                                        games</label> <span class='star'>*</span>
                                                    <div class="row">
                                                        <div class="col-sm-3 boys" style="display : none;"><label class="form-label">Number of Boys</label></div>
                                                        <div class="col-sm-3 boys" style="display : none;">
                                                            <!-- <label class="form-label">Boys</label> <span class='star'>*</span> -->
                                                            <input type="number" class="form-control" name="boys" id="boys">

                                                            @error('boys')
                                                            <span class="invalid-feedback" role="alert"
                                                                style="display : block;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                         <div class="col-sm-3 girls" style="display : none;"><label class="form-label">Number of Girls</label></div>
                                                        <div class="col-sm-3 girls" style="display : none;">
                                                           <!--  <label class="form-label">Girls</label> <span class='star'>*</span> -->
                                                            <input type="number" class="form-control" name="girls" id="girls">

                                                            @error('girls')
                                                            <span class="invalid-feedback" role="alert"
                                                                style="display : block;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Highest Achievement of Players</label> <span class='star'>*</span>
                                                    <select class="form-select" aria-label="Default select example" name="any_specific_achievements_of_the_institute_during_last" id="highest_achievement">
                                                        <option value=""> -----Select----- </option>
                                                        <option value="beginner">Beginner level</option>
                                                        <option value="district">District Level</option>
                                                        <option value="state">State Level</option>
                                                        <option value="national">National Level</option>
                                                        <option value="international">International Level</option>
                                                    </select>
                                                    @error('any_specific_achievements_of_the_institute_during_last')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                               
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Whether sports nursery was allotted in earlier years?</label> <span class='star'>*</span>
                                                    <!-- <label for="exampleInputPassword1">District</label> <span class='star'>*</span> -->
                                                    <select class="form-control already_running_nursery" name="already_running_nursery" id="already_running_nursery">
                                                       <option value="">-----Select------</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>

                                                    @error('already_running_nursery')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 year_allotment" style="display: none;">
                                                    <label class="form-label">Year of Allotment</label> <span class='star'>*</span>
                                                    <select class="form-control" name="year_allotment" id="year_allotment">
                                                       <option value="">-----Select------</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                    </select>
                                                </div>
                                                 <div class="col-sm-6 mb-3 game_previous" style="display: none;">
                                                    <label class="form-label">Game (Previous)</label> <span class='star'>*</span>

                                                    <select class="form-select" name="game_previous_id" id="game_previous_id">
                                                    <option value="">-----Select-----</option>

                                                        <?php foreach ($games as $game) { ?>

                                                        <option value="{{$game['id']}}">{{$game['name']}}</option>


                                                        <?php } ?>
                                                    </select>

                                                    @error('game_id')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 discipline_previous" style="display: none;">
                                                    <label class="form-label">Sports Game Discipline (Previous)</label> <span class='star'>*</span>
                                                    <select class="form-control" name="game_disp_previous" id="game_disp_previous">
                                                        <option value="">-----Select-----</option>
                                                        <option value="girls">Girls</option>
                                                        <option value="boys">Boys</option>
                                                        <option value="mix">Mix</option>
                                                    </select>
                                                    @error('game_disp')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Whether Nursery will provide Sports kits to selected players?</label> <span class='star'>*</span>
                                                    <select class="form-select" aria-label="Default select example" name="whether_nursery_will_provide_sports_kits_to_selected_players" id="sports_kit">
                                                        <option value="">-----Select-----</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>

                                                    @error('whether_nursery_will_provide_sports_kits_to_selected_players')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                 <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Whether School/Institue/Academy will provide fee concession to selected players?</label> <span class='star'>*</span>
                                                    <select class="form-select fee_concession" aria-label="Default select example" name="whether_nursery_will_provide_fee_concession_to_selected_players" id="fee_concession">
                                                        <option value=""> -----Select----- </option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>

                                                    @error('whether_nursery_will_provide_fee_concession_to_selected_players')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 percentage_fee_concession" style="display: none;">
                                                    <label class="form-label">Percentage of Fee Concession</label> <span class='star'>*</span>
                                                   <input type="number" class="form-control" name="percentage_fee" id="percentage_fee">
                                                   <!-- validation 0 to 100  -->
                                                    @error('percentage_fee')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                         
                                             
                                            
                                                </div>
                                            <div class="col-sm-12 text-end mb-2">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="prevStep()">Previous</button>
                                                <button type="button" class="btn btn-danger" id="game-detail"
                                                    onclick="saveNurseryDetails('step3')">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row step" id="step4" style="display: none;">
                                        <div class="font-bold m-3">Note: All fields with * are mandatory
                                        </div>
                                        <div class="card card-primary">
                                            <h5 class="text-center fs-5 mt-4">Upload Documents
                                            </h5>
                                            
                                            <div class="row card-body">
                                                <div class="col-sm-6 mb-3" id="playground_media" style="display : none;">
                                                    <label class="form-label">Upload 3 Photographs of Playground/Hall/Court (Images to be uploaded duly signed with date by HOD /Principal) <span class='star'>File Type (.jpg, .png, .jpeg only) Max Upload Size (300 KB total)</span></label> <span class='star'>*</span>
                                                    <div id="playgroundDropzone" class="dropzone">
                                                        <div class="dz-message" data-dz-message>
                                                          <span>Drop files here or click to upload.</span>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" name="playground_images[]" id="playground_images">
                                                    <span class="star" id="playgroundmessage"></span>
                                                    @error('playground_images')
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->playground_images as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @enderror

                                                <div id="selectedPlaygroundImages" class="image-row mt-4"></div>
                                                </div>
                                                <div class="col-sm-6 mb-3" id="equipment_media" style="display : none;">
                                                    <label class="form-label">Upload 3 Photographs of Equipment(Images to be uploaded duly signed with date by HOD /Principal) <span class='star'>File Type (.jpg, .png, .jpeg only) Max Upload Size (300 KB total)</span></label> <span class='star'>*</span>
                                                    <!-- <input type="file" class="form-control" multiple name="equipment_images[]" id="equipment_images" accept=".jpg, .jpeg, .png"> -->
                                                    <div id="equipmentDropzone" class="dropzone">
                                                        <div class="dz-message" data-dz-message>
                                                          <span>Drop files here or click to upload.</span>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" name="equipment_images[]" id="equipment_images">
                                                    <span class="star" id="equipmentmessage"></span>
                                                    @error('equipment_images')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div id="selectedEquipmentImages" class="image-row mt-4"></div>
                                                </div>
                                                <div class="col-sm-6 mb-3 player_list" id="player_list" style="display : none;">
                                                    <label class="form-label">Attach list of players with achievement <span class='star'>File Type (.jpg, .png, .jpeg, .csv only) Max Upload Size (100 KB)</span></label> <span class='star'>*</span>
                                                    <div id="playerListDropzone" class="dropzone">
                                                        <div class="dz-message" data-dz-message>
                                                          <span>Drop file here or click to upload.</span>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" name="player_list" id="player_list_file">
                                                    <span class="star" id="playerlistmessage"></span>
                                                    @error('player_list')
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->player_list as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                    
                                                </div>
                                                <div class="col-sm-6 mb-3 coach_certificate" style="display : none;">
                                                    <label class="form-label">Coach Qualification Certificate <span class='star'>File Type (.jpg, .png, .jpeg only) Max Upload Size (100 KB)</span></label> <span class='star'>*</span>
                                                    <div id="coachCertificateDropzone" class="dropzone">
                                                        <div class="dz-message" data-dz-message>
                                                          <span>Drop file here or click to upload.</span>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" name="coach_certificate" id="coach_certificate">
                                                    <span class="star" id="coachcertificatemessage"></span>
                                                    @error('coach_certificate')
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->coach_certificate as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 panchayat_media" style="display : none;">
                                                    <label class="form-label">Panchayat Certificate <span class='star'>File Type (.jpg, .png, .jpeg only) Max Upload Size (100 KB)</span></label> <span class='star'>*</span>
                                                    <div id="panchayatDropzone" class="dropzone">
                                                        <div class="dz-message" data-dz-message>
                                                          <span>Drop file here or click to upload.</span>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" name="panchayat_certificate" id="panchayat_certificate">
                                                    <span class="star" id="panchayatcertificatemessage"></span>
                                                    @error('panchayat_certificate')
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->panchayat_certificate as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-check mb-3">
                                                  <input class="form-check-input" type="checkbox" id="flexCheckChecked">
                                                  <label class="form-check-label fw-normal" for="flexCheckChecked">
                                                   I undertake that Sports Nursery allotted against the present application shall be operated as per terms and conditions issued by the Sports Department, Government of Haryana. In case our School/Institute/Academy is found violating any instructions, the Government shall be free to take any administrative/civil/criminal action against us.
                                                  </label>
                                                </div>
                                                <div class="col-sm-12 text-end mb-2">
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="prevStep()">Previous</button>
                                                    <button type="button" class="btn btn-danger" id="final_submit"
                                                        onclick="saveNurseryDetails('step4')">Next</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row" id="guidelines" style="display: none;">
                        <div class="col-sm-12">
                            <h2 class="heading2 text-center pt-4">
                                Nursery Registration Guidelines
                                                        </h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="gen-instr">
                                <h4>Guidelines</h4>
                                <ul>
                                    <li><a href="{{ env('APP_URL')}}/sports_guidelines_2024.pdf" target="_blank">Click here</a> to view and download detailed guidelines published by Department of Sports</li>
                                   
                                </ul>
                            </div>

                            <div class="gen-instr">
                                <h4>खेल नर्सरी आवेदक स्कूल/संस्थानों के लिए आवश्यक पात्रता मानदण्ड:</h4>
                                <ul>
                                    <li>क)  खेल नर्सरी हेतु कोई भी सरकारी/निजि शिक्षण संस्थान तथा पंजीकृत निजि खेल संस्थान (निजि खेल अकादमी, निजि खेल प्रशिक्षण केन्द्र आदि) आवेदन कर सकता है।</li>
                                    <li>ख) खेल नर्सरियां केवल उन्हीं खेलों में खोली जाएंगी जो खेल ऑलम्पिक, एशियन तथा कॉमन वेल्थ गेम्स में सम्मिलित है।</li>
                                    <li>ग)  आवेदक स्कूल/संस्थान के पास खेल विशेष का आधारभूत इन्फ्रास्ट्रक्चर होना अनिवार्य है।</li>
                                    <li>घ)  आवेदक स्कूल/संस्थान के पास खेल विशेष के उपकरण होना अनिवार्य है।</li>
                                    <li> ड़)  आवेदक संस्थान के पास खेल विशेष का योग्य प्रशिक्षक होना अनिवार्य है। खेल नर्सरी में प्रशिक्षक की नियुक्ति खेल नर्सरी हिदायताुनसार संबंधित स्कूल/संस्थान द्वारा की जाएगी।</li>
                                   
                                </ul>
                            </div>
                             <div class="gen-instr">
                                <h4>खेल नर्सरी संचालन के संबंध में स्कूल/संस्थान के उतरदायित्व: </h4>
                                <ul>
                                    <li>क) खेल नर्सरी आबंटित स्कूल/संस्थान खेल नर्सरी के किसी भी खिलाड़ी से फिस नहीं लेगा, यदि संबंधित संस्थान ऐसा करता पाया जाता है तो संबंधित संस्थान की खेल नर्सरी बंद कर दी जाएगी तथा विभाग द्वारा उसके विरूद्ध कानूनी कार्यवाही अमल में लाई जाएगी।</li>
                                    <li>ख)  संबंधित संस्थान द्वारा नर्सरी के खिलाड़ियों को दी जाने वाली फिस में रियायतों व सुविधाओं की सूचना डिस्पले की जानी आवश्यक है।</li>
                                    <li>ग) खेल नर्सरी में खिलाड़ियों का चयन ऑपन ट्रायल के आधार पर निष्पक्ष किया जाएगा।</li>
                                    <li>घ)  प्रधानाचार्य/संस्थान के मुखिया द्वारा खेल नर्सरी के बच्चों एवं प्रशिक्षक की हाजिरी के लिए हाजिरी रजिस्टर मेनटेन किया जाएगा जिसमें सभी बच्चों व प्रशिक्षक का फोटोग्राफ लगाया जाएगा तथा फोटोग्राफ की एक प्रति जिला खेल अधिकारी को भेजी जाएगी।</li>
                                    <li> ड़)  स्कूल/संस्थान द्वारा नियमित रूप से खिलाड़ियों और प्रशिक्षक की हाजरी लगाई जाएगी तथा प्रशिक्षक के आवकाश लेने पर इसकी सूचना संबंधित जिला खेल अधिकारी को दी जाएगी।</li>
                                    <li> च)  स्कूल/संस्थान द्वारा नर्सरी में चयनित खिलाड़ियों को स्पोर्टस किट प्रदान किए जाएंगे।</li>
                                    <li> छ)  प्रशिक्षक खेल नर्सरी के खिलाड़ियों को प्रशिक्षण देने के लिए शैड्यूल निर्धारित करेगा जिसकी एक प्रति प्रशिक्षक हाजिरी रजिस्टर के साथ रखेगा ताकि निरीक्षण अधिकारी द्वारा उसी अनुसार निरीक्षण किया जा सके तथा शैड्यूल की एक प्रति प्रधानाचार्य/संस्थान के मुखिया के माध्यम से जिला खेल अधिकारी को भेजेगा।</li>
                                    <li> ज)  प्रधानाचार्य/संस्थान का मुखिया यह सुनिश्चित करेगा कि स्कूल के द्वारा जिस प्रशिक्षक का प्रबंध किया गया है केवल वही प्रशिक्षक खिलाड़ियों को सुबह व सायं निर्धारित समय में प्रशिक्षण देगा।</li>
                                   
                                </ul>
                            </div>
                            <div class="gen-instr">
                                <h4>खेल नर्सरी संचालन के संबंध में अन्य आवश्यक दिशा-निर्देंश: </h4>
                                <ul>
                                    <li> क)  प्रत्येक खेल नर्सरी का कार्यकाल 1 अप्रैल से लेकर 31 जनवरी तक रहेगा।</li>
                                    <li> ख) खेल नर्सरी आबंटित संस्थान जिला खेल अधिकारी की निगरानी में खेल नर्सरी में 8 से 19 वर्ष आयु वर्ग के खिलाड़ियों के चयन हेतु खेल और शारीरिक योग्यता परीक्षा/खेल परीक्षा आयोजित करेगा।</li>
                                    <li>ग)  प्रत्येक नर्सरी में न्यूनतम 20 तथा अधिकतम 25 खिलाड़ी होंगें, साथ ही प्रतीक्षा सूचि में 10 खिलाड़ी रखे जाएंगें। यदि कोई खिलाड़ी किसी कारणवश किसी भी समय खेल नर्सरी छोड़ता है तो परिणामी रिक्ति को वरिष्ठता क्रम के आधार पर प्रतिक्षा सूची से भरा जाएगा। यदि खेल नर्सरी में किसी भी समय खिलाड़ियों की संख्या 20 से कम हो जाती है तो नर्सरी को बंद कर दिया जाएगा।</li>
                                    <li>घ)  प्रत्येक खिलाड़ी के प्रतिमाह कम से कम 22 दिन हाजिर होने पर 8 से 14 वर्ष आयु वर्ग हेतु 1,500/- रुपए तथा 15 से 19 वर्ष आयु वर्ग के खिलाड़ियों को 2,000/- रूपये प्रति माह की दर से छात्रवृत्ति प्रदान की जाएगी।</li>
                                    <li>ड़)  चयनित संस्थानों को खेल नर्सरी हेतू एक प्रशिक्षक का मासिक मानदेय (शैक्षणिक योग्तया अनुसार 20,000/- रूपये अथवा 25,000/-रूपये प्रति माह) की दर से दिया जाएगा।</li>
                                    <li>च)  प्रशिक्षक खेल नर्सरी के खिलाड़ियों को प्रातः व सायं शैड्यूल में निर्दिष्ट समय अनुसार प्रशिक्षण देगा।    प्रातःकालीन सैशन कम से कम 2 घण्टे (05ः30 से 09ः00 बजे के बीच) तथा सायंकालीन सैशन कम से कम 3 घण्टे (03ः00 से 08ः00 बजे के बीच) का होगा। जिसकी एक प्रति संबंधित संस्थान के प्रधानाचार्य/मुखिया द्वारा जिला खेल अधिकारी को भेजी जाएगी। </li>
                                    <li>छ) खेल विभाग को खेल नर्सरी संचालन के दिशा-निर्देंशों की उल्लंघना के मामले में छा़त्रवृति और प्रशिक्षकों का मानदेय वापिस लेने का अधिकार होगा।</li>
                                    <li>ज)  संस्थान द्वारा खेल नर्सरी के दिशा-निर्देंश/शर्तों की कोई भी उल्लघंना करने पर उसे कोई वितीय सुविधा नहीं दी जाएगी तथा नर्सरी को तुरन्त रद्द कर दिया जाएगा। खेल नर्सरी को चलाने में शर्तों की उल्लंघना व किसी भी प्रकार की अनियमितता पाए जाने पर संस्थान का मुखिया स्वयं जिम्मेदार होगा।</li>
                                    <li>झ)  खेल नर्सरी योजना का उद्धेश्य संस्थानों में खेलों के बुनियादी ढ़ाचे/सुविधाओं का उपयोग करके जमीनी स्तर पर खेलों को लोकप्रिय बनाना है। विभाग में बजट की उपलब्धता के आधार पर ही इसे लागू किया जाएगा। यह किसी भी संस्था या खिलाड़ी पर किसी भी प्रकार के अधिकार की पुष्टि नहीं करता।
                                    अधिक जानकारी के लिए विभागीय खेल नर्सरी दिशा निर्देशों का अध्ययन करे।</li>
                                   
                                </ul>

                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="terms_conditions">
                            <label class="form-check-label fw-normal mt-1" for="terms_conditions">
                                I accept and agree to abide by the terms and conditions of the above policy.
                            </label>
                        </div>
                        <div class="col-sm-12 text-end mb-2">
                           
                            <button type="button" class="btn btn-danger"
                                onclick="checkTermsConditions()">Next</button>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
 
<script>
    Dropzone.autoDiscover = false;
    // Common configuration options for Dropzone
    let commonOptions = {
        url: "{{ route('nursery.fileUpload') }}",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        resizeQuality: 1.0,
        addRemoveLinks: true,
        timeout: 60000,
        dictDefaultMessage: "Drop your files here or click to upload",
        dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
    };
    // Initialize Dropzone for playground
    let playgroundDropzone = initDropzone("#playgroundDropzone", "playgroundfile", "#playgroundmessage", "#playground_images", 3, 0.3,'jpg', 'jpeg', 'png');

    // Initialize Dropzone for equipment
    let equipmentDropzone = initDropzone("#equipmentDropzone", "equipmentfile", "#equipmentmessage", "#equipment_images", 3, 0.3, 'jpg', 'jpeg', 'png');

    // Initialize Dropzone for player list
    let playerListDropzone = initDropzone("#playerListDropzone", "playerListFile", "#playerlistmessage", "#player_list_file", 1, 0.1, 'jpg', 'jpeg', 'png', 'csv');
    
    // Initialize Dropzone for Coach list
    let coachCertificateDropzone = initDropzone("#coachCertificateDropzone", "coachCertificateFile", "#coachcertificatemessage", "#coach_certificate", 1, 0.1, 'jpg', 'jpeg', 'png');

    // Initialize Dropzone for player list
    let panchayatDropzone = initDropzone("#panchayatDropzone", "panchayatCertificateFile", "#panchayatcertificatemessage", "#panchayat_certificate", 1, 0.1, 'jpg', 'jpeg', 'png');


    // Function to initialize Dropzone
    function initDropzone(dropzoneId, paramName, messageSelector, imagesInputSelector, maxFiles, maxFileSize, ...validFiles) {
        let acceptedFiles = validFiles.map(element => '.'+element);
        let validationError = false

        return new Dropzone(dropzoneId, {
            ...commonOptions,
            maxFilesize: maxFileSize, // MB
            maxFiles: maxFiles,
            paramName: paramName,
            acceptedFiles: acceptedFiles.toString(),
            dictFileTooBig: "File is too big. Max filesize: "+maxFileSize* 1000+"KB.",
            dictMaxFilesExceeded: "You can only upload up to " + maxFiles + " files.",
            dictInvalidFileType: "Invalid file type. Only "+validFiles.toString()+" files are allowed.",
            sending: function (file, xhr, formData) {
                $(messageSelector).text('File Uploading...');
            },
            success: function (file, response) {
                $(messageSelector).text('File Uploaded');
                $(imagesInputSelector).val(function (index, value) {
                    return value + (value ? ',' : '') + response;
                });
                file.filePath = response;
            },
            error: function (file, response) {
                if (file.size > this.options.maxFilesize * 1024 * 1024 || response.includes('jpeg') || response.includes('jpg') || response.includes('png') || response.includes('csv') || this.files.length > this.options.maxFiles) {
                    validationError = true
                    this.removeFile(file);
                }
                $(messageSelector).text(response);
                return false;
            },
            init: function () {
                this.on("removedfile", function (file) {
                    if(!validationError){
                        $(messageSelector).text('File Removing...');
                        $.ajax({
                            url: "{{route('nursery.fileRemove')}}",
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            data: {filePath: file.filePath},
                            success: function (response) {
                                let images = $(imagesInputSelector).val().split(",");
                                let index = images.indexOf(file.filePath);
                                if (index !== -1) {
                                    images.splice(index, 1);
                                    $(imagesInputSelector).val(images.toString());
                                }
                            },
                            error: function (xhr, status, error) {
                            }
                        });
                        $(messageSelector).text('File Removed');
                    }else{
                        validationError =  false
                    }
                });
            }
        });
    }
</script>
<script>
        $(document).ready(function() {

            $('.cat_of_nursery').on('change', function() {
                var selectedCat = $(this).val();
                var typeCatCategory = $('.type_of_nursery');

                typeCatCategory.empty();

                if (selectedCat === 'govt') {
                    typeCatCategory.append('<option value="">-----Select-----</option>');
                    typeCatCategory.append('<option value="govt_school">Govt. School</option>');
                    typeCatCategory.append('<option value="panchayat">Panchayat</option>');
                } else if (selectedCat === 'private') {
                    typeCatCategory.append('<option value="">-----Select-----</option>');
                    typeCatCategory.append('<option value="pvt_school">Private School</option>');
                    typeCatCategory.append('<option value="pvt_institute">Private Institute/Academy</option>');
                }
            });
            
            $('.game_discipline').change(function(){
                var selectedOption = $(this).val();
                // alert(selectedOption);
                $('.gender, .player_list').show();
                if(selectedOption === "mix") {
                    $(".boys, .girls").show();
                }else if(selectedOption === "girls"){
                     $(".boys").hide();
                     $(".girls").show();
                }else if(selectedOption === "boys"){
                     $(".girls").hide();
                     $(".boys").show();
                }
            });
            $('.playground_nursery').change(function(){
                  
                    var selectedOption = $(this).val();
                    if(selectedOption === 'yes'){
                        $("#playground_media").show();
                    }else{
                        $("#playground_media").hide();
                    }
            });
            $('.equipment_nursery').change(function(){
                  
                    var selectedOption = $(this).val();
                    if(selectedOption === 'yes'){
                        $("#equipment_media").show();
                    }else{
                        $("#equipment_media").hide();
                    }
             });
            $('.coach_available').change(function(){
                    var selectedOption = $(this).val();
                  // alert(selectedOption)
                    if(selectedOption === 'yes'){
                        $(".name_coach, .qualification_coach, .coach_certificate").show();
                    }else{
                        $(".name_coach, .qualification_coach, .coach_certificate").hide();
                    }
             });
            $('.fee_concession').change(function(){
                    var selectedOption = $(this).val();
                  // alert(selectedOption)
                    if(selectedOption === 'yes'){
                        $(".percentage_fee_concession").show();
                    }else{
                        $(".percentage_fee_concession").hide();
                    }
             });
              $('.already_running_nursery').change(function(){
                    var selectedOption = $(this).val();
                  // alert(selectedOption)
                    if(selectedOption === 'yes'){
                        $(".game_previous, .discipline_previous, .year_allotment").show();
                    }else{
                        $(".game_previous, .discipline_previous, .year_allotment").hide();
                    }
             });    

              $('.type_of_nursery').change(function(){
                    var selectedOption = $(this).val();
                    if(selectedOption === 'panchayat'){
                        $(".panchayat_media").show();
                    }else{
                        $(".panchayat_media").hide();
                    }
              })
  //              $('#type_of_nursery').on('blur', function() {
  //   var selectedValue = $(this).val();
  //   if (selectedValue === "") {
  //     alert("Please select a nursery type");
  //   }
  // });      
        });
    
    // Function to validate email format
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateNumber(input) {
        // Remove non-numeric characters
        input.value = input.value.replace(/[^0-9]/g, '');
    }

    function validateMobile() {
        var csrfToken =  $('input[name="_token"]').val();
        var mobile =$.trim($("#mobile_number").val());
        var minLength = 10;
        if (mobile.length < minLength) {
            Swal.fire('Enter valid mobile number', '', 'error');
            return false;
        }
        var url = "{{ route('nursery.validateNumber') }}"
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
                _token: csrfToken, mobile: mobile
            },
            success: function (response) {
                $(".loader").hide();
                console.log(response, "rrrr")
                var msg = response.message
                if(response.success == true){
                $(".mobile_number").hide();
                $(".otp_phone_html").show();
                $(".submit-btn, .btnDiv, .mobile-div, #submit-mbtn ").hide();
                $(".controlDiv").addClass('freeze');
                $(".btnmdiv").html(response.html);
                $("#otp_msg").html('<div class="col-sm-12 text-center"><h2 class="otp_msg"> OTP Sent to your mobile No.' + mobile +'</h2></div></div>');
                Swal.fire({title: msg,
                            icon: 'success',
                             customClass: {title: 'fs-5'}
                        });
                return false;
            }else{
                Swal.fire(msg, '', 'error');
                return false;
            }

            }
        })
    }
    

        function validateMobileOTP() {
            var otp = $("#otp_mobile").val();
            var csrfToken = $('input[name="_token"]').val();
            var url = "{{ route('nursery.validateMobileOtp') }}"
            var mobile = $.trim($("#mobile_number").val());
            if (!otp) {
                Swal.fire('Enter OTP', '', 'error');
                return false;
            }
            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,

                data: {
                    _token: csrfToken, otp: otp, mobile: mobile
                },
                success: function (response) {
                    $(".loader").hide();
                    if (response.status == 'success') {
                        $("#step1, .btnDiv, .submit-mbtn ").hide();
                        var nursery = response.existingNursery;
                        // if (nursery != null) {
                        //     $('select[name="district_id"]').val(nursery.district_id);
                        //     $('select[name="cat_of_nursery"]').val(nursery.cat_of_nursery);
                        //     $('select[name="type_of_nursery"]').val(nursery.type_of_nursery);
                        //     $('input[name="name_of_nursery"]').val(nursery.name_of_nursery);
                        //     $('textarea[name="address"]').val(nursery.address);
                        //     // $('input[name="pan_private"]').val(nursery.pan_private);
                        //     $('input[name="reg_no_running_nursery"]').val(nursery.reg_no_running_nursery);
                        //     $('input[name="head_pricipal"]').val(nursery.head_pricipal);
                        //     $('input[name="email"]').val(nursery.email);
                        // }
                        // $("#step2").show();
                        $("#guidelines").show();

                        Swal.fire({title: response.message,
                            icon: 'success',
                             customClass: {title: 'fs-5'}
                        });
                    } else {
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

        function checkTermsConditions() {
            if(!$("#terms_conditions").prop('checked')){
                Swal.fire('Accept Terms and Conditions ', '', 'error');
                return false;
            }else{
            var mobile = $.trim($("#mobile_number").val());
            var url = "{{ route('getnurseryData') }}"
            var csrfToken = $('input[name="_token"]').val();

            $(".loader").hide();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                data: {
                    _token: csrfToken, mobile: mobile
                },
                success: function (response) {
                    $(".loader").hide();
                    if (response.status == 'success') {
                        // $("#step1, .btnDiv, .submit-mbtn ").hide();
                        var nursery = response.isRecordExist;
                        if (nursery != null) {
                            $('select[name="district_id"]').val(nursery.district_id);
                            $('select[name="cat_of_nursery"]').val(nursery.cat_of_nursery);
                            $('#cat_of_nursery').trigger('change');
                            $('select[name="type_of_nursery"]').val(nursery.type_of_nursery);
                            $('input[name="name_of_nursery"]').val(nursery.name_of_nursery);
                            $('textarea[name="address"]').val(nursery.address);
                            // $('input[name="pan_private"]').val(nursery.pan_private);
                            $('input[name="reg_no_running_nursery"]').val(nursery.reg_no_running_nursery);
                            $('input[name="head_pricipal"]').val(nursery.head_pricipal);
                            $('input[name="email"]').val(nursery.email);
                            $('input[name="pin_code"]').val(nursery.pin_code);
                        }
                        $("#step2").show();
                        $("#guidelines").hide();
                        // $("#step2").show();
                        // $("#guidelines").show();

                        // Swal.fire({title: response.message,
                        //     icon: 'success',
                        //      customClass: {title: 'fs-5'}
                        // });
                    } else {
                        Swal.fire(response.message, '', 'error');
                        return false;
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);

                }
            })
            }
        }


        function saveNurseryDetails(step) {
            var csrfToken = $('input[name="_token"]').val();
            var url = "{{ route('nursery.nurseryDetails') }}";
            var email = $.trim($("#email").val());
            var mobile = $.trim($("#mobile_number").val());
            var name = $.trim($("#name").val());
            var formData = new FormData($('#nursery-registration-form')[0]);
            let images = ''

            formData.append('_token', csrfToken);
            formData.append('mobile_number', mobile);
            formData.append('email', email);
            formData.append('name', name);
            formData.append('step', step);

             if(step == "step2"){
                          var district_id = $("#district_id").val();
                        if(! district_id){
                            Swal.fire('Select District Name', '', 'error');
                            return false;
                        }
                        var cat_of_nursery = $("#cat_of_nursery").val();
                        if(! cat_of_nursery){
                            Swal.fire('Select Category of Nursery', '', 'error');
                            return false;
                        }
                        var type_of_nursery = $("#type_of_nursery").val();
                        if(! type_of_nursery){
                            Swal.fire('Select Type of Nursery', '', 'error');
                            return false;
                        }
                        var nurseryName = $("#name_of_nursery").val();
                        if(! nurseryName){
                            Swal.fire('Enter Name of the Nursery', '', 'error');
                            return false;
                        }
                        var head_pricipal = $("#head_pricipal").val();
                        if(! head_pricipal){
                            Swal.fire('Enter Name of the Principal', '', 'error');
                            return false;
                        } 
                        var address = $("#address").val();
                        if(! address){
                            Swal.fire('Enter Address', '', 'error');
                            return false;
                        }
                        var pin_code = $("#pin_code").val();
                        if(! pin_code){
                            Swal.fire('Enter Pincode', '', 'error');
                            return false;
                        }
                        var reg_no_running_nursery = $("#reg_no_running_nursery").val();
                        if(! reg_no_running_nursery){
                            Swal.fire('Enter Registration Number', '', 'error');
                            return false;
                        }
                        if (!email) {
                            Swal.fire('Enter email address', '', 'error');
                            return false;
                        }
                        if (!isValidEmail(email)) {
                            Swal.fire('Enter valid email ID', '', 'error');
                            return false;
                        }
                    }
                    if(step == "step3")
                    {
                        // $(".loader").show();
                        var game_id = $("#game_id").val();
                        if(! game_id){
                            Swal.fire('Select Game', '', 'error');
                            return false;
                        }
                        var game_disp = $("#game_disp").val();
                        if(! game_disp){
                            Swal.fire('Select Game Discipline', '', 'error');
                            return false;
                        }
                        if(game_disp == 'boys'){
                            if(! $("#boys").val()){
                                Swal.fire('Select Number of Boys', '', 'error');
                                return false;
                            }
                        }else if(game_disp == 'girls'){
                            if(! $("#girls").val()){
                                Swal.fire('Select number of Girls', '', 'error');
                                return false;
                            }
                        }else{
                            if(! $("#girls").val() && ! $("#boys").val()){
                                Swal.fire('Select number of Girls and number of Boys', '', 'error');
                                return false;
                            }
                        }
                        var playground_hall_court_available = $("#playground_hall_court_available").val();
                        if(! playground_hall_court_available){
                            Swal.fire('Select Playground available or not', '', 'error');
                            return false;
                        }
                        // if(playground_hall_court_available == 'yes'){
                        //     if(! $("#playground_images").val()){
                        //         Swal.fire('Select 3 Playground Images ', '', 'error');
                        //         return false;
                        //     }
                        //      if($("#playground_images").val() > 3){
                        //         Swal.fire('Select maximum 3 Playground Images ', '', 'error');
                        //         return false;
                        //     } 
                        //     if($("#playground_images").val() < 3){
                        //         Swal.fire('Select minimum 3 Playground Images ', '', 'error');
                        //         return false;
                        //     }
                        // }
                        var equipment_related_to_selected_games_available = $("#equipment_related_to_selected_games_available").val();
                        if(! equipment_related_to_selected_games_available){
                            Swal.fire('Select Equipment available or not', '', 'error');
                            return false;
                        }
                        // if(equipment_related_to_selected_games_available == 'yes'){
                        //     if(! $("#equipment_images").val()){
                        //         Swal.fire('Select 3 Equipment Images ', '', 'error');
                        //         return false;
                        //     }
                        //      if($("#equipment_images").val() > 3){
                        //         Swal.fire('Select maximum 3 Equipment Images ', '', 'error');
                        //         return false;
                        //     } 
                        //     if($("#equipment_images").val() < 3){
                        //         Swal.fire('Select minimum 3 Equipment Images ', '', 'error');
                        //         return false;
                        //     }
                        // }
                        var coach_available = $("#coach_available").val();
                        if(! coach_available){
                            Swal.fire('Select Coach is available or not', '', 'error');
                            return false;
                        }
                        if(coach_available == 'yes'){
                            if(! $("#coach_name").val()){
                                Swal.fire('Enter Coach Name', '', 'error');
                                return false;
                            }
                            if(! $("#coach_qualification").val()){
                                Swal.fire('Enter Coach Qualification', '', 'error');
                                return false;
                            }
                            // if(! $("#coach_certificate").val()){
                            //     Swal.fire('Enter Coach Qualification Certificate', '', 'error');
                            //     return false;
                            // }
                        }
                        var highest_achievement = $("#highest_achievement").val();
                        if(! highest_achievement){
                            Swal.fire('Select highest achievement', '', 'error');
                            return false;
                        }
                        var already_running_nursery = $("#already_running_nursery").val();
                        if(! already_running_nursery){
                            Swal.fire('Select sports nursery was allotted in earlier years?', '', 'error');
                            return false;
                        }

                        if(already_running_nursery == 'yes'){
                            if(! $("#year_allotment").val()){
                                Swal.fire('Enetr Year of Allotment', '', 'error');
                                return false;
                            }
                            if(! $("#game_previous_id").val()){
                                Swal.fire('Enetr Previous Game', '', 'error');
                                return false;
                            }
                            if(! $("#game_disp_previous").val()){
                                 Swal.fire('Enetr Game (Previous)', '', 'error');
                                return false;
                            }
                        }
                        var sports_kit = $("#sports_kit").val();
                        if(! sports_kit){
                            Swal.fire('select whether Nursery will provide Sports kits to selected players?', '', 'error');
                            return false;
                        }
                        var fee_concession = $("#fee_concession").val();
                        if(! fee_concession){
                            Swal.fire('select whether School/Institue/Academy will provide fee concession to selected players?', '', 'error');
                            return false;
                        }

                        if(fee_concession == 'yes'){
                            if(! $("#percentage_fee").val()){
                                Swal.fire('Enter Percentage', '', 'error');
                                return false;
                            }
                        }
                            if(parseInt($("#percentage_fee").val()) > 100){
                                Swal.fire('Percentage number should be less than 100', '', 'error');
                                return false;
                            }
                        var boys = parseInt($("#boys").val());
                        var girls = parseInt($("#girls").val());
                        if(boys + girls > 25 || boys > 25 || girls > 25){
                            Swal.fire('Boys and girls total count should be less than or equal to 25', '', 'error');
                            return false;
                        }

                    }
                        if(step == "step4"){
                            if(! $("#flexCheckChecked").prop('checked')){
                                Swal.fire('Accept Terms and Conditions ', '', 'error');
                                return false;
                            }
                        }
            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                contentType: false,
                processData: false,

                data: formData,
                beforeSend: function (request) {
                    request.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    // $(".loader").hide();
                },
                success: function (response) {
                    $(".loader").hide();
                    // $('input, select, textarea').removeClass('is-invalid is-valid').addClass('is-valid');
                    if(step == "step2") {
                        if (response.status == 'success') {
                        var nursery = response.isRecordExist;
                        if (nursery != null) {
                            $('input[name="head_pricipal"]').val(nursery.head_pricipal);
                            $('input[name="email"]').val(nursery.email);
                            $('select[name="game_id"]').val(nursery.game_id);

                            $('select[name="game_disp"]').val(nursery.game_disp);
                            $('.game_discipline').trigger('change');

                            $('select[name="playground_hall_court_available"]').val(nursery.playground_hall_court_available);
                            $('.playground_nursery').trigger('change');

                            $('select[name="equipment_related_to_selected_games_available"]').val(nursery.equipment_related_to_selected_games_available);
                            $('.equipment_nursery').trigger('change');

                            $('select[name="whether_nursery_will_provide_sports_kits_to_selected_players"]').val(nursery.whether_nursery_will_provide_sports_kits_to_selected_players);
                            
                            $('select[name="whether_qualified_coach_is_available_for_the_concerned_game"]').val(nursery.whether_qualified_coach_is_available_for_the_concerned_game);
                            $('.coach_available').trigger('change');
                            $('#coach_name').val(nursery.coach_name)
                            $('#coach_qualification').val(nursery.coach_qualification)
                            
                            $('select[name="whether_nursery_will_provide_fee_concession_to_selected_players"]').val(nursery.whether_nursery_will_provide_fee_concession_to_selected_players);
                            $('.fee_concession').trigger('change');

                            $('.already_running_nursery').val(nursery.already_running_nursery)
                            $('.already_running_nursery').trigger('change')
                            

                            $('#percentage_fee').val(nursery.percentage_fee)
                            $('input[name=boys]').val(nursery.boys);
                            $('input[name=girls]').val(nursery.girls);
                            $('select[name="year_allotment"]').val(nursery.year_allotment);
                            $('select[name="game_previous_id"]').val(nursery.game_previous_id);
                            $('select[name="game_disp_previous"]').val(nursery.game_descipline_previous);
                            $('select[name=any_specific_achievements_of_the_institute_during_last]').val(nursery.any_specific_achievements_of_the_institute_during_last);
                            }

                            $("#step2").hide();
                            $("#step3").show();
                        } else {
                            console.log(response,"errorMessage");
                            // alert("errstep2")
                            Swal.fire(response.message, '', 'error');
                            return false;
                        }
                    }else if(step == "step3") {
                        if(response.status == 'success'){
                            $("#step3").hide();
                            $("#step4").show();
                            // Swal.fire({title: response.message,
                            //     icon: 'success',
                            //     customClass: {title: 'fs-5'}
                            // }).then((result) => {

                            //         if (result.isConfirmed) {
                            //            window.location.href = '{{ route('login')}}';
                            //         }
                            //     });
                            //     return false;
                        }else{
                            // alert("statmenterrormessage")
                            Swal.fire(response.message, '', 'error');
                            return false;
                        }
                    }else if(step == "step4"){
                        if(response.status == 'success'){
                            Swal.fire({title: response.message,
                                    icon: 'success',
                                    customClass: {title: 'fs-5'}
                                }).then((result) => {

                                        if (result.isConfirmed) {
                                           window.location.href = '{{ route('login')}}';
                                        }
                                    });
                            return false;
                        }else{
                            // alert("statmenterrormessage")
                            Swal.fire(response.message, '', 'error');
                            return false;
                        }
                    }
                    
                },
                error: function(xhr, status, error) {
                    // alert("validationerrromessage")

                    console.error(status, error);
                    $('.invalid-feedback').remove();
                    // Access the error message directly from xhr.responseText
                    var errorMessage = xhr.responseText || 'An error occurred';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    // console.log(errorMessage,"mmmmm"); // Log the error message

                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(fieldName, fieldErrors) {
                        var fieldInput = $('[name="' + fieldName + '"]');
                        var fieldValue = fieldInput.val();
                        // Remove existing error classes
                        fieldInput.removeClass('is-invalid is-valid');
                        // Add the 'is-invalid' class to the input field if it's empty
                        if (!fieldValue) {
                            fieldInput.addClass('is-invalid');
                        }
                        $.each(fieldErrors, function(index, errorMessage) {
                            fieldInput.parent().append('<span class="invalid-feedback" role="alert"><strong>' + errorMessage + '</strong></span>');
                        });
                    });
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage
                        });
                
                },

                complete: function() {
                    $(".loader").hide();
                }
            })
        }

    function resendOTP() {
        var mobile =$.trim($("#mobile_number").val());
        var csrfToken =  $('input[name="_token"]').val();
        var url = "{{ route('nursery.resendOTP') }}"
        $(".loader").show();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: url,

            data: {
                _token:csrfToken, mobile:mobile
            },
            success: function (response) {
            $(".loader").hide();
                if(response.success == true){

                    Swal.fire(response.message, '', 'success');
                }else{
                    Swal.fire(response.message, '', 'error');
                    return false;
                }
            },
            error: function (xhr, status, error) {
                $(".loader").hide();
                console.error(xhr.responseText);
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


</html>