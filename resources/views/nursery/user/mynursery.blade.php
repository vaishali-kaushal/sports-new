@extends('nursery.user.layouts.app')

@section('content')
<style>
    .fs-5 {
    font-size: 1.1em; 
}
</style>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Application</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- <a href="" class="btn btn-primary">Add DSO</a> -->

                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol> -->
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Note: All fields with * are mandatory</h3>
                        </div>

                        <div class="card-body">

                           
                                <form class="row" method="post" id="nursery-registration-form"  enctype="multipart/form-data">
                                    @csrf
                                <div class="row"  id="step2">
                                    <input type="hidden" name="mobile_number" value="{{$nursery->mobile_number ?? ''}}" id="mobile_number">
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">District</label> <span class='star'>*</span>
                                        <select class="form-control" name="district_id" id="district_id">
                                            <option value="">-----Select------</option>
                                            <?php foreach ($districts as $district) { ?>
                                            <option value="{{$district['id']}}" @if($district['id'] == $nursery->district_id) selected @endif>{{$district['name']}}
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
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Category of Nursery</label> <span class='star'>*</span>
                                        <select class="form-control cat_of_nursery" aria-label="Default select example" name="cat_of_nursery" id="cat_of_nursery">
                                            <option value="">-----Select-----</option>
                                            <option value="govt" @if($nursery->cat_of_nursery == 'govt') selected @endif>Government</option>
                                            <option value="private" @if($nursery->cat_of_nursery == 'private') selected @endif>Private</option>
                                        </select>
                                        @error('cat_of_nursery')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Type of Nursery</label> <span class='star'>*</span>
                                        <select class="form-control type_of_nursery" aria-label="Default select example" name="type_of_nursery">
                                            <option value="">-----Select-----</option>
                                        </select>

                                        @error('type_of_nursery')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Name of School/Institute/Coaching Centre</label> <span class='star'>*</span>
                                        <input type="text" class="form-control" name="name_of_nursery" maxlength="50" onkeypress="return /[a-zA-Z ]/i.test(event.key)" value="{{ $nursery->name_of_nursery ?? ''}}">
                                        @error('name_of_nursery')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Name of Head/Principal</label> <span class='star'>*</span>
                                        <input type="text" class="form-control" name="head_pricipal" value="{{ $nursery->head_pricipal ?? ''}}">
                                        @error('head_pricipal')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Email</label> <span class='star'>*</span>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $nursery->email ?? ''}}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Address</label> <span class='star'>*</span>
                                        <textarea class="form-control" name="address" onkeypress = "return !/[<>]/.test(event.key)">{{ $nursery->address ?? ''}}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Pin Code</label> <span class='star'>*</span>
                                        <input type="text" class="form-control" name="pin_code" pattern="[0-9]*" oninput="validateNumber(this)" maxlength="6" minlength="6" value="{{ $nursery->pin_code ?? ''}}">
                                        @error('pin_code')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">Registration No. of Society who will be running Nursery</label> <span class='star'>*</span>
                                        <input type="text" class="form-control" name="reg_no_running_nursery" maxlength="50" value="{{ $nursery->reg_no_running_nursery ?? ''}}">
                                        @error('reg_no_running_nursery')
                                        <span class="invalid-feedback" role="alert"
                                            style="display : block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="col-sm-12 text-right mb-2">
                                        <button type="button" class="btn btn-danger" id="nursery-details"
                                                onclick="saveNurseryDetails('step2')">Next</button>
                                    </div>
                                </div>
                                <!-- Step 3 div -->
                                <div class="row step" id="step3" style="display: none;">
                                       
                                        <div class="card card-primary">
                                           
                                            <div class="row card-body">
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Game Applying For</label> <span class='star'>*</span>

                                                    <select class="form-control" name="game_id" id="game_id">
                                                    <option value="">-----Select-----</option>

                                                        @foreach ($games as $game) { ?>
                                                            <option value="{{$game['id']}}" @if($game['id'] == $nursery->game_id) selected @endif>{{$game['name']}}</option>
                                                        @endforeach
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
                                                        <option value="girls" @if($nursery->game_disp =='girls') selected @endif >Girls</option>
                                                        <option value="boys" @if($nursery->game_disp =='boys') selected @endif >Boys</option>
                                                        <option value="mix" @if($nursery->game_disp =='mix') selected @endif >Mix</option>
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
                                                    <select class="form-control playground_nursery" aria-label="Default select example" name="playground_hall_court_available" id="playground_hall_court_available">
                                                        <option value="">-----Select-----</option>
                                                        <option value="yes" @if($nursery->playground_hall_court_available =='yes') selected @endif>Yes</option>
                                                        <option value="no" @if($nursery->playground_hall_court_available =='no') selected @endif>No</option>
                                                    </select>


                                                    @error('playground_hall_court_available')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Equipment related to selected Games available</label> <span class='star'>*</span>
                                                    <select class="form-control equipment_nursery" aria-label="Default select example" name="equipment_related_to_selected_games_available" id="equipment_related_to_selected_games_available">
                                                        <option value="">-----Select-----</option>
                                                        <option value="yes" @if($nursery->equipment_related_to_selected_games_available =='yes') selected @endif>Yes</option>
                                                        <option value="no"  @if($nursery->equipment_related_to_selected_games_available =='no') selected @endif>No</option>
                                                    </select>

                                                    @error('equipment_related_to_selected_games_available')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3" id="playground_media" @if($nursery->playground_hall_court_available == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Upload 3 Photographs of Playground/Hall/Court (Images to be uploaded duly signed with date by HOD /Principal)</label> <span class='star'>*</span>
                                                    <input type="file" class="form-control" multiple name="playground_images[]" id="playground_images" accept=".jpg, .jpeg, .png">
                                                    @error('playground_images')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                <div id="selectedPlaygroundImages" class="image-row mt-4"></div>
                                                <div class="row">
                                                    @if(!empty($nurseryPhotos['playground']) && !is_null($nurseryPhotos['playground']))

                                                       <?php $pics = json_decode($nurseryPhotos['playground']); 
                                                        // dd($pics);
                                                        ?>
                                                        @foreach ($pics as $p)
                                                            <div class="col-sm-4 pb-2">
                                                                <img src="{{ asset($p) }}" class="Playground Image" style="width: 50px;">

                                                            </div>

                                                    @endforeach
                                                    @endif
                                                </div>
                                                </div>
                                                <!-- show selected images -->

                                                <div class="col-sm-6 mb-3" id="equipment_media"  @if($nursery->equipment_related_to_selected_games_available == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Upload 3 Photographs of Equipment(Images to be uploaded duly signed with date by HOD /Principal)</label> <span class='star'>*</span>
                                                    <input type="file" class="form-control" multiple name="equipment_images[]" id="equipment_images" accept=".jpg, .jpeg, .png">
                                                    @error('equipment_images')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div id="selectedEquipmentImages" class="image-row mt-4"></div>
                                                </div>
                                               
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Whether qualified coach is available for the concerned game?</label> <span class='star'>*</span>
                                                    <select class="form-control coach_available" aria-label="Default select example" name="whether_qualified_coach_is_available_for_the_concerned_game" id="coach_available">
                                                        <option value="">-----Select-----</option>
                                                        <option value="yes" @if($nursery->whether_qualified_coach_is_available_for_the_concerned_game =='yes') selected @endif>Yes</option>
                                                        <option value="no" @if($nursery->whether_qualified_coach_is_available_for_the_concerned_game =='no') selected @endif>No</option>
                                                    </select>

                                                    @error('whether_qualified_coach_is_available_for_the_concerned_game')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                               
                                                <div class="col-sm-6 mb-3 name_coach"  @if($nursery->whether_qualified_coach_is_available_for_the_concerned_game == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Name of Coach</label> <span class='star'>*</span>
                                                    <input type="text" class="form-control" name="coach_name" id="coach_name" value="{{ $nursery->coach_name ?? ''}}">

                                                    @error('coach_name')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 qualification_coach" @if($nursery->whether_qualified_coach_is_available_for_the_concerned_game == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Highest Qualification of Coach</label> <span class='star'>*</span>
                                                    <select class="form-control" name="coach_qualification" id="coach_qualification">
                                                    <option value="">-----Select-----</option>
                                                        @foreach ($coach_qualification as $qualification) { ?>
                                                        <option value="{{$qualification['id']}}"  @if($qualification['id'] == $nursery->coach_qualification) selected @endif>{{$qualification['name']}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('coach_qualification')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                   
                                                </div>

                                                <div class="col-sm-6 mb-3 coach_certificate" @if($nursery->whether_qualified_coach_is_available_for_the_concerned_game == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Coach Qualification Certificate</label> <span class='star'>*</span>
                                                    <input type="file" class="form-control" multiple name="coach_certificate[]" id="coach_certificate" accept=".jpg, .jpeg, .png">
                                                    @error('coach_certificate')
                                                    <span class="invaalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div>
                                                        <!-- show coach certificate -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mt-2 gender" @if($nursery->game_disp == "") style="display: none;" @endif>
                                                    <label class="form-label">No. of students playing concerned
                                                        games</label> <span class='star'>*</span>
                                                    <div class="row">
                                                        <div class="col-sm-6 boys" @if($nursery->game_disp != 'boys') style="display: none;" @endif>
                                                            <!-- <label class="form-label">Boys</label> <span class='star'>*</span> -->
                                                            <input type="number" class="form-control" name="boys" placeholder="Number of Boys" id="boys" value="{{ $nursery->boys ?? '' }}">

                                                            @error('boys')
                                                            <span class="invalid-feedback" role="alert"
                                                                style="display : block;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-6 girls" @if($nursery->game_disp != 'girls') style="display: none;" @endif>
                                                           <!--  <label class="form-label">Girls</label> <span class='star'>*</span> -->
                                                            <input type="number" class="form-control" name="girls" placeholder="Number of Girls" id="girls" value="{{ $nursery->girls ?? '' }}">

                                                            @error('girls')
                                                            <span class="invalid-feedback" role="alert"
                                                                style="display : block;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3 player_list" id="player_list" @if($nursery->game_disp == 'girls' || $nursery->game_disp == 'mix' || $nursery->game_disp == 'boys') style="display: none;" @endif>
                                                    <label class="form-label">Attach list of players with achievement</label> <span class='star'>*</span>
                                                    <input type="file" class="form-control" multiple name="player_list[]" id="player_list" accept=".jpg, .jpeg, .png">
                                                    @error('player_list')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div>
                                                        <!-- show plyaers list -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label">Highest Achievement of Players</label> <span class='star'>*</span>
                                                    <select class="form-control" aria-label="Default select example" name="any_specific_achievements_of_the_institute_during_last" id="highest_achievement">
                                                        <option value=""> -----Select----- </option>
                                                        <option value="beginner" @if($nursery->any_specific_achievements_of_the_institute_during_last =='beginner') selected @endif>Beginner level</option>
                                                        <option value="district" @if($nursery->any_specific_achievements_of_the_institute_during_last =='district') selected @endif>District Level</option>
                                                        <option value="state" @if($nursery->any_specific_achievements_of_the_institute_during_last =='state') selected @endif>State Level</option>
                                                        <option value="national" @if($nursery->any_specific_achievements_of_the_institute_during_last =='national') selected @endif>National Level</option>
                                                        <option value="international" @if($nursery->any_specific_achievements_of_the_institute_during_last =='international') selected @endif>International Level</option>
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
                                                        <option value="yes"  @if($nursery->already_running_nursery =='yes') selected @endif>Yes</option>
                                                        <option value="no"  @if($nursery->already_running_nursery =='no') selected @endif>No</option>
                                                    </select>

                                                    @error('already_running_nursery')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 year_allotment" @if($nursery->already_running_nursery == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Year of Allotment</label> <span class='star'>*</span>
                                                    <select class="form-control" name="year_allotment" id="year_allotment">
                                                       <option value="">-----Select------</option>
                                                        <option value="2013" @if($nursery->year_allotment =='2013') selected @endif>2013</option>
                                                        <option value="2014" @if($nursery->year_allotment =='2014') selected @endif>2014</option>
                                                        <option value="2015" @if($nursery->year_allotment =='2015') selected @endif>2015</option>
                                                        <option value="2016" @if($nursery->year_allotment =='2016') selected @endif>2016</option>
                                                        <option value="2017" @if($nursery->year_allotment =='2017') selected @endif>2017</option>
                                                        <option value="2018" @if($nursery->year_allotment =='2018') selected @endif>2018</option>
                                                        <option value="2019" @if($nursery->year_allotment =='2019') selected @endif>2019</option>
                                                        <option value="2020" @if($nursery->year_allotment =='2020') selected @endif>2020</option>
                                                        <option value="2021" @if($nursery->year_allotment =='2021') selected @endif>2021</option>
                                                        <option value="2022" @if($nursery->year_allotment =='2022') selected @endif>2022</option>
                                                        <option value="2023" @if($nursery->year_allotment =='2023') selected @endif>2023</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 mb-3 game_previous" @if($nursery->already_running_nursery == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Game (Previous)</label> <span class='star'>*</span>

                                                    <select class="form-control" name="game_previous_id" id="game_previous_id">
                                                    <option value="">-----Select-----</option>

                                                        @foreach ($games as $game) { ?>
                                                        <option value="{{$game['id']}}" @if($game['id'] == $nursery->game_previous_id) selected @endif>{{$game['name']}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('game_previous_id')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 discipline_previous" @if($nursery->already_running_nursery == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Sports Game Discipline (Previous)</label> <span class='star'>*</span>
                                                    <select class="form-control" name="game_disp_previous" id="game_disp_previous">
                                                        <option value="">-----Select-----</option>
                                                        <option value="girls" @if($nursery->game_disp_previous =='girls') selected @endif >Girls</option>
                                                        <option value="boys" @if($nursery->game_disp_previous =='boys') selected @endif >Boys</option>
                                                        <option value="mix" @if($nursery->game_disp_previous =='mix') selected @endif >Mix</option>
                                                    </select>
                                                    @error('game_disp_previous')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <label class="form-label">Whether Nursery will provide Sports kits to selected players?</label> <span class='star'>*</span>
                                                    <select class="form-control" aria-label="Default select example" name="whether_nursery_will_provide_sports_kits_to_selected_players" id="sports_kit">
                                                        <option value="">-----Select-----</option>
                                                        <option value="yes" @if($nursery->whether_nursery_will_provide_sports_kits_to_selected_players =='yes') selected @endif>Yes</option>
                                                        <option value="no" @if($nursery->whether_nursery_will_provide_sports_kits_to_selected_players =='no') selected @endif>No</option>
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
                                                    <select class="form-control fee_concession" aria-label="Default select example" name="whether_nursery_will_provide_fee_concession_to_selected_players" id="fee_concession">
                                                        <option value=""> -----Select----- </option>
                                                        <option value="yes" @if($nursery->whether_nursery_will_provide_fee_concession_to_selected_players =='yes') selected @endif>Yes</option>
                                                        <option value="no" @if($nursery->whether_nursery_will_provide_fee_concession_to_selected_players =='no') selected @endif>No</option>
                                                    </select>

                                                    @error('whether_nursery_will_provide_fee_concession_to_selected_players')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3 percentage_fee_concession" @if($nursery->whether_nursery_will_provide_fee_concession_to_selected_players == 'no') style="display: none;" @endif>
                                                    <label class="form-label">Percentage of Fee Concession</label> <span class='star'>*</span>
                                                   <input type="number" class="form-control" name="percentage_fee" id="percentage_fee" value="{{ $nursery->percentage_fee ?? ''}}">
                                                   <!-- validation 0 to 100  -->
                                                    @error('percentage_fee')
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display : block;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                             
                                            
                                            <div class="col-sm-12 text-right mb-2">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="prevStep()">Previous</button>
                                                <button type="button" class="btn btn-danger" id="final_submit"
                                                    onclick="saveNurseryDetails('step3')">Submit</button>
                                            </div>
                                                </div>
                                        </div>
                                    </div>
                                    </form>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>


@endsection
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
        $(document).ready(function() {

        populateTypeOfNursery();

        function populateTypeOfNursery() {
            var selectedCat = $('#cat_of_nursery').val();
            var typeCatCategory = $('.type_of_nursery');

            typeCatCategory.empty();
            var selectedType = "{{ $nursery->type_of_nursery }}";

            if (selectedCat === 'govt') {
                    typeCatCategory.append('<option value="">-----Select-----</option>');
                    typeCatCategory.append('<option value="govt_school">Govt. School</option>');
                    typeCatCategory.append('<option value="panchayat">Panchayat</option>');
            } else if (selectedCat === 'private') {
                typeCatCategory.append('<option value="">-----Select-----</option>');
                typeCatCategory.append('<option value="pvt_school">Private School</option>');
                typeCatCategory.append('<option value="pvt_institute">Private Institute/Academy</option>');
            }

            typeCatCategory.val(selectedType);
        }
            $('.cat_of_nursery').on('change', function() {
                populateTypeOfNursery();
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
            // let playground_images = []
            // $('input[name="playground_images[]"]').change(function() {
            //     playground_images = [...playground_images, ...($(this)[0].files)]
            //     console.log(playground_images,'playground_imagesplayground_images')
            //     displayplaygroundImages(playground_images);
            // });
            $('input[name="playground_images[]"]').change(function() {
                var files = $(this)[0].files;
                displayplaygroundImages(files);
            });
            $('input[name="equipment_images[]"]').change(function() {
                var files = $(this)[0].files;
                displayEquipmentImages(files);
            });

      
        function displayplaygroundImages(files) {
            $('#selectedPlaygroundImages').empty();

            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    console.log('hi')
                    var imageContainer = $('<div class="image-container position-relative"></div>');

                    var removeBtn = $('<button class="remove-btn position-absolute top-0 start-100 translate-middle text-white badge border border-light rounded-circle bg-danger">x</button>');
                    var img = $('<img class="" src="' + e.target.result + '" width="50" height="50">');


                    imageContainer.append(img);
                    imageContainer.append(removeBtn);

                    $('#selectedPlaygroundImages').append(imageContainer);

                    removeBtn.click(function() {
                        $(this).parent().remove();
                    });
                }
                reader.readAsDataURL(files[i]);
            }
        }

        function displayEquipmentImages(files) {
            $('#selectedEquipmentImages').empty();

            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imageContainer = $('<div class="image-container position-relative"></div>');
                    var removeBtn = $('<button class="remove-btn position-absolute top-0 start-100 translate-middle text-white badge border border-light rounded-circle bg-danger">x</button>');
                    var img = $('<img src="' + e.target.result + '" width="50" height="50">');


                    imageContainer.append(img);
                    imageContainer.append(removeBtn);

                    $('#selectedEquipmentImages').append(imageContainer);

                    removeBtn.click(function() {
                        $(this).parent().remove();
                    });
                }
                reader.readAsDataURL(files[i]);
            }
        }
        });
      // function removePlaygroundImage(index){
      //   console.log(index,"iii")
      //   console.log(playground_images,"ppp")
      //       playground_images.splice(index,1)
      //       $(this).parent().remove();
      //   }
    // Function to validate email format
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validateNumber(input) {
        // Remove non-numeric characters
        input.value = input.value.replace(/[^0-9]/g, '');
    }


        function saveNurseryDetails(step) {
            var csrfToken = $('input[name="_token"]').val();
            var email = $.trim($("#email").val());
            var mobile = $.trim($("#mobile_number").val());
            var name = $.trim($("#name").val());
            var url = "{{ route('update.nurseryDetails') }}";
            var formData = new FormData($('#nursery-registration-form')[0]);
            var filesArray = formData.getAll('facility_images[]');
            let images = ''

            // Append additional data to FormData
            formData.append('facility_images', filesArray);
            formData.append('_token', csrfToken);
            formData.append('mobile_number', mobile);
            formData.append('email', email);
            formData.append('name', name);
            formData.append('step', step);
            console.log(formData, "fsdfsdfsd")
            alert(step);
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
                },
                success: function (response) {
                    // hideLoader();
                $(".loader").hide();

                    if (step == "step2") {
                        if (!email) {
                            Swal.fire('Enter email address', '', 'error');
                            return false;
                        }

                        if (!isValidEmail(email)) {
                            Swal.fire('Enter valid email ID', '', 'error');
                            return false;
                        }
                        if (response.status == 'success') {
                            $("#step2").hide();
                            $("#step3").show();
                            var nursery = response.existingNursery;
                            // $('input[name="email"]').val(email).attr('readonly',true);
                            // $('input[name="mobile_number"]').val(mobile).attr('readonly', true);
                            // if (nursery != null) {
                            //     $('select[name="game_disp"]').val(nursery.game_disp);
                            //     $('select[name="playground_hall_court_available"]').val(nursery.playground_hall_court_available);
                            //     $('select[name="equipment_related_to_selected_games_available"]').val(nursery.equipment_related_to_selected_games_available);
                            //     $('select[name="whether_nursery_will_provide_sports_kits_to_selected_players"]').val(nursery.whether_nursery_will_provide_sports_kits_to_selected_players);
                            //     $('select[name="whether_nursery_will_provide_fee_concession_to_selected_players"]').val(nursery.whether_nursery_will_provide_fee_concession_to_selected_players);
                            //     $('select[name="whether_qualified_coach_is_available_for_the_concerned_game"]').val(nursery.whether_qualified_coach_is_available_for_the_concerned_game);
                            //     $('select[name="whether_qualified_coach_is_available_for_the_concerned_game"]').val(nursery.whether_qualified_coach_is_available_for_the_concerned_game);
                            //     $('input[name=boys]').val(nursery.boys);
                            //     $('input[name=girls]').val(nursery.girls);
                            //     $('textarea[name=any_specific_achievements_of_the_institute_during_last]').val(nursery.any_specific_achievements_of_the_institute_during_last);


                            // }
                            // Swal.fire({title: response.message,
                            //     icon: 'success',
                            //     customClass: {title: 'fs-5'}
                            // });
                        } else {
                            $(".loader").hide();
                            Swal.fire(response.message, '', 'error');
                        }
                    }else if (step == "step3") {
                        // alert(step);
                        $(".loader").show();

                        // var images = $("#facility_images").val();

                        // if (!images) {
                        //     Swal.fire('Select Images', '', 'error');
                        //     return false;
                        // }
                        if(! $("#flexCheckChecked").val()){
                            Swal.fire('Accept Terms and Conditions ', '', 'error');
                        //     return false;
                        }
                       
                            // $("step1").show();
                            if(response.status == 'success'){
                            $(".loader").hide();
                            Swal.fire({title: response.message,
                                icon: 'success',
                                customClass: {title: 'fs-5'}
                            }).then((result) => {

                                    if (result.isConfirmed) {

                                       window.location.href = '/';
                                    }
                                });
                                return false;
                            }else{
                                $(".loader").hide();

                                Swal.fire(response.message, '', 'error');

                            }
                        } else {
                            $(".loader").hide();
                            Swal.fire(response.message, '', 'error');

                        }
                    
                    // alert("success")
                },
                error: function (xhr, status, error) {
                    console.error(status, error);

                    // Access the error message directly from xhr.responseText
                    var errorMessage = xhr.responseText || 'An error occurred';
                    $(".loader").hide();

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage
                    });
                    return false;
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
