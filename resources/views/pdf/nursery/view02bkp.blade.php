<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Template</title>
    <style>
        th,td {
            text-align: left;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width:100%;
            page-break-inside: avoid;
        }
        .table-heading {
            page-break-before: always;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Nursery Application Ref No. 324567</h1>
    <table>
        <tbody>
            <tr>
                <th>Name of Nursery</th>
                <td>{{$nursery['name_of_nursery']}}</td>
            </tr>
            <tr>
                <th>Category of Nursery</th>
                <td>{{$nursery['cat_of_nursery'] === '1' ? 'Private' : 'Government'}}</td>
            </tr>
            <tr>
                <th>Games</th>
                <td>{{$nursery['game']['name']}}</td>
            </tr>
            <tr>
                <th>District</th>
                <td>{{$nursery['district']['name']}}</td>
            </tr>
            <tr>
                <th>Type of Nursery</th>
                <td>{{$nursery['type_of_nursery'] === '1' ? 'School' : 'Institute'}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$nursery['address']}}</td>
            </tr>
            <tr>
                <th>Registration No. of Society who will be running Nursery</th>
                <td>{{$nursery['reg_no_running_nursery']}}</td>
            </tr>
            <tr>
                <th>Name of Head/Principal</th>
                <td>{{$nursery['head_pricipal']}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$nursery['email']}}</td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td>{{$nursery['mobile_number']}}</td>
            </tr>
           
            <tr>
                <th>Select Games/Disciplines</th>
                <td>
                    @if($nursery['game_disp'] === 'girls')
                        Girls
                    @elseif($nursery['game_disp'] === 'boys')
                        Boys
                    @elseif($nursery['game_disp'] === 'mix')
                        Mix
                    @endif

                </td>
            </tr>
            <tr>
                <th>Playground/Hall/Court available</th>
                <td>
                    @if($nursery['playground_hall_court_available'] === '1')
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th>Equipment related to selected Games available</th>
                <td>
                    @if($nursery['equipment_related_to_selected_games_available'] === '1')
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th>Whether Nursery will provide Sports kits to selected players?</th>
                <td>
                    @if($nursery['whether_nursery_will_provide_sports_kits_to_selected_players'] === '1')
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th>Whether Nursery will provide fee concession to selected players?</th>
                <td>
                    @if($nursery['whether_nursery_will_provide_fee_concession_to_selected_players'] === '1')
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th>Whether qualified coach is available for the concerned game?</th>
                <td>
                    @if($nursery['whether_qualified_coach_is_available_for_the_concerned_game'] === '1')
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th>No. of boys playing concerned games</th>
                <td>{{$nursery['boys']}}</td>
            </tr>
            <tr>
                <th>No. of girls playing concerned games</th>
                <td>{{$nursery['girls']}}</td>
            </tr>
            <tr>
                <th>Any specific achievements of the Institute during last 5 years</th>
                <td>{{$nursery['any_specific_achievements_of_the_institute_during_last']}}</td>
            </tr>
        </tbody>
    </table>
    <h1 style="margin:15px 10px 0px;" class="table-heading">Remarks</h1>
    <table>
        <thead>
            <tr>
                <th  width="40%" align="left" style="padding: 5px;">
                    Name
                </th>
                <th align="center" style="padding: 5px;">
                    Remarks
                </th>
                <th align="center" style="padding: 5px;">
                    Site Visit
                </th>
                <th align="center" style="padding: 5px;">
                    Recommendations
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($remarks as $remark)
                <tr>
                    <td style="padding: 5px;">{{$remark['user']['name']}}</td>
                    <td align="center" style="padding: 5px;">{{ $remark['remarks']}}</td>
                    <td align="center" style="padding: 5px;">{{ (!empty($remark['site_visit'])&& !is_null($remark['site_visit'])
                        )?$remark['site_visit']:'N/A' }}</td> 
                    <td align="center" style="padding: 5px;">
                        @if($remark['recommend_status'] == 'yes')
                            Recommended
                        @else
                            Not recommended
                        @endif
                    </td>

                    
                </tr>
                <tr>
                    <td colspan="4" align="right" style=" padding: 5px;">
                        <div>
                            <h3  style="margin-top:1px;margin-bottom:3px;">Nursery photos</h3>
                            <table>
                                <tbody>
                                    <tr>
                                            @if (!empty($remark['files']) && !is_null($remark['files']))
                                                @php
                                                    $picss = json_decode($remark['files']);
                                                @endphp
                                                @if(!empty($picss))
                                                    @foreach ($picss as $p)
                                                        @php
                                                            $imageData = file_get_contents(url('public/docs/').'/'.$nursery['secure_id'].'/'.$p);

                                                            $base64Image = base64_encode($imageData);
                                                        @endphp
                                                        <a href="{{url('public/docs/').'/'.$nursery['secure_id'].'/'.$p}}"
                                                            target="_blank">

                                                            <img src="data:image/png;base64,{{$base64Image}}"
                                                                class="img-thumbnail" width="300px" height="300px">
                                                        </a>
                                                    @endforeach
                                                @else
                                                    echo"N/A";
                                                @endif
                                            @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right" style=" padding: 5px;">
                        <div>
                            <h3 style="margin-top:1px;margin-bottom:3px;">Inspection report</h3>
                            <table>
                                <tbody>
                                    <tr>
                                        @if (!empty($remark['inspection_report']) && !is_null($remark['inspection_report']))
                                            @php
                                                $inspection_reports = json_decode($remark['inspection_report']);
                                            @endphp
                                            @if(!empty($inspection_reports))
                                                @foreach ($inspection_reports as $p)
                                                    @php
                                                        $imageData = file_get_contents(url('public/docs/').'/'.$nursery['secure_id'].'/'.$p);

                                                        $base64Image = base64_encode($imageData);
                                                    @endphp
                                                    <a href="{{url('public/docs/').'/'.$nursery['secure_id'].'/'.$p}}"
                                                        target="_blank">

                                                        <img src="data:image/png;base64,{{$base64Image}}"
                                                            class="img-thumbnail" width="300px" height="300px">
                                                    </a>
                                                @endforeach
                                            @else
                                                echo"N/A";
                                            @endif
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
    <div style="text-align: left;margin-top:5px">
       <input type="checkbox" class="form-check-input" name="approve" disabled ><label class="form-check-label fw-normal" for="flexCheckChecked">Approve</label>
       <input type="checkbox" class="form-check-input" name="reject" disabled ><label class="form-check-label fw-normal" for="flexCheckChecked">Reject</label>
    </div>
    <div style="text-align: right;margin-top:5px">
        Signature with Stamp
    </div>
    </div>
</body>
</html>
