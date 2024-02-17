<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Template</title>

    <link type="text/css" rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">

    <style>

        body {
            font-family: 'Tahoma', sans-serif;
        }

        .container {
            max-width: 99%;
        }

        .pdf-header {
            max-width: 98%;
            margin-top: 20px;
        }

        .pdf-title {
            font-weight: 600;
            text-decoration: underline;
            text-align: center;
        }

        .logo img {
            width: 70px;
            height: 70px;
        }

        .dept-name {
            margin-left: 10px;
            margin-top: 20px;
        }

        .dept-name h1 {
            font-size: 12px;
            font-weight: 600;
        }

        .dept-name h2 {
            font-size: 10px;
            line-height: 1px;
        }

        .app-id {
            font-size: 12px;
            line-height: 12px;
            text-align: center;
        }

        .app-id h1 {
            color: #005ce7;
            background: #F5F7FC;
            font-size: 12px;
            border: 1px solid black;
            font-weight: 600;
            line-height: 20px;
        }

        .app-date {
            margin-top: -8px;
            font-size: 12px;
            text-align: center;
        }

        .app-date span {
            font-weight: 550;
        }

        .pdf-table {
            margin: 14px;
        }

        .pdf-table .table-content thead th {
            padding: 5px 5px;
            font-size: 12px;
            color: #005ce7;
            font-weight: 500;
            line-height: 18px;
            white-space: nowrap;
            border: 1px solid #ECEDF2;
            text-align: left;
            width: 150px;

        }

        .pdf-table .table-content tbody th {
            padding: 5px 5px;
            font-size: 12px;
        }

        .pdf-table .table-content tbody tr {
            border: 1px solid #ECEDF2;
        }

        .pdf-table .table-content tr td {
            padding: 5px 10px;
            border: 1px solid #ECEDF2;
            font-size: 12px;
            color: #535353;
            font-weight: 400;
            white-space: nowrap;
        }

        .pdf-table .table-content tr td strong{
            font-weight: 600;
        }

        .pdf-table .table-content {
            background: #ffffff;
            border-radius: 5px;
            width: 100%;
            min-width: 550px;
        }

        .pdf-table .table-content thead {
            background: #F5F7FC;
            border-radius: 8px;
            color: #ffffff;
        }

        .table-contentt{
            background: #ffffff;
            border-radius: 5px;
            width: 100%;
        }


    </style>

</head>
<body>
    <div class="container">
            
            <div class="pdf-header">
                <div class="row">
                    <div class="pdf-title">
                        APPLICATION FOR SPORTS NURSERY 
                    </div>
                </div>
                <table style="width: 740px;">
                    <tr>
                       <!--  <td>
                            <div class="logo">
                                <img src="data:image/png;base64,{{url('/public/forntend/images/department-logo.png')}}" >
                            </div>
                        </td> -->
                        <td>
                            <div class="dept-name">
                                <h1>Department of Sports</h1>
                                <h2>Government of Haryana</h2>
                            </div>
                        </td>
                        <td style="width: 50%;">
                            <div></div>
                        </td>
                        <td>
                            <div class="app-id">
                                APPLICATION ID <h1>{{$nursery['application_number']}}</h1>
                            </div>
                            <div class="app-date">
                                Received On: <span>{{ date('d-m-Y',$nursery['created_at'])}}</span>
                            </div>
                        </td>
                    </tr>
                </table>
               <!--  <div class="row">
                    <div class="col-sm-1">
                        <div class="logo">
                            <img src="{{url('/images/Logo_Sports_Haryana.jpg')}}" >
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="dept-name">
                            <h1>Department of Sports</h1>
                            <h2>Government of Haryana</h2>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="app-id">
                                APPLICATION ID <h1>12345</h1>
                            </div>
                            <div class="app-date">
                                Received On: <span>15-02-2024</span>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="pdf-table">
                <table class="table-content">
                    <thead>
                        <tr>
                            <th>District</th>
                            <td>{{$nursery['district']['name']}}</td>
                            <th>Game</th>
                            <td>{{$nursery['game']['name']}}</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <td>{{$nursery['cat_of_nursery'] == 'govt' ? 'Goverment' : 'Private'}}</td>
                            <th>Type</th>
                            <td>{{$nursery['type_of_nursery']}}</td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Game Discipline</th>
                            <td>{{$nursery['game_disp']}}</td>
                            <th>Total Players</th>
                            <td> <strong>Boys:</strong> {{$nursery['boys'] ?? ''}} <br><strong>Girls:</strong> {{$nursery['girls'] ?? ''}}</td>
                        </tr>
                    </thead>
                </table>
                <div style="margin-top:14px;"> </div>
                <table class="table-content">
                    <tbody>
                        <tr>
                            <td>Name of School/Institute/Coaching Centre</td>
                            <td>{{$nursery['name_of_nursery']}}</td>
                        </tr>
                        <tr>
                            <td>Name of Head/Principal</td>
                            <td>{{$nursery['head_pricipal']}}</td>
                        </tr>
                        <tr>
                            <td>Registration No. of Society</td>
                            <td>{{$nursery['reg_no_running_nursery']}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$nursery['address']}}</td>
                        </tr>
                    </tbody>
                </table>
                <div style="margin-top:14px;"> </div>
                <table class="table-content">
                    <tbody>
                        <tr>
                            <td>Mobile Number</td>
                            <td>{{$nursery['mobile_number']}}</td>
                            <td>Email ID</td>
                            <td>{{$nursery['email']}}</td>
                        </tr>
                    </tbody>
                </table>
                <div style="margin-top:14px;"> </div>
                <table class="table-content">
                    <tbody>
                        <tr>
                            <td>Playground/Hall/Court available?</td>
                            <td>{{$nursery['playground_hall_court_available']}}</td>
                            <td>Sports Equipment available?</td>
                            <td>{{$nursery['equipment_related_to_selected_games_available'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Qualified coach available?</td>
                            <td>{{$nursery['whether_qualified_coach_is_available_for_the_concerned_game'] ?? ''}}</td>
                            <td>Name of Coach</td>
                            <td>{{$nursery['coach_name'] ?? 'Not Applicable'}}</td>
                        </tr>
                        <tr>
                            <td>Highest Qualification of Coach</td>
                            <td colspan="3">{{$nursery['coach_qualification'] ?? 'Not Applicable'}}</td>
                        </tr>
                        <tr>
                            <td>Fee concession will be provided to players?</td>
                            <td>{{$nursery['whether_nursery_will_provide_fee_concession_to_selected_players']}}</td>
                            <td>Percentage of fee concession</td>
                            <td>{{$nursery['percentage_fee'] ?? 'Not Applicable'}}</td>
                        </tr>
                        <tr>
                            <td>Highest Achievement Level of players?</td>
                            <td>{{$nursery['any_specific_achievements_of_the_institute_during_last']}}</td>
                            <td>Sports kits will be provided to players?</td>
                            <td>{{$nursery['whether_nursery_will_provide_sports_kits_to_selected_players'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>    
                <div style="margin-top:14px;"> </div>
                <table class="table-content">
                    <thead>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                          <strong> DSO Feasibility Report</strong>
                            <!-- <td>Test['dso']</td> -->
                            </td>
                        </tr>
                        <tr>
                            <th>Site Visit done?</th>
                            <td>{{ $nursery['site_visit'] ?? 'Yes'}}</td>
                        </tr>
                      <!--   <tr>
                            <th>Inspection Report attached?</th]>
                            <td></td>
                        </tr> -->
                        <tr>
                            <th>Remarks</th>
                            <td>Remarks by DSO</td>
                        </tr>
                        <tr>
                            <th>Recommendation</th>
                            <td><strong>Recommended for Approval</strong></td>
                        </tr>
                    </thead>
                </table>
                <div style="margin-top:14px;"> </div>
                <table class="table-content">
                    <tbody>
                        <tr>
                            <td>HQ Official Name</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td colspan="3"></td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Remarks</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <th>Recommendation by HQ</th>
                            <td><input type="checkbox"> Approved</td>
                            <td><input type="checkbox"> Rejected</td>
                            <td><input type="checkbox"> Objection Raised</td>
                        </tr>
                    </tbody>
                </table>
                <div style="margin-top:20px; font-size: 11px;">
                    Date: _______________
                </div>
                <div style="margin-top:20px;text-align: right; font-size: 11px;">
                    Sign & Stamp: ___________________
                </div>
            </div>
        </div>

</body>
</html>