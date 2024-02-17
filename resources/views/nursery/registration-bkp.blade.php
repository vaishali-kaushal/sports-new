<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Department</title>
    <link href="{{url('public/forntend')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('public/forntend')}}/css/style.css" rel="stylesheet">
    <link href="{{url('public/forntend')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <!-- ================================================================================================================================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{url('public/forntend')}}/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    <script src="{{asset('public/assets/plugins/jquery')}}/jquery.min.js"></script>
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
                                        <a href="{{url('/')}}"><img src="{{url('/public/forntend')}}/images/department-logo.png" alt="" class="img-fluid" width="80px"></a>
                                    </div>

                                </div>
                                <div class="col-md-8 col-sm-6 half-width">
                                    <div class="consol-port text-center">
                                        <a href="{{url('/')}}">
                                            <h1 class="text-white mt-3"><span></span></h1>
                                            <strong>NURSERY MANAGEMENT SYSTEM </strong>
                                            <span>Department of Sports &amp; Youth Affairs, Haryana</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 d-none d-md-block text-end">
                                    <span class="float-right cm-picture-box"><img src="{{url('/public/forntend')}}/images/haryana-logo.png" alt="" class="img-fluid" width="70px"></span>
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
                                    Registration Form
                                </h2>
                            </div>
                            <div class="col-sm-12">

                                <form class="regis-form" action="{{url('nursery/store')}}" method="post">
                                    @csrf
                                    <div class="row">
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
                                            <label class="form-label">District</label>
                                            <label for="exampleInputPassword1">District</label>
                                            <select class="form-control" name="district_id">
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
                                            <input type="number" class="form-control" name="mobile_number">
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
                                        <!-- <div class="col-sm-6">
                                            <label class="form-label">Type of Nursery</label>
                                            <select class="form-select" aria-label="Default select example" name="typr_of_nursery">
                                                <option value="">Open this select menu</option>
                                                <option value="1">School</option>
                                                <option value="2">Institute</option>
                                            </select>
                                        </div> -->
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
                                        <div class="col-sm-12 text-end pt-4">
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