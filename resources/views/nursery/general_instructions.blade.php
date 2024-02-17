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
        width: 100%;
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
    $(document).ready(functio n() {
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
                                        <li><a href="javascript:void(0)"> <i class="fa fa-envelope"></i>
                                                <span>abc@gmail.com</span></a></li>

                                    </ul>

                                </div>
                                <div class="col-sm-4 no-padding-left adjust-width">
                                    <ul class="select-box text-end">
                                        <li> <a href="{{ route('general_instructions')}}">General Instructions</a></li>
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
                                        <a href="{{url('/')}}"><img
                                                src="{{url('/forntend')}}/images/department-logo.png" alt=""
                                                class="img-fluid" width="80px"></a>
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
                                    <span class="float-right cm-picture-box"><img
                                            src="{{url('/forntend')}}/images/haryana-logo.png" alt="" class="img-fluid"
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

                        <div class="col-sm-12">
                            <h2 class="heading2 text-center pt-4">
                                Nursery Registration Guidelines
                            </h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="gen-instr">
                                <h3>Mandatory compliance</h3>
                                <!-- <h4>A. Nurseries </h4> -->
                                <ul>
                                    <li>1. Applicant should have Infrastructure/Facilities specific to the sports
                                        applied for Nursery. </li>
                                    <li>2. Applicant should have equipment specific to the sports applied for Nursery.
                                    </li>
                                    <li>3. Applicant should have details of achievements of the players, required for
                                        marking/merit purposes. </li>
                                    <li>4. Availability of the Qualified coaches as per Annexure D (Coaches Registration
                                        Criteria) </li>
                                    <li>5. Nursery registration is exclusively applicable to sports featured in the
                                        Olympic Games, Asian Games & Commonwealth Games. </li>
                                    <li>6. Nursery applicants are required to submit consent for providing subsidized
                                        fees for player training. </li>
                                    <!-- ============================================================= -->
                                    <li>7. Nurseries will only be allocated to government schools, private schools, and
                                        private coaching sports academies.</li>
                                    <li>8. Nurseries cannot train/teach more than 25 students/players.</li>

                                    <!-- ======================================================= -->
                                    <li>9. Waitlist need to be prepared for 10 students/players in case of vacancy in
                                        Nursery. </li>
                                    <!-- ======================================================================== -->
                                    <li>10. Schedule/Timing of the Nursery: Morning Batch 2 Hours (05:30 – 09:00) and
                                        Evening Batch 3 Hours (03:00 – 08:00) </li>

                                </ul>

                                <h4>B. Necessary guidelines -</h4>
                                <ul> 
                                    <li>1. The tenure of each nursery will be from 1st April to 31st January. </li>
                                    <li>2. Sports nurseries will be opened for sports which are applicable in Olympic, Asian and Common categories. </li>
                                </ul>
                            </div>

                        </div>

                    </div>
            </div>

        </div>
        </section>

    </div>


    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>