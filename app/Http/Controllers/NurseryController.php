<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Nursery;
use  App\Models\District;
use  App\Models\Game;
use  App\Models\User;
use App\Models\ApplicationRemark;
use App\Models\NurseryApplicationStatus;
use App\Models\NurseryApplicationTransaction;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\SendMail;
use App\Mail\OtpMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Otp;
use App\Models\NurseryMedia;
use App\Models\RoleType;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;

class NurseryController extends Controller
{
    public function index($status = 0)
    {
        $nursery  = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->where('approved_reject_by_dso', 0)->where('approved_by_admin_or_reject_by_admin', 0)->with('nursery')->get()->toArray();
        
        return view('nursery.list', ['layout' => 'dso.layouts.app', 'nurserys' => $nursery]);
    }
    public function pendingApproval()
    {
        $nursery  = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 0)->with('nursery')->get()->toArray();
        return view('nursery.list', ['layout' => 'dso.layouts.app', 'nurserys' => $nursery]);
    }
    public function approvalAdmin($status = 1)
    {
        $nursery  = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->where('approved_reject_by_dso', 0)->where('approved_by_admin_or_reject_by_admin', 0)->with('nursery')->get()->toArray();
        return view('nursery.list', ['layout' => 'dso.layouts.app', 'nurserys' => $nursery]);
    }
    public function approvedListbyadmin()
    {
        $nursery  = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 1)->with('nursery')->get()->toArray();
        return view('nursery.list', ['layout' => 'dso.layouts.app', 'nurserys' => $nursery]);

        // add funcnalty login link for coach



    }
    public function rejectListbyadmin()
    { 
        // die;
        $nursery  = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 2)->with('nursery')->get()->toArray();
        return view('nursery.list', ['layout' => 'dso.layouts.app', 'nurserys' => $nursery]);
    }

    public function viewNursery($id, Request $request)
    {
        $role = $this->checkRole(Auth::user()->id);
        if ($role == 'admin') {
            $nursery = Nursery::where('secure_id', $id)->get()->toArray()[0];
            $nurserRemarks = ApplicationRemark::with('user')->where('application_status_id', $nursery['nursery_status']['id'])->get()->toArray();
            return view('admin.nursery.view', ['layout' => 'admin.layouts.app', 'nursery' => $nursery, 'districts' => District::get()->toArray(), 'remarks' => $nurserRemarks, 'role' => $role]);
        } else {

            $nursery = Nursery::where('secure_id', $id)->get()->toArray()[0];
            $nurserRemarks = ApplicationRemark::with('user')->where('application_status_id', $nursery['nursery_status']['id'])->get()->toArray();
            return view('admin.nursery.view', ['layout' => 'dso.layouts.app', 'nursery' => $nursery, 'districts' => District::get()->toArray(), 'remarks' => $nurserRemarks, 'role' => $role]);
            // $nursery = Nursery::where('secure_id', $id)->where('district_id', Auth::user()->district_id)->with(['district', 'game'])->get()->toArray()[0];
            // return view('nursery.view', ['layout' => 'dso.layouts.app', 'nursery' => $nursery, 'districts' => District::get()->toArray()]);
        }
    }
        
    public function printNursery(Request $request)
    {
// dd(url('/public/forntend/images/department-logo.png'));
        $nursery = Nursery::where('secure_id',$request->nursery['secure_id'])->first();
        // dd($request->all());
        $html = view('pdf.nursery.view', $request->all())->render();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf = new Dompdf($options);
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        // $font = $pdf->getFontMetrics()->get_font("Syntex", "normal");
        // $pdf->setFont($font, 12);
        $pdf->render();
        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="nursery.pdf"'
        ]);
    }


    public function nurseryReport($id)
    {
        $nursery = Nursery::where('secure_id', $id)->where('district_id', Auth::user()->district_id)->with(['district', 'game'])->get()->toArray()[0];
        // $nurseryStatus = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->get();


        $nurseryStatus = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->get();

        $nurseryStatus['total'] = $nurseryStatus->count();
        $nurseryStatus['pending'] = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->where('approved_by_admin_or_reject_by_admin', 0)->count();
// dd($nurseryStatus);

        $nurseryStatus['approved'] = $nurseryStatus->where('approved_by_admin_or_reject_by_admin', 1)->count();
        $nurseryGames = Nursery::where('district_id', Auth::user()->district_id)->with(['district', 'game'])->get();
        // dd($nurseryGames);
        $gameCounts = $nurseryGames->groupBy('game.name')
        ->map(function ($games) {
            return $games->count();
        });
        $district_id = Nursery::where('district_id', Auth::user()->district_id)->with(['district'])->first();
        $nurseryStatus['district'] = $district_id->district->name;
        // dd($district_id->district->name);

        return view('nursery.report.form', ['layout' => 'dso.layouts.app', 'nursery' => $nursery, 'districts' => District::get()->toArray(),'nurseryStatus' => $nurseryStatus, 'gameCounts'=>$gameCounts]);
    }
    public function nurseryReportStore(Request $request, $secure_id)
    {
        $nurseryReport = $request->validate([
            'remarks' => '',
            'recommend_status' => '',
            'site_visit' => ''
        ]);
        // dd($nurseryReport);
        $nursery = Nursery::where('secure_id', $secure_id)->first();
        if (is_null($nursery->grade)) {
            if (empty($nurseryReport['remarks'])) {
                return redirect()->back()->with('error', 'Please add the remarks');
            }
            // if (empty($nurseryReport['grade'])) {
            //     return redirect()->back()->with('error', 'Please add the grade');
            // }
            $pics = null;
            if (!empty($request->file('pics')) && empty($pics)) {
                foreach ($request->file('pics') as $file) {
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move(public_path('docs/' . $secure_id . '/'), $name);
                    $pics[] = $name;
                }
            }
            $report =[];
             if (!empty($request->file('inspection_report')) && empty($report)) {
                foreach ($request->file('inspection_report') as $file) {
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move(public_path('docs/' . $secure_id . '/'), $name);
                    $pics[] = $name;
                }
            }


            $applicationRemark =  new ApplicationRemark;
            $applicationRemark->user_id = Auth::user()->id;
            $applicationRemark->application_status_id = $nursery->nurseryStatus->id;
            $applicationRemark->remarks = $nurseryReport['remarks'];
// dd($applicationRemark);
            $applicationRemark->site_visit = $nurseryReport['site_visit'];
            $applicationRemark->recommend_status = $nurseryReport['recommend_status'];
            // $applicationRemark->grade = $nurseryReport['grade'];
            $applicationRemark->files = json_encode($pics);
            $applicationRemark->inspection_report = json_encode($report);
            $applicationRemark->save();
            $applicationStatus = NurseryApplicationStatus::find($nursery->nurseryStatus->id);
            $applicationStatus->approved_reject_by_dso = 1;
            $applicationStatus->save();
        }

        if($applicationStatus->approved_reject_by_dso == 1){
            return redirect('dso/nursery/pendingapproval')->with('success', 'The application has been successfully sent to concerned official in Head Office for necessary action.');
        }else if($applicationStatus->approved_reject_by_dso == 2){
            return redirect('dso/nursery/pendingapproval')->with('success', 'Application Not recommended for further action.');

        }else{
            return redirect('dso/nursery/pendingapproval')->with('error', 'Something went wrong.');
        }
    }
    // ===============Admin
    public function AdminList()
    {
        $nursery  = NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 0)->with('nursery')->get()->toArray();
        return view('admin.nursery.list', ['layout' => 'admin.layouts.app', 'nurserys' => $nursery]);
    }
    public function AdminListApprovedorReject($status)
    {
        $nursery  = NurseryApplicationStatus::where('approved_by_admin_or_reject_by_admin', $status)->with('nursery')->get()->toArray();
        return view('admin.nursery.list', ['layout' => 'admin.layouts.app', 'nurserys' => $nursery]);
    }
    public function ApprovedRejectForm($id)
    {





        $nursery = Nursery::where('secure_id', $id)->with(['district', 'game'])->get()->toArray()[0];
        
        $TotalnurseryApproved = NurseryApplicationStatus::where('approved_by_admin_or_reject_by_admin', 1)->with('nursery')->get()->count();
        $TotalnurseryApprovedinDistrict = NurseryApplicationStatus::where('approved_by_admin_or_reject_by_admin', 1)->where('district_id', $nursery['district']['id'])->get()->count();
        $PendingForApproval = NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 0)->where('district_id', $nursery['district']['id'])->get()->count();

        $count = [
            'totalapprovednursery' => $TotalnurseryApproved,
            'totalapprovednurserydistrict' => $TotalnurseryApprovedinDistrict,
            'pendingapproval' => $PendingForApproval,
        ];
        $nurserRemarks = ApplicationRemark::with('user')->where('application_status_id', $nursery['nursery_status']['id'])->get()->toArray();
        
        return view('admin.nursery.report.form', ['layout' => 'admin.layouts.app', 'nursery' => $nursery, 'districts' => District::get()->toArray(),'count' =>$count,'remarks'=>$nurserRemarks]);
    }
    public function AdminReportStore(Request $request, $id)
    {
        // dd($request->all());
        $nursery = Nursery::where('id', $id)->first();

        $nurseryReport = $request->validate([
            'remarks' => '',
            'status' => ''
        ]);
        $status = 1;

        if ($nurseryReport['status'] == 2) {
            $status = 2;
        }
        if ($nurseryReport['status'] == 3) {
            $status = 3;
        }
        $pics = null;
        if (!empty($request->file('pics')) && empty($pics)) {
            foreach ($request->file('pics') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('docs/' . $nursery->secure_id . '/'), $name);
                $pics[] = $name;
            }
        }
        $nurseryApplicationStatus = new ApplicationRemark;
        $nurseryApplicationStatus->user_id = Auth::user()->id;
        $nurseryApplicationStatus->application_status_id = $nursery->nurseryStatus->id;
        $nurseryApplicationStatus->remarks = $nurseryReport['remarks'];
        $nurseryApplicationStatus->files = json_encode($pics);
        $nurseryApplicationStatus->save();
        $nursery  = NurseryApplicationStatus::where('id', $nursery->nurseryStatus->id)->first();
        $nursery->approved_by_admin_or_reject_by_admin = $status;
        $nursery->save();

        $nurseryData  = Nursery::where('id', $nursery->nursery_id)->first();



        $url = url('coach/registration') . "/" .  $nurseryData->secure_id;


        // dd($nursery);

        
        // $testMailData = [
        //     'title' => 'Link for Coach registration',
        //     // 'body' => '<a href="'.$url.'">Click for registration  </a>',
        //     'body' => $url,
        // ];

        // $m =  Mail::to($nurseryData->email)->send(new SendMail($testMailData));
// dd($status);
    if($status == 1){
        return redirect()->back()->with('success', 'Application has been approved Successfully');

    }else if($status == 2){
        return redirect()->back()->with('success', 'Application has been Rejected');

    }else if($status == 3){
        return redirect()->back()->with('success', 'Objection raised Successfully');

    }else{
        return redirect()->back()->with('error', 'something went wrong');

    }





        // return redirect()->back()->with('success', 'updatedddd Successfully');
    }

// Send mobile OTP
    public function validateMobileNumber(Request $request)
    {
        try{
            $updatestatus = Otp::where('mobile',$request->mobile)->update(['status'=>1]);
            $existingNursery = Nursery::where([['mobile_number', $request->mobile],['final_status', 1]])->first();
            // dd(!empty($existingNursery));
            if (!empty($existingNursery)) {
                return response()->json(['success' => false, 'message' => 'You have already registered with this phone number. Please login to view/update your application']);
            }
            $user = User::where('mobile', $request->mobile)->first();
            if (!empty($user)) {
                return response()->json(['success' => false, 'message' => 'You have already registered with this phone number.Please login to view/update your application']);
            }
            if(env('APP_ENV') == "local"){
                $otpp = '111111';
                // $otpp=$this->generateNumericOTP(6);
                // dd($otp);
                // Session::put('mobile_otp', $otp);
                $secure_id = bin2hex(random_bytes(16));
                    $otp = Otp::create([
                        'secure_id' => $secure_id,
                        'mobile' => $request->mobile,
                        'user_id'=> 'null',
                        'otp'=> $otpp,
                        'status'=> 0,
                        'created_at' => now()
                    ]);
                $sms_message   = "Dear User, ".$otpp. " is OTP for Login, Nursery Management System, Sports Department Government of Haryana";
                $tid           = "1407170557686704067";
                // $this->sendSMS($request->mobile,$sms_message,$tid);

            }else{
                $otpp=$this->generateNumericOTP(6);
                // $otp="111111";
                $secure_id = bin2hex(random_bytes(16));
                $otp = Otp::create([
                    'secure_id' => $secure_id,
                    'mobile' => $request->mobile,
                    'user_id'=> 'null',
                    'otp'=> $otpp,
                    'status'=> 0,
                    'created_at' => now()
                ]);
                $sms_message   = "Dear User, ".$otpp. " is OTP for Login, Nursery Management System, Sports Department Government of Haryana";
                $tid           = "1407170557686704067";
                $this->sendSMS($request->mobile,$sms_message,$tid);
            }
            $html = "<button type='button' class='btn btn-success validateBtn me-3' onclick=validateMobileOTP()>Validate</button><button type='button' class='btn btn-danger validateBtn me-3' onclick=resendOTP()>Resend</button></div>";
            return response()->json(['success' => true,'message' => 'OTP sent on your mobile number','html'=> $html]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error Found: ' . $e->getMessage()], 500);
        }

    }

// Verify mobile OTP
    public function validateMobileOtp(Request $request)
    {
        // dd($request->all());
        $existingNursery = Nursery::where([['mobile_number', $request->mobile],['final_status', 0]])->first();
        // $storedOtp = Session::get('mobile_otp');
        $checkOtp = Otp::where('mobile', $request->mobile)->where('status', 0)->first();
        $userOtp = $request->otp;
        // dd($checkOtp,$userOtp);
        if ($userOtp == $checkOtp->otp) {
            // Session::forget('otp');
            Otp::where('mobile', $request->mobile)->update(['status'=>1]);
            return response()->json(['status' => 'success', 'message' => 'OTP Verified','existingNursery' => $existingNursery]);
        } else {
            // Invalid OTP
            return response()->json(['status' => 'error', 'message' => 'Invalid OTP']);
        }
    }

    public function resendOTP(Request $request)
    {
        try{
              $updatestatus = Otp::where('mobile',$request->mobile)->update(['status'=>1]);
              if(env('APP_ENV') == "local"){
                $otpp=$this->generateNumericOTP(6);
                $secure_id = bin2hex(random_bytes(16));
                $otp = Otp::create([
                    'secure_id' => $secure_id,
                    'mobile' => $request->mobile,
                    'user_id'=> 'null',
                    'otp'=> $otp,
                    'status'=> 0,
                    'created_at' => now()
                ]);
                $sms_message   = "Dear User, ".$otpp. " is OTP for Login, Nursery Management System, Sports Department Government of Haryana";
                $tid           = "1407170557686704067";

                $this->sendSMS($request->mobile,$sms_message,$tid);

            }else{
                $otpp=$this->generateNumericOTP(6);
                $secure_id = bin2hex(random_bytes(16));
                $sms_message   = "Dear User, ".$otpp. " is OTP for Login, Nursery Management System, Sports Department Government of Haryana";
                $tid           = "1407170557686704067";
                    $otp = Otp::create([
                        'secure_id' => $secure_id,
                        'mobile' => $request->mobile,
                        'user_id'=> 'null',
                        'otp'=> $otp,
                        'status'=> 0,
                        'created_at' => now()
                    ]);
                $this->sendSMS($request->mobile,$sms_message,$tid);
            }
            $html = "<button type='button' class='btn btn-success validateBtn me-3' onclick=validateMobileOTP()>Validate</button><button type='button' class='btn btn-danger validateBtn me-3' onclick=resendOTP()>Resend</button></div>";
            return response()->json(['success' => true,'message' => 'OTP sent on your mobile number','html'=> $html]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error Found: ' . $e->getMessage()], 500);
        }
    }

    public function saveNurseryDetails(Request $request)
    {

        // // Retrieve the last application number from the database
        // $last_application_number = Nursery::latest()->first();
        // // Extract the last number part from the application number
        // $last_number = 0;
        // if ($last_application_number) {
        //     $last_number = (int)substr($last_application_number->application_number, -6);
        // }

        // // Increment the last number by 1 and pad it with leading zeros to ensure it's 6 digits long
        // $new_number = str_pad($last_number + 1, 6, "0", STR_PAD_LEFT);
        // // dd($new_number);

        // dd($request->all());

        $secure_id = bin2hex(random_bytes(16));
        // $updateStatus = Otp::where('mobile', $request->mobile_number)->update(['status'=> 0]);
        $random_number = random_int(100000, 999999);
        $district_code = District::where('id', $request->district_id)->first();
        $current_year = date('Y');
        if(!empty($district_code)){
            $application_number = $current_year.$district_code->code.$random_number;
        }
        $data = $request->all();
        $isRecordExist = Nursery::where([['mobile_number', $request->mobile_number],['final_status', 0]])->first();
        if($request->step == "step2"){
            $this->validateSteps($data);
            try{
                $nursery = Nursery::updateOrInsert(
                    [
                        'mobile_number' => $request->mobile_number,
                        'final_status' => 0,
                    ],
                    [
                        'secure_id' => $secure_id,
                        'application_number' => $application_number,
                        'mobile_number' => $request->mobile_number,
                        'name_of_nursery' => $request->name_of_nursery,
                        'district_id' => $request->district_id,
                        'cat_of_nursery' => $request->cat_of_nursery,
                        'type_of_nursery' => $request->type_of_nursery,
                        'address' => $request->address,
                        'reg_no_running_nursery' => $request->reg_no_running_nursery,
                        'head_pricipal' =>$request->head_pricipal,
                        'email' =>$request->email,
                        'pin_code' =>$request->pin_code,

                    ]
                );
                if ($nursery) {
                    return response()->json(['status' => 'success', 'message' => 'Nursery Information Saved Successfully. Please complete the Next Step','isRecordExist' => $isRecordExist]);
                } else {
                    return response()->json(['status' => 'error','message' => 'Error saving Nursery Details: Unknown error']);
                }
            } catch (ValidationException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Error Found: ' . $e->getMessage()]);
            }

        }elseif($request->step == "step3"){
                // dd($request->file('playground_images'));
            $this->validateSteps($data);
            try{
                $updateThirdStep = Nursery::where('mobile_number', $request->mobile_number)->update([
                    'final_status' =>0,
                    'game_id' =>$request->game_id,
                    'game_disp' =>$request->game_disp,
                    'playground_hall_court_available' =>$request->playground_hall_court_available,
                    'boys' =>$request->boys,
                    'girls' =>$request->girls,
                    'equipment_related_to_selected_games_available' =>$request->equipment_related_to_selected_games_available,
                  
                    'whether_nursery_will_provide_fee_concession_to_selected_players' =>$request->whether_nursery_will_provide_fee_concession_to_selected_players,
                    'whether_nursery_will_provide_sports_kits_to_selected_players' =>$request->whether_nursery_will_provide_sports_kits_to_selected_players,
                    'whether_qualified_coach_is_available_for_the_concerned_game' =>$request->whether_qualified_coach_is_available_for_the_concerned_game,
                    'any_specific_achievements_of_the_institute_during_last' =>$request->any_specific_achievements_of_the_institute_during_last,
                    // 'facility_images' => json_encode($facility_images)
                    'year_allotment' => $request->year_allotment,
                    'coach_name' => $request->coach_name,
                    'coach_qualification' => $request->coach_qualification,
                    'percentage_fee' => $request->percentage_fee,
                    'game_descipline_previous'=>$request->game_disp_previous,
                    'game_previous_id'=>$request->game_previous_id,
                    'already_running_nursery'=>$request->already_running_nursery,

                ]);
                // dd($updateThirdStep);
                if($updateThirdStep) {
                        return response()->json(['status' => 'success', 'message' => 'step3 saved','isRecordExist' => $isRecordExist]);
                }else {
                    return response()->json(['status' => 'error','message' => 'Error saving gaming Details: Unknown error']);
                }

            } catch (ValidationException $e) {
                    // die("here");

                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            } catch (\Exception $e) {
                    // die("here");

                return response()->json(['status' => 'error', 'message' => 'Error saving gaming Details: ' . $e->getMessage()]);
            }

        }else if($request->step == "step4"){
            $currentsavedNursery = Nursery::where('mobile_number', $request->mobile_number)->first();

            /************** playground validation **************/
            if($request->playground_hall_court_available == 'yes'){
                $playgroundfiles = explode(',',$request->playground_images[0]);
                if (count($playgroundfiles) < 3) {
                    return response()->json(['status' => 'error','message' => 'Playground Files can not be less than 3']);
                } else if(count($playgroundfiles) > 3) {
                    return response()->json(['status' => 'error','message' => 'Playground Files can not be greater than 3']);
                }
            }

            /************** equipment validation **************/
            if($request->equipment_related_to_selected_games_available == 'yes'){
                $equipmentfiles = explode(',',$request->equipment_images[0]);
                if (count($equipmentfiles) < 3) {
                    return response()->json(['status' => 'error','message' => 'Equipment Files can not be less than 3']);
                } elseif(count($equipmentfiles) > 3) {
                    return response()->json(['status' => 'error','message' => 'Equipment Files can not be greater than 3']);
                } 
            }
            /************** player_list validation **************/
            if(empty($request->player_list)){
                return response()->json(['status' => 'error','message' => 'Upload player list file']);
            }

            /************** coach_certificate validation **************/
            if($request->whether_qualified_coach_is_available_for_the_concerned_game == 'yes'){
                if(empty($request->coach_certificate)){
                    return response()->json(['status' => 'error','message' => 'Upload coach certificate']);
                }
            }

            if(!empty($playgroundfiles) && count($playgroundfiles) === 3 && $request->playground_hall_court_available == 'yes'){
                
                NurseryMedia::create([
                    'nursery_id'=> $currentsavedNursery->id,
                    'type' => "playground",
                    'media_path' => $request->playground_images[0],
                    'created_at'=>now()
                ]);
            }
            if(!empty($equipmentfiles) && count($equipmentfiles) === 3 && $request->equipment_related_to_selected_games_available == 'yes'){
                NurseryMedia::create([
                    'nursery_id'=> $currentsavedNursery->id,
                    'type' => "equipment",
                    'media_path' => $request->equipment_images[0],
                    'created_at'=>now()
                ]);
                
            }

            if(!empty($request->player_list)){
                NurseryMedia::create([
                    'nursery_id'=> $currentsavedNursery->id,
                    'type' => "player_list",
                    'media_path' => $request->player_list,
                    'created_at'=>now()
                ]);
            }

            if(!empty($request->coach_certificate)  && $request->whether_qualified_coach_is_available_for_the_concerned_game == 'yes'){
                NurseryMedia::create([
                    'nursery_id'=> $currentsavedNursery->id,
                    'type' => "coach_certificate",
                    'media_path' => $request->coach_certificate,
                    'created_at'=>now()
                ]);
            }
            if(!empty($request->panchayat_certificate)  && $request->type_of_nursery == 'panchayat'){
                NurseryMedia::create([
                    'nursery_id'=> $currentsavedNursery->id,
                    'type' => "panchayat_certificate",
                    'media_path' => $request->panchayat_certificate,
                    'created_at'=>now()
                ]);
            }
            $nursery = Nursery::where(
                'id', $currentsavedNursery->id)->update(['final_status'=>1]);
                
            $nurseryStatus = NurseryApplicationStatus::create([
                'nursery_id'=>$currentsavedNursery->id,
                'district_id'=>$currentsavedNursery->district_id,
                'created_at'=>now()
            ]);

            if($nurseryStatus){
                    // $nurseryTransaction = NurseryApplicationTransaction::create([
                    //     'nursery_id'=>$currentsavedNursery->id,
                    //     'transaction_date'=>date('Y-m-d'),
                    //     'action_by'=> $user->id
                    // ]);
                $user = User::create([
                    'secure_id'=> $secure_id,
                    'name'=> $request->name_of_nursery,
                    'email'=> $request->email,
                    'mobile'=> $request->mobile_number,
                    'district_id'=> $request->district_id,
                    'password'=> bin2hex(random_bytes(16)),
                    'created_at '=> now(),
                ]);
                if($user){
                    
                    RoleType::create(['user_id'=>$user->id,'role_id'=>'5']);

                    return response()->json(['status' => 'success','message' => 'Your application is submitted successfully.     
                            You can edit your application till 26-02-2024, 6:00 PM, after which it will be considered final. To view your application or status, please login again.']);

                }else{
                    // die("f");
                    return response()->json(['status' => 'error','message' => 'Error saving user Details: Unknown error']);
                }
            }else{
                // die("ggg");
                return response()->json(['status' => 'error','message' => 'Error saving nursery status Details: Unknown error']);

            }
        }


    }

    public function validateSteps($data)
    {
        if($data['step'] == "step2"){
            $rules = [
                'district_id' => 'required',
                'cat_of_nursery' => 'required',
                'type_of_nursery' => 'required',
                'name_of_nursery' => 'required|string|max:100|min:5',
                'address' => 'required|string|max:255',
                'reg_no_running_nursery' => 'required',
                'head_pricipal' => 'required|string|max:100',
                'email' => 'required|email|max:100|unique:users,email',
                'pin_code' => 'required|digits:6'


            ];

            $messages = [
                'name_of_nursery.max' => 'The name must not exceed 100 characters.',
                'email.email' => 'Please enter a valid email address.',
                'email.required' => 'The email field is required.',
            ];
        }
        elseif($data['step'] == "step3"){
// dd($data);
            $rules =[
                'game_id' => 'required',
                'game_disp' => 'required',
                'playground_hall_court_available' => 'required',
                'equipment_related_to_selected_games_available' => 'required',
                'whether_qualified_coach_is_available_for_the_concerned_game' => 'required',
                'boys' => ['required_if:game_disp,boys,mix'],
                'girls' => ['required_if:game_disp,girls,mix'],
                'any_specific_achievements_of_the_institute_during_last' => 'required',
                'coach_name' => ['required_if:whether_qualified_coach_is_available_for_the_concerned_game,yes'],
                'coach_qualification' => ['required_if:whether_qualified_coach_is_available_for_the_concerned_game,yes'],
                // 'coach_certificate' => ['required_if:whether_qualified_coach_is_available_for_the_concerned_game,yes'],//file
                'already_running_nursery' => 'required',
                'year_allotment' => ['required_if:already_running_nursery,yes'],
                'game_previous_id' => ['required_if:already_running_nursery,yes'],
                'game_disp_previous' => ['required_if:already_running_nursery,yes'],
                'whether_nursery_will_provide_sports_kits_to_selected_players' => 'required',
                'whether_nursery_will_provide_fee_concession_to_selected_players' => 'required',
                'percentage_fee' => ['required_if:whether_nursery_will_provide_fee_concession_to_selected_players,yes'],
                // 'playground_images' => $data['playground_hall_court_available'] == 'yes' ? 'required|array|max:3' : '',
                // 'playground_images.*' => 'image|mimes:jpeg,png,jpg|max:300',//file
                // 'equipment_images' => $data['equipment_related_to_selected_games_available'] == 'yes' ? 'required|array|max:3' : '',
                // 'equipment_images.*' => 'image|mimes:jpeg,png,jpg|max:300',//file
                // 'player_list' => 'required',//file

            ];

            $messages =[];
        }
        $validator = Validator::make($data, $rules, $messages);
        // dd($validator->errors()->toArray());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }

    public function generalInstructions()
    {
        return view('nursery.general_instructions');
    }
    public function AdminListNotRecomanded()
    {
        $nursery  = NurseryApplicationStatus::where('approved_reject_by_dso', 2)->where('approved_by_admin_or_reject_by_admin', 0)->with('nursery')->get()->toArray();
        return view('admin.nursery.list', ['layout' => 'admin.layouts.app', 'nurserys' => $nursery]);

    }
    public function AdminListRecomanded ()
    {
        $nursery  = NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 0)->with('nursery')->get()->toArray();
        return view('admin.nursery.list', ['layout' => 'admin.layouts.app', 'nurserys' => $nursery]);

    }
    public function objectionListbyadmin()
    {
        // die;
        $nursery = NurseryApplicationStatus::where('district_id', Auth::user()->district_id)->where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 3)->with('nursery')->get()->toArray();
        return view('nursery.list', ['layout' => 'dso.layouts.app', 'nurserys' => $nursery]);
    }

    public function NurseryFileUpload(Request $request)
    {
        // dd($request->all());
        $filePath = '';
        if ($request->hasFile('playgroundfile')) {
            $file = $request->file('playgroundfile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs('playground_images', $fileName, 'public');
            $filePath = 'playground_images/'.$fileName;
        }elseif($request->hasFile('equipmentfile')) {
            $file = $request->file('equipmentfile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs('equipment_images', $fileName, 'public');
            $filePath = 'equipment_images/'.$fileName;
        }elseif($request->hasFile('playerListFile')) {
            $file = $request->file('playerListFile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs('player_list_files', $fileName, 'public');
            $filePath = 'player_list_files/'.$fileName;
        }elseif($request->hasFile('coachCertificateFile')) {
            $file = $request->file('coachCertificateFile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs('coach_certificate_files', $fileName, 'public');
            $filePath = 'coach_certificate_files/'.$fileName;
        }elseif($request->hasFile('panchayatCertificateFile')) {
            $file = $request->file('panchayatCertificateFile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs('panchayat_certificate_files', $fileName, 'public');
            $filePath = 'panchayat_certificate_files/'.$fileName;
        }
        
        return $filePath;
    }

    public function NurseryFileRemove(Request $request)
    {        
        if ($request->filePath) {
            if (Storage::exists('public/'.$request->filePath)) {
                Storage::delete('public/'.$request->filePath);
            }
        }

    }

    public function getnurseryData(Request $request)
    {
        try{
            $isRecordExist = Nursery::with(['nurseryMedias'])->where('mobile_number', $request->mobile)->where('final_status',0)->first();
            if ($isRecordExist) {
                return response()->json(['status' => 'success', 'message' => 'Nursery Information get Successfully. Please complete the Next Step','isRecordExist' => $isRecordExist]);
            } else {
                return response()->json(['status' => 'success']);
            }
        }catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    public function dashboardMis()
    {
        return view('dashboardmis');
    }






}




