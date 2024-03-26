@extends($layout)

@section('content')
<style>
    .fs-5 {
    font-size: 1.1em; 
}
</style>
<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Background color */
        }
        .image-thumbnails {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        .thumbnail {
            margin: 0 10px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .thumbnail:hover {
            transform: scale(1.1);
        }
        .preview-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            z-index: 999;
            display: none;
        }
        .preview-image {
            max-width: 80%;
            max-height: 80%;
            border-radius: 10px;
            filter: blur(5px); /* Add blur effect */
        }
        .close-preview {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>rtert</h1> -->
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
    @if(!empty($nursery) && $nursery->cat_of_nursery != 'departmental')
     
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                     
                        <div class="card-header">
                                <h4 class="card-title">Application Detail</h4>
                            <div class="text-right"><strong>Application ID: {{ $nursery->application_number ?? '' }}</strong></div>

                            
                        </div>

                        <div class="card-body">
                            <div>
                                <h3>Nursery details</h3>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Application Date</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ date('d-M-Y', strtotime($nursery->nurseryStatus->created_at)) ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">District</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->district->name }}</div>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Category of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->cat_of_nursery) }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Type of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($nursery->cat_of_nursery == 'private')
                                            @if($nursery->type_of_nursery == 'pvt_institute')
                                                <div>Private Institute</div>
                                            @elseif($nursery->type_of_nursery == 'pvt_school')
                                                <div>Private School</div>
                                            @endif
                                        @else
                                        <div> {{ ucfirst($nursery->type_of_nursery)}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Educational  Center</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->name_of_nursery ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Name of Head/Principal</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->head_pricipal ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->email ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Registration No.</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->reg_no_running_nursery ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Pin Code</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->pin_code ?? '' }}</div>
                                    </div>
                                </div>

                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Address</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->address ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                  <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Mobile Number</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->mobile_number ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h3>Game Details</h3>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Game Applying For</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div> {{$nursery->game->name}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Sports Game Discipline</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->game_disp) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Playground available</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->playground_hall_court_available ?? '') }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Equipment Available</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div> {{$nursery->equipment_related_to_selected_games_available ?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Number of students playing concerned games</label>
                                    </div>
                                    @if($nursery->game_disp == 'boys')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->boys ?? '0' }} Boys</div>
                                    </div>
                                    @endif
                                    @if($nursery->game_disp == 'girls')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->girls ?? '' }} Girls</div>
                                    </div>
                                    @endif
                                    @if($nursery->game_disp == 'mix')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->girls ?? '' }} Girls and {{ $nursery->girls ?? '' }} Boys</div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Whether qualified coach is available for the concerned game</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->whether_qualified_coach_is_available_for_the_concerned_game)  ?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" @if($nursery->whether_qualified_coach_is_available_for_the_concerned_game == 'no') style="display:none;" @endif>
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Name of Coach</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->coach_name)  ?? ''}}</div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row mt-3" @if($nursery->whether_qualified_coach_is_available_for_the_concerned_game == 'no') style="display:none;" @endif>
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Highest Qualification of Coach</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->coachQualification->name  ?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Whether Nursery will provide fee concession to selected players</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div> {{$nursery->whether_nursery_will_provide_fee_concession_to_selected_players ?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-12" @if($nursery->whether_nursery_will_provide_fee_concession_to_selected_players == 'no') style="display:none;" @endif>
                                    <div class="col-sm-6">
                                        <label class="form-label">Percentage of Fee Concession</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->percentage_fee ?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Highest Achievement of Players</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->any_specific_achievements_of_the_institute_during_last) ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Whether sports nursery was allotted in earlier years?</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->already_running_nursery) ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" @if($nursery->already_running_nursery == 'no') style="display:none;" @endif>
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Year of Allotment</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->year_allotment ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" @if($nursery->already_running_nursery == 'no') style="display:none;" @endif>
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Game (Previous)</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->game_previous_id ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3" @if($nursery->already_running_nursery == 'no') style="display:none;" @endif>
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Sports Game Discipline (Previous)</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->game_descipline_previous ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Whether Nursery will provide Sports kits to selected players</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->whether_nursery_will_provide_sports_kits_to_selected_players ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Whether School/Institue/Academy will provide fee concession to selected players</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->whether_nursery_will_provide_fee_concession_to_selected_players ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                             <hr>
                            <div>
                                <h3>Documents Uploaded</h3>
                                <span>Click on below links to view attached documents</span>
                            </div>
                            <div>
                                <div class="row mt-3">
                                     @if(!empty($playground_images))
                                        <div class="row col-12">
                                            <h5>Playground Images</h5>
                                        </div>
                                        <!-- <div class="image-group" id="playgroundImages"> -->
                                            @foreach($playground_images as $key => $p)
                                            <div class="col-sm-12 pb-2">
                                                <!-- <a href="{{ $p['complete_path'] }}" target="_blank"><img src="{{ $p['complete_path'] }}" class="thumbnail" data-src="{{ $p['complete_path'] }}" style="width: 100px;"></a> -->
                                                @php
                                                    $path = explode('playground_images/', $p['path']);
                                                @endphp
                                                <a href="{{ $p['complete_path'] }}" target="_blank">Playground Image {{ $key+1}}</a>

                                            </div>
                                            @endforeach
                                            <div class="preview-container" id="previewContainerplayground">
                                                <span class="close-preview" onclick="closePreview('Playground')">×</span>
                                                <img src="" alt="Preview Image" class="preview-image" id="previewImageplayground">
                                            </div>
                                        <!-- </div> -->
                                      @endif
                                </div>
                                <div class="row mt-3">
                                    @if(!empty($equipment_images))
                                        <div class="row col-12">
                                            <h5>Equipment Images</h5>
                                        </div>
                                        <!-- <div class="image-group" id="equipmentImages"> -->
                                            @foreach($equipment_images as $key => $p)
                                            <div class="col-sm-12 pb-2">
                                                <!-- <a href="{{ $p['complete_path'] }}" target="_blank"><img src="{{ $p['complete_path'] }}" class="thumbnail" data-src="{{ $p['complete_path'] }}" style="width: 100px;"></a> -->
                                                @php
                                                    $path = explode('equipment_images/', $p['path']);
                                                @endphp
                                                <a href="{{ $p['complete_path'] }}" target="_blank">Equipment Image {{ $key+1}}</a>

                                            </div>
                                            @endforeach
                                           <div class="preview-container" id="previewContainerEquipment">
                                            <span class="close-preview" onclick="closePreview('Equipment')">×</span>
                                            <img src="" alt="Preview Image" class="preview-image" id="previewImageEquipment">
                                            </div>
                                        <!-- </div> -->
                                      @endif
                                </div>
                                <div class="row mt-3">
                                     @if(!empty($player_list_images))
                                        <div class="row col-12">
                                            <h5>Player List Document</h5>
                                        </div>
                                        <div class="image-group" id="playerListImages">
                                            <div class="col-sm-12 pb-2">
                                                <!-- <a href="{{ $player_list_images['complete_path'] }}" target="_blank"><img src="{{ $player_list_images['complete_path'] }}" class="thumbnail" data-src="{{ $player_list_images['complete_path'] }}" style="width: 100px;"></a> -->
                                                @php
                                                    $path = explode('player_list_files/', $player_list_images['path']);
                                                @endphp
                                                <a href="{{ $player_list_images['complete_path'] }}" target="_blank">Player List</a>
                                            </div>
                                            <div class="preview-container" id="previewContainerPlayerlist">
                                                <span class="close-preview" onclick="closePreview('Playerlist')">×</span>
                                                <img src="" alt="Preview Image" class="preview-image" id="previewImagePlayerlist">
                                            </div>
                                        </div>
                                      
                                      @endif
                                </div>
                                <div class="row mt-3">
                                     @if(!empty($coach_certificate_images))
                                        <div class="row col-12">
                                            <h5>Coach Certificate</h5>
                                        </div>
                                            <div class="col-sm-12 pb-2">
                                                <!-- <a href="{{ $coach_certificate_images['complete_path'] }}" target="_blank"><img src="{{ $coach_certificate_images['complete_path'] }}" class="" style="width: 100px;"></a> -->
                                                @php
                                                    $path = explode('coach_certificate_files/', $coach_certificate_images['path']);
                                                @endphp
                                                <a href="{{ $coach_certificate_images['complete_path'] }}" target="_blank">Coach Certificate</a>
                                            </div>
                                      @endif
                                </div>
                                <div class="row">
                                     @if(!empty($panchayat_certificate_images))
                                        <div class="row col-12">
                                            <h5>Panchayat Certificate</h5>
                                        </div>
                                        <div class="col-sm-12 pb-2">
                                            @php
                                                $path = explode('panchayat_certificate_files/',$panchayat_certificate_images['path']);
                                            @endphp
                                            <!-- <a href="{{ $panchayat_certificate_images['complete_path'] }}" target="_blank"><img src="{{ $panchayat_certificate_images['complete_path'] }}" class="" style="width: 100px;"></a> -->
                                                <a href="{{ $panchayat_certificate_images['complete_path'] }}" target="_blank">Panchayat Certificate</a>
                                        </div>
                                      @endif
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <!-- <div class="timeline">
                                    <div class="time-label">
                                        <span class="bg-red">{{ date('d M, Y', strtotime($nursery->created_at))}}</span>
                                    </div>
                                    <div>
                                        @php
                                            $createdAt = \Carbon\Carbon::parse($nursery->created_at);
                                            $now = \Carbon\Carbon::now();
                                            $diff = $createdAt->diff($now);
                                        @endphp
                                        <i class="fas fa-user bg-green"></i>
                                        <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> {{ $diff->days }} days {{ $diff->h }} hours {{ $diff->i }} minutes
                                        </span>
                                        <h3 class="timeline-header no-border"><a href="#">You</a> created nursery</h3>
                                        </div>
                                    </div>
                                    <div class="time-label">
                                        <span class="bg-green">3 Jan. 2014</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-clock bg-gray"></i>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @else
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                     
                            <div class="card-header">
                                <h4 class="card-title">Application Detail</h4>
                            <div class="text-right"><strong>Application ID: {{ $nursery->application_number ?? '' }}</strong></div>

                            
                        </div>

                        <div class="card-body">
                            <div>
                                <h3>Nursery details</h3>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Application Date</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ date('d-M-Y', strtotime($nursery->nurseryStatus->created_at)) ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">District</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->district->name }}</div>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Category of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->cat_of_nursery) }}</div>
                                    </div>
                                </div>
                            
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Name of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->name_of_nursery ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Venue of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->head_pricipal ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Email</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->email ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Registration No.</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->reg_no_running_nursery ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Pin Code</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->pin_code ?? '' }}</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Nursery Address</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->address ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Name of Coach</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->coach_name ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h3>Game Details</h3>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Game Applying For</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div> {{$nursery->game->name}}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Sports Game Discipline</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->game_disp) }}</div>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="row mt-3">
                                <div class="row col-sm-12">
                                    <div class="col-sm-6">
                                        <label class="form-label">Number of students playing concerned games</label>
                                    </div>
                                    @if($nursery->game_disp == 'boys')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->boys ?? '0' }} Boys</div>
                                    </div>
                                    @endif
                                    @if($nursery->game_disp == 'girls')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->girls ?? '' }} Girls</div>
                                    </div>
                                    @endif
                                    @if($nursery->game_disp == 'mix')
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->girls ?? '' }} Girls and {{ $nursery->girls ?? '' }} Boys</div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                           
                        
                            </div>
                          
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif
    @if(Auth::user()->role->role_id == 2 || Auth::user()->role->role_id == 1)
    @if(!empty($remarks))
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
                                    <th scope="col">Status</th>
                                    <th scope="col">Photographs</th>
                                    <th scope="col">Inspection Report</th>
                                    <th scope="col">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($remarks as $key => $remark)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$remark['user']['name']}}</td>
                                        @if($remark['recommend_status'] == 'yes')
                                        <td>Recommended</td>
                                        @else
                                        <td>Not Recommended</td>
                                        @endif
                                        <td style="width: 30%;">
                                            @if (!empty($remark['files']) && !is_null($remark['files']))
                                                @php
                                                    $reportPhotographs = explode(',', $remark['files']);
                                                @endphp
                                                @if(!empty($reportPhotographs))
                                                 
                                                    @foreach($reportPhotographs as $photo)
                                                    
                                                    <a href="{{ asset('storage/'.$nursery['application_number'].'/'.$photo)}}" target="_blank">
                                                        <img src="{{ asset('storage/'.$nursery['application_number'].'/'.$photo)}}" class="img-thumbnail" width="10%">
                                                    </a>


                                                    @endforeach
                                                @else
                                                    "N/A";
                                                @endif
                                            @endif
                                        </td>
                                        <td style="width: 30%;">
                                            @if (!empty($remark['inspection_report']) && !is_null($remark['inspection_report']))
                                                @php
                                                    $inspectionReport = explode(',', $remark['inspection_report']);
                                                @endphp
                                                @if(!empty($inspectionReport))
                                                 
                                                    @foreach($inspectionReport as $photo)
                                                    
                                                    <a href="{{ asset('storage/'.$nursery['application_number'].'/'.$photo)}}" target="_blank">
                                                        <img src="{{ asset('storage/'.$nursery['application_number'].'/'.$photo)}}" class="img-thumbnail" width="10%">
                                                    </a>


                                                    @endforeach
                                                @else
                                                    "N/A";
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $remark['remarks']}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      <!--   <div class="text-right">
                            <a href="{{ route('admin.pendingList')}}" class="btn btn-primary">Back</a>
                            @if($nursery->nurseryStatus->approved_by_admin_or_reject_by_admin == 0)
                            <a href="{{ route('admin.adminProcess',$nursery->secure_id)}}" class="btn btn-primary">Proceed</a>
                            @endif
                        </div> -->
                    </div>

                </div>
            </div>
        </div>


    </section>
    @endif
    <section class="content">
        <div class="container-fluid">
            <!-- <h2>DSO Report </h2> -->


            <div class="row">
            <div class="col-12">
            <div class="card p-2">
                @if(Auth::user()->role->role_id == 2)
                <div class="text-right">
                    <a href="{{ route('dso.index')}}" class="btn btn-primary">Back</a>
                    @if($nursery->nurseryStatus->approved_reject_by_dso == 0)
                    <a href="{{url('dso/nursery/report/').'/'.$nursery->secure_id}}" class="btn btn-primary">Proceed</a>
                    @endif
                </div>
                @elseif( Auth::user()->role->role_id == 1)
                <div class="text-right">
                    <a href="{{ route('admin.pendingList')}}" class="btn btn-primary">Back</a>
                    @if($nursery->nurseryStatus->approved_by_admin_or_reject_by_admin == 0)
                    <a href="{{route('admin.adminProcess', $nursery->secure_id)}}" class="btn btn-primary">Proceed</a>
                    @endif
                </div>
                @endif
     </div>
     </div>
     </div>
     </div>
     </section>
    @endif

</div>


@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--  <script>
  $(document).ready(function() {
       $(".thumbnail").click(function() {
            var imageUrl = $(this).data("src");
            console.log(imageUrl,"imageUrl")
            var groupId = $(this).closest('.image-group').attr('id');
            console.log(groupId,"erwererwe")
            $("#" + groupId.replace("Images", "Image")).attr("src", imageUrl);
            $("#" + groupId.replace("Images", "Container")).fadeIn();
        });
    });

    function closePreview(group) {
        $("#previewContainer" + group).fadeOut();
    }
 </script> -->