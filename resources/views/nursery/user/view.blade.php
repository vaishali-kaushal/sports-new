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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Application Detail</h4>
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
                                        <label for="exampleInputEmail1">District</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->district->name }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Category of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->cat_of_nursery) }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Type of Nursery</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ ucfirst($nursery->type_of_nursery) }}</div>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Educational  Center</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->name_of_nursery ?? '' }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="row col-sm-6">
                                    <div class="col-sm-6">
                                        <label class="form-label">Name of Head/Principal</label>
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
                                        <label for="exampleInputEmail1">Address</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>{{ $nursery->address ?? '' }}</div>
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
                            </div>
                            <div class="col-sm-3">
                                <!-- <div class="timeline">
                                    <div class="time-label">
                                        <span class="bg-red">{{ date('d M, Y', $nursery->created_at)}}</span>
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

</div>


@endsection
 