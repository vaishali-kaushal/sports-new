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
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <!-- ================================================================================================================================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ url('public/forntend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('public/assets/plugins/jquery') }}/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</head>



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
                                        <a href="{{ url('/') }}"><img src="{{ url('/public/forntend') }}/images/department-logo.png" alt="" class="img-fluid" width="80px"></a>
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
                                    <span class="float-right cm-picture-box"><img src="{{ url('/public/forntend') }}/images/haryana-logo.png" alt="" class="img-fluid" width="70px"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </header>
                <div class="content-header">

                </div>
                <section class="main-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="heading2 text-center pt-4">
                                    Registration Form For Coach
                                </h2>
                            </div>
                            <div class="col-sm-12">

                                <form class="regis-form" action="{{ url('coach/store') . '/' . $token }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label">Name:- </label>
                                            <input type="text" name="coach_name" class="form-control" placeholder="Enter Your Name">
                                            @error('coach_name')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Father Name:- </label>
                                            <input type="text" name="father_name" class="form-control" placeholder="Enter Your Father Name">
                                            @error('father_name')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Profile Pic:- </label>
                                            <input type="file" name="profile_pic" class="form-control">
                                            @error('profile_pic')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Age:- </label>
                                            <input type="number" name="age" class="form-control" placeholder="Enter Your age">
                                            @error('age')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Adhar Number:- </label>
                                            <input type="number" name="adhar_number" class="form-control" placeholder="Adhar number">
                                            @error('adhar_number')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Sports Coach For:- </label>
                                            <input type="text" name="sports_coach" class="form-control" placeholder="Sports Coach For">
                                            @error('sports_coach')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Mobile no:- </label>
                                            <input type="number" name="mobile_no" class="form-control" placeholder="Enter Your Mobile number">
                                            @error('mobile_no')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Email :- </label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Achievements with pics :- </label>
                                            <input type="file" name="achievements_with_pics" class="form-control">
                                            @error('achievements_with_pics')
                                            <span class="invalid-feedback" role="alert" style="display : block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 text-center  pt-4">
                                            <button type="submit" class="btn btn-danger">Submit</button>
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
    </script>
</body>

</html>
