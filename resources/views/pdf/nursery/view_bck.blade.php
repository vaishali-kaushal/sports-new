
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nursery</h1>
                </div>
                <div class="col-sm-6 text-right">
                 <!-- p -->
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card p-5">
                       
                        <form class="regis-form" method="post">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label">Category of Nursery</label>
                                    <input type="text" name="cat_of_nursery" value="@if(!empty($nursery['cat_of_nursery']))
                                        @if($nursery['cat_of_nursery'] = "1")
                                            {{ 'Private' }}
                                        @else
                                            {{ 'Government' }}
                                        @endif
                                    @endif">
                                </div>

                                <div class="col-sm-6">
                                            <label class="form-label">Games</label>
                                            <!-- <label for="exampleInputPassword1">Games</label> -->
                                            <input type="text" name="game_id" value="
                                            @if (!empty($nursery['game_id']))
                                                @if ($nursery['game'])
                                                    {{ $nursery['game']['name'] }}

                                                @endif
                                            @endif">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">District</label>
                                    <input type="text" name="district_id" value="
                                            @if (!empty($nursery['district_id']))
                                                @if ($nursery['district'])
                                                    {{ $nursery['district']['name'] }}

                                                @endif
                                            @endif">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Type of Nursery</label>
                                    <input type="text" name="type_of_nursery" value="@if(!empty($nursery['type_of_nursery']))
                                        @if($nursery['type_of_nursery'] = "1")
                                            {{ 'School' }}
                                        @else
                                            {{ 'Institute' }}
                                        @endif
                                    @endif">
                                  
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Name of Nursery</label>
                                    <input type="text" class="form-control" name="name_of_nursery" value="{{!empty($nursery['name_of_nursery']) ? $nursery['name_of_nursery'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address">{{!empty($nursery['address']) ? $nursery['address'] : '' }}</textarea>

                                </div>
                                @if($nursery['pan_private'] != null)
                                <div class="col-sm-6">
                                    <label class="form-label">PAN No. (for private only)</label>
                                    <input type="text" class="form-control" name="pan_private" value="{{ !empty($nursery['pan_private'])? $nursery['pan_private'] : '' }}">
                                </div>
                                @endif
                                <div class="col-sm-6">
                                    <label class="form-label">Registration No. of Society who will be running
                                        Nursery</label>
                                    <input type="text" class="form-control" name="reg_no_running_nursery" value="{{!empty($nursery['reg_no_running_nursery']) ? $nursery['reg_no_running_nursery'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Name of Head/Principal</label>
                                    <input type="text" class="form-control" name="head_pricipal" value="{{!empty($nursery['head_pricipal']) ? $nursery['head_pricipal'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{!empty($nursery['email']) ? $nursery['email'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="number" class="form-control" name="mobile_number" value="{{!empty($nursery['mobile_number']) ? $nursery['mobile_number'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Bank Account Number</label>
                                    <input type="number" class="form-control" name="bank_ac" value="{{!empty($nursery['bank_ac']) ? $nursery['bank_ac'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name" value="{{!empty($nursery['bank_name']) ? $nursery['bank_name'] : '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Bank IFSC Code</label>
                                    <input type="text" class="form-control" name="bank_ifc_code" value="{{!empty($nursery['bank_ifc_code']) ? $nursery['bank_ifc_code'] : '' }}">
                                </div>
                                <!-- <div class="col-sm-6">
                                    <label class="form-label">Type of Nursery</label>
                                     <select class="form-control form-select" aria-label="Default select example" name="typr_of_nursery">
                                        <option selected>Open this select menu</option>
                                        <option value="1">School</option>
                                         <option value="2"<?php  //if(!empty($nursery['game_disp)){ if($nursery['game_disp ="2"){  echo"selected";   }} 
                                                            ?>   >Institute</option>
                                    </select>
                                </div> -->
                                <div class="col-sm-6">
                                    <label class="form-label">Select Games/Disciplines</label>
                                  <input type="text" name="game_disp" value="
                                    @if(!empty($nursery['game_disp']))
                                        @if($nursery['game_disp'] = '1')
                                            {{ 'One' }}
                                        @elseif($nursery['game_disp'] = '2')
                                            {{ 'Two' }}
                                        @elseif($nursery['game_disp'] = '3')
                                            {{ 'Three' }}
                                        @else
                                            {{ 'Four' }}
                                        @endif
                                    @endif">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Playground/Hall/Court available</label>
                                    <input type="text" name="playground_hall_court_available" value="
                                    @if($nursery['playground_hall_court_available'] == '1') {{ 'Yes' }} @else {{ 'No' }} @endif">

                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Equipment related to selected Games
                                        available</label>
                                    <input type="text" name="equipment_related_to_selected_games_available" value="@if(!empty($nursery['equipment_related_to_selected_games_available']))
                                        @if($nursery['equipment_related_to_selected_games_available'] = '1')
                                            {{ 'Yes' }}
                                        @else
                                            {{ 'No' }}
                                        @endif
                                    @endif">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Whether Nursery will provide Sports kits to
                                        selected players?</label>
                                    <input type="text" name="whether_nursery_will_provide_sports_kits_to_selected_players" value="@if(!empty($nursery['whether_nursery_will_provide_sports_kits_to_selected_players']))
                                        @if($nursery['whether_nursery_will_provide_sports_kits_to_selected_players ']= '1')
                                            {{ 'Yes' }}
                                        @else
                                            {{ 'No' }}
                                        @endif
                                    @endif">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Whether Nursery will provide fee concession to
                                        selected players?</label>
                                    <input type="text" name="whether_nursery_will_provide_fee_concession_to_selected_players" value="
                                    @if(!empty($nursery['whether_nursery_will_provide_fee_concession_to_selected_players']))
                                        @if($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'] = "1")
                                            {{ 'Yes' }}
                                        @else
                                            {{ 'No' }}
                                        @endif
                                    @endif">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Whether qualified coach is available for the
                                        concerned game?</label>
                                        <input type="text" name="whether_qualified_coach_is_available_for_the_concerned_game" value="
                                    @if(!empty($nursery['whether_qualified_coach_is_available_for_the_concerned_game']))
                                        @if($nursery['whether_qualified_coach_is_available_for_the_concerned_game'] = "1")
                                            {{ 'Yes' }}
                                        @else
                                            {{ 'No' }}
                                        @endif
                                    @endif">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">No. of students playing concerned games</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label">Boys</label>
                                            <input type="text" class="form-control" name="boys" value="{{!empty($nursery['boys']) ? $nursery['boys'] : '' }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">Girls</label>
                                            <input type="text" class="form-control" name="girls" value="{{!empty($nursery['girls']) ? $nursery['girls'] : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Any specific achievements of the Institute during
                                        last 5 years</label>
                                    <textarea class="form-control" name="any_specific_achievements_of_the_institute_during_last">{{!empty($nursery['any_specific_achievements_of_the_institute_during_last']) ? $nursery['any_specific_achievements_of_the_institute_during_last'] : '' }}
                                    </textarea>

                                </div>

                            </div>
                        </form>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>