<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Department</title>
    <link href="{{ url('public/forntend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('public/forntend') }}/css/style.css" rel="stylesheet">
    <link href="{{ url('public/forntend') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body class="login-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5 col-sm-5 ms-auto pe-0 position-relative">
                <div class="login-side position-relative">
                    <div class="login-content">
                        <div class="dept-logo text-center">
                            <img src="{{ url('public/forntend') }}/images/department-logo.png" alt="sports department"
                                width="120px">
                        </div>
                        <h1 class="text-white mt-3">Department of Sports Haryana <span>NURSERY MANAGEMENT SYSTEM</span></h1>
                        <div class="login-form w-100 px-5 pt-4">
                              <h1 class="text-white mt-3 text-center">Login Page</h1>

                            <form action="{{ url('login/otp/verify/') . '/' . $token }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <h2 class="text-white mt-3"> {{ $msg }}</h2>
                                    </div>
                                </div>

                                <div class="mt-5">

                                    <label class="form-label ">Enter your OTP</label>
                                    <input type="password" pattern="[0-9]+" maxlength="6" class="form-control"
                                        name="otp">

                                    @error('otp')
                                        <span class="invalid-feedback" role="alert" style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex width-100 mt-3 justify-content-end">
                                    <a class="btn btn-danger mr-2 ml-2"
                                        href="{{ url('login/otp/resendotp') . '/' . $token }}">Resend OTP</a>
                                    &nbsp;
                                    &nbsp;
                                    <button type="submit" class="btn btn-danger ">Verify OTP</button>

                                </div>
                                <div class="text-center">
                                    <!-- <a href="{{ url('nursery/registration') }}" class="ms-2">Register New Nursey/Institute</a> -->

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('public/forntend/') }}/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href='{{ asset('forntend/css/theme.css') }}'>
    <script src="{{ asset('assets/plugins/jquery') }}/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

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

</body>

</html>
