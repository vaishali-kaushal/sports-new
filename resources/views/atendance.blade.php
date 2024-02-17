<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Department</title>
    <link href="{{ asset('forntend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('forntend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('forntend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <!-- ================================================================================================================================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('forntend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('assets/plugins/jquery') }}/jquery.min.js"></script>
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
                                        <li><a href="javascript:void(0)"> <i class="fa fa-envelope"></i>
                                                <span>abc@gmail.com</span></a></li>

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
                                        <a href="{{ url('/') }}"><img
                                                src="{{ url('/forntend') }}/images/department-logo.png" alt=""
                                                class="img-fluid" width="80px"></a>
                                    </div>

                                </div>
                                <div class="col-md-8 col-sm-6 half-width">
                                    <div class="consol-port text-center">
                                        <a href="{{ url('/') }}">
                                            <h1 class="text-white mt-3"><span></span></h1>
                                            <strong>NURSERY MANAGEMENT SYSTEM </strong>
                                            <span>Department of Sports &amp; Youth Affairs, Haryana</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 d-none d-md-block text-end">
                                    <span class="float-right cm-picture-box"><img
                                            src="{{ url('/forntend') }}/images/haryana-logo.png" alt=""
                                            class="img-fluid" width="70px"></span>
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
                            <img id="loading-image" src="{{ asset('forntend/images/loading.gif') }}" alt="Loading...">
                        </div>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="heading2 text-center pt-4">
                                    {{--  Registration Form  --}}
                                </h2>
                            </div>
                            <div class="col-sm-12 text-center">
                                <video autoplay id="webcam"></video>
                                <br><br>
                                <button onclick="webcam('pause')">Mark Attendance</button>
                                <button onclick="webcam('play')">Start</button>
                            </div>

                        </div>
                    </div>
            </div>
            </section>

        </div>
    </div>
    </div>

</body>

</html>
<script>
    var video = document.querySelector('#webcam');

    function webcam(btn) {
        if (btn == 'pause') {
            video.pause();
        } else {
            video.play();
        }
    }

    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function(stream) {
                video.srcObject = stream;
            })
            .catch(function(e) {
                console.log(e);
            });
    }
</script>
