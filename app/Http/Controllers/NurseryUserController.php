<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nursery;
use App\Models\District;
use App\Models\Game;
use App\Models\User;
use App\Models\ApplicationRemark;
use App\Models\NurseryApplicationStatus;
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
use App\Models\CoachQualification;
use Illuminate\Support\Facades\Storage;


class NurseryUserController extends Controller
{
    public function index()
    {
        return view('nursery.user.dashboard');
    }

    public function userNursery()
    {
        $user_mobile = Auth::user()->mobile;
        $nursery = Nursery::with('nurseryMedias')->where('mobile_number', $user_mobile)->where('final_status',1)->first();
        $districts = District::get()->toArray();
        $games = Game::get()->toArray();
        $coach_qualification = CoachQualification::where('is_active', 1)->get()->toArray();
        $nurseryPhotos =[];
        $playground_images = []; 
        $equipment_images = []; 
        $player_list_images = []; 
        $coach_certificate_images = []; 
        $panchayat_certificate_images = []; 
        // dd($nursery['nurseryMedias']);
        foreach ($nursery['nurseryMedias'] as $nurseryMedia) {
            switch ($nurseryMedia->type) {
                case 'playground':
                    foreach(explode(',', $nurseryMedia->media_path) as $path){
                        $complete_path = asset('storage/'.$nursery->application_number.'/'.$path);
                        $newPath = $nursery->application_number.'/'.$path;
                        array_push( $playground_images, ["path"=> $path, "complete_path"=>$complete_path]);
                    }
                    break;
                case 'equipment':
                    foreach(explode(',', $nurseryMedia->media_path) as $path){
                        $complete_path = asset('storage/'.$nursery->application_number.'/'.$path);
                        $newPath = $nursery->application_number.'/'.$path;
                        array_push( $equipment_images, ["path"=> $path, "complete_path"=>$complete_path]);
                    }
                    break;
                case 'player_list':
                    $newPath = $nursery->application_number.'/'.$nurseryMedia->media_path;
                    $player_list_images = ["path"=> $nurseryMedia->media_path, "complete_path"=> asset('storage/'.$nursery->application_number.'/'.$nurseryMedia->media_path)];
                    break;
                case 'coach_certificate':
                    $newPath = $nursery->application_number.'/'.$nurseryMedia->media_path;
                    $coach_certificate_images = ["path"=> $nurseryMedia->media_path, "complete_path"=> asset('storage/'.$nursery->application_number.'/'.$nurseryMedia->media_path)];
                    break;
                case 'panchayat_certificate':
                    $newPath = $nursery->application_number.'/'.$nurseryMedia->media_path;
                    $panchayat_certificate_images = ["path"=> $nurseryMedia->media_path, "complete_path"=> asset('storage/'.$nursery->application_number.'/'.$nurseryMedia->media_path)];
                    break;
                default:
                    break;
            }
        }
        // dd($equipment_images);

        return view('nursery.user.mynursery',['nursery' => $nursery,'districts'=> $districts, 'games'=>$games, 'coach_qualification'=>$coach_qualification, 'playground_images' => $playground_images, 'equipment_images' => $equipment_images, 'player_list_images' => $player_list_images, 'coach_certificate_images' => $coach_certificate_images ,'panchayat_certificate_images' => $panchayat_certificate_images]);

    }

    public function viewNursery()
    {
        $user_mobile = Auth::user()->mobile;
        $nursery = Nursery::with(['nurseryMedias','CoachQualification','game'])->where('mobile_number', $user_mobile)->where('final_status',1)->first();
        $playground_images = []; 
        $equipment_images = []; 
        $player_list_images = []; 
        $coach_certificate_images = []; 
        $panchayat_certificate_images = []; 

        foreach ($nursery['nurseryMedias'] as $nurseryMedia) {
            switch ($nurseryMedia->type) {
                case 'playground':
                    foreach(explode(',', $nurseryMedia->media_path) as $path){
                        $complete_path = asset('storage/'.$nursery->application_number.'/'.$path);
                        array_push( $playground_images, ["path"=> $path, "complete_path"=>$complete_path]);
                    }
                    break;
                case 'equipment':
                    foreach(explode(',', $nurseryMedia->media_path) as $path){
                        $complete_path = asset('storage/'.$nursery->application_number.'/'.$path);
                        array_push( $equipment_images, ["path"=> $path, "complete_path"=>$complete_path]);
                    }
                    break;
                case 'player_list':
                    $player_list_images = ["path"=> $nurseryMedia->media_path, "complete_path"=> asset('storage/'.$nursery->application_number.'/'.$nurseryMedia->media_path)];
                    break;
                case 'coach_certificate':
                    $coach_certificate_images = ["path"=> $nurseryMedia->media_path, "complete_path"=> asset('storage/'.$nursery->application_number.'/'.$nurseryMedia->media_path)];
                    break;
                case 'panchayat_certificate':
                    $panchayat_certificate_images = ["path"=> $nurseryMedia->media_path, "complete_path"=> asset('storage/'.$nursery->application_number.'/'.$nurseryMedia->media_path)];
                    break;
                default:
                    break;
            }
        }

        // dd($playground_images);
        $districts = District::get()->toArray();
        $games = Game::get()->toArray();
        $coach_qualification = CoachQualification::where('is_active', 1)->get()->toArray();
        return view('nursery.user.view',['nursery' => $nursery,'districts'=> $districts, 'games'=>$games, 'coach_qualification'=>$coach_qualification, 'playground_images' => $playground_images, 'equipment_images' => $equipment_images, 'player_list_images' => $player_list_images, 'coach_certificate_images' => $coach_certificate_images ,'panchayat_certificate_images' => $panchayat_certificate_images ]);

    }

    public function updateNurseryDetails(Request $request)
    {

        // dd($request->all());

        $data = $request->all();
        $user_mobile = Auth::user()->mobile;
        $registration_end_date = '2024-02-15';
        $current_date = now();
        $userNursery = Nursery::where('mobile_number', $user_mobile)->where('final_status', 1)->first();
        if($request->step == "step2"){
            try{
                $this->validateSteps($data);
                $nursery = Nursery::where('mobile_number',$request->mobile_number)->update(
                    [
                        'name_of_nursery' => $request->name_of_nursery,
                        'district_id' => $request->district_id,
                        'cat_of_nursery' => $request->cat_of_nursery,
                        'type_of_nursery' => $request->type_of_nursery,
                        'address' => $request->address,
                        'reg_no_running_nursery' => $request->reg_no_running_nursery,
                        'head_pricipal' =>$request->head_pricipal,
                        'email' =>$request->email,
                        'pin_code' =>$request->pin_code
                    ]
                );
                if ($nursery) {
                    return response()->json(['status' => 'success', 'message' => 'Nursery Information Saved Successfully. Please complete the Next Step']);
                } else {
                    return response()->json(['status' => 'error','message' => 'Error saving Nursery Details: Unknown error']);
                }
            } catch (ValidationException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Error Found: ' . $e->getMessage()]);
            }

        }elseif($request->step == "step3"){
            try{
                $this->validateSteps($data);
                $updateThirdStep = Nursery::where('mobile_number', $request->mobile_number)->update([
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
                    'coach_name' => $request->coach_name,
                    'coach_qualification' => $request->coach_qualification,
                    'percentage_fee' => $request->percentage_fee,
                    'game_descipline_previous'=>$request->game_disp_previous,
                    'game_previous_id'=>$request->game_previous_id,
                    'already_running_nursery'=>$request->already_running_nursery,

                ]);
                // dd($updateThirdStep);
                if($updateThirdStep) {
                    return response()->json(['status' => 'success', 'message' => 'game detail saved, move to next step.']);
                }else {
                    return response()->json(['status' => 'error','message' => 'Error saving gaming Details: Unknown error']);
                }

            } catch (ValidationException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Error saving gaming Details: ' . $e->getMessage()]);
            }

           }elseif($request->step == "step4"){
                $currentsavedNursery = Nursery::where('mobile_number', $request->mobile_number)->first();
                // dd($currentsavedNursery);

            /************** playground validation **************/
            if($request->playground_hall_court_available == 'yes'){
                $playgroundfiles = explode(',',$request->playground_images[0]);
                // dd($playgroundfiles);
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
            // dd($request->player_list);
            if(empty($request->player_list)){
                return response()->json(['status' => 'error','message' => 'Upload player list file']);
            }

            /************** coach_certificate validation **************/
            if($request->whether_qualified_coach_is_available_for_the_concerned_game == 'yes'){
                if(empty($request->coach_certificate)){
                    return response()->json(['status' => 'error','message' => 'Upload coach certificate']);
                }
            }
            if($request->playground_hall_court_available == 'yes'){
                if(!empty($playgroundfiles) && count($playgroundfiles) === 3){
                    // dd($request->playground_images);
                    $playground_images = NurseryMedia::updateOrInsert(
                        [
                            'nursery_id' => $currentsavedNursery->id,
                            'type' => "playground",
                        ],
                        [
                            'type' => "playground",
                            'media_path' => $request->playground_images[0],
                            'updated_at'=>now()
                        ]
                    );
                    // dump($currentsavedNursery->id);
                    // dd($playground_images);
                }
            }else{
                NurseryMedia::where('nursery_id',$currentsavedNursery->id)->where('type','playground')->delete();
            }
            if($request->equipment_related_to_selected_games_available == 'yes'){
                if(!empty($equipmentfiles) && count($equipmentfiles) === 3){
                    $equipment_images = NurseryMedia::updateOrInsert(
                        [
                            'nursery_id' => $currentsavedNursery->id,
                            'type' => "equipment",
                        ],
                        [
                            'type' => "equipment",
                            'media_path' => $request->equipment_images[0],
                            'updated_at'=>now()
                        ]
                    );
                    
                }
            }else{
                NurseryMedia::where('nursery_id',$currentsavedNursery->id)->where('type','equipment')->delete();
            }
            if(!empty($request->player_list)){
                $file_paths = explode(',', $request->player_list);
    
                $num_files = count($file_paths);

                if ($num_files > 1) {
                    return response()->json(['status' => 'error','message' => 'You can upload only one file for player list.']);
                } else {
                    $player_list = NurseryMedia::updateOrInsert(
                    [
                        'nursery_id' => $currentsavedNursery->id,
                        'type' => "player_list",
                    ],
                    [
                        'type' => "player_list",
                        'media_path' => $request->player_list,
                        'updated_at'=>now()
                    ]
                );
              
                }
            }
            if($request->whether_qualified_coach_is_available_for_the_concerned_game == 'yes'){
                if(!empty($request->coach_certificate)){
                    $file_paths = explode(',', $request->coach_certificate);
        
                    $num_files = count($file_paths);

                    if ($num_files > 1) {
                        return response()->json(['status' => 'error','message' => 'You can upload only one file for Coach certificate.']);
                    } else {
                        $coach_certificate = NurseryMedia::updateOrInsert(
                            [
                                'nursery_id' => $currentsavedNursery->id,
                                'type' => "coach_certificate",
                            ],
                            [
                                'type' => "coach_certificate",
                                'media_path' => $request->coach_certificate,
                                'updated_at'=>now()
                            ]
                        );
                    }
                }
            }else{
                NurseryMedia::where('nursery_id',$currentsavedNursery->id)->where('type','coach_certificate')->delete();
            }
            if($request->type_of_nursery == 'panchayat'){
                if(!empty($request->panchayat_certificate)  && $request->type_of_nursery == 'panchayat'){
                    $file_paths = explode(',', $request->panchayat_certificate);
        
                    $num_files = count($file_paths);

                    if ($num_files > 1) {
                        return response()->json(['status' => 'error','message' => 'You can upload only one file for Panchayat Certificate.']);
                    } else {
                        $panchayat_certificate = NurseryMedia::updateOrInsert(
                            [
                                'nursery_id' => $currentsavedNursery->id,
                                'type' => "panchayat_certificate",
                            ],
                            [
                                'type' => "panchayat_certificate",
                                'media_path' => $request->panchayat_certificate,
                                'updated_at'=>now()
                            ]
                        );
                    }
                }
            }else{
                NurseryMedia::where('nursery_id',$currentsavedNursery->id)->where('type','panchayat_certificate')->delete();

            }
                
            $nurseryStatus = NurseryApplicationStatus::where('nursery_id', $currentsavedNursery->id)->update([
                'nursery_id'=>$currentsavedNursery->id,
                'district_id'=>$currentsavedNursery->district_id,
                'updated_at'=>now()
            ]);
            if($nurseryStatus){
                $user = User::where('mobile', $request->mobile_number)->update([
                    'name'=> $request->name_of_nursery,
                    'email'=> $request->email,
                    'district_id'=> $request->district_id,
                    'updated_at'=> now(),
                ]);
                if($user){
                    return response()->json(['status' => 'success','message' => 'Your application is submitted successfully.     
                            You can edit your application till 12-03-2024, after which it will be considered final.']);

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
                'name_of_nursery' => 'required|string|max:100',
                'address' => 'required|string|max:255',
                'reg_no_running_nursery' => 'required',
                'head_pricipal' => 'required|string|max:100',
                'email' => 'required|email|max:50',
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
                'already_running_nursery' => 'required',
                'year_allotment' => ['required_if:already_running_nursery,yes'],
                'game_previous_id' => ['required_if:already_running_nursery,yes'],
                'game_disp_previous' => ['required_if:already_running_nursery,yes'],
                'whether_nursery_will_provide_sports_kits_to_selected_players' => 'required',
                'whether_nursery_will_provide_fee_concession_to_selected_players' => 'required',
                'percentage_fee' => ['required_if:whether_nursery_will_provide_fee_concession_to_selected_players,yes'],
            ];

            $messages =[];
        }
        $validator = Validator::make($data, $rules, $messages);
        // dd($validator->errors()->toArray());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }

    public function NurseryFileUpload(Request $request)
    {
        // dd($request->all(),"lklk");
        $filePath = '';
        $application_number = $request->application_number;
        if ($request->hasFile('playgroundfile') && !empty($application_number)) {
            $file = $request->file('playgroundfile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs($application_number.'/playground_images', $fileName, 'public');
            $filePath = 'playground_images/'.$fileName;
        }elseif($request->hasFile('equipmentfile') && !empty($application_number)) {
            $file = $request->file('equipmentfile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs($application_number.'/equipment_images', $fileName, 'public');
            $filePath = 'equipment_images/'.$fileName;
        }elseif($request->hasFile('playerListFile') && !empty($application_number )) {
            $file = $request->file('playerListFile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs($application_number.'/player_list_files', $fileName, 'public');
            $filePath = 'player_list_files/'.$fileName;
        }elseif($request->hasFile('coachCertificateFile') && !empty($application_number)) {
            $file = $request->file('coachCertificateFile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs($application_number.'/coach_certificate_files', $fileName, 'public');
            $filePath = 'coach_certificate_files/'.$fileName;
        }elseif($request->hasFile('panchayatCertificateFile') && !empty($application_number)) {
            $file = $request->file('panchayatCertificateFile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs($application_number.'/panchayat_certificate_files', $fileName, 'public');
            $filePath = 'panchayat_certificate_files/'.$fileName;
        }
        
        return $filePath;
    }

    public function NurseryFileRemove(Request $request)
    {     
        if ($request->filePath) {
        $nursery = Nursery::where('application_number',$request->application_number)->first();
            if (Storage::exists('public/'.$request->application_number.'/'.$request->filePath)) {
                Storage::delete('public/'.$request->application_number.'/'.$request->filePath);
            }
            NurseryMedia::where('media_path', $request->filePath)
                ->where('nursery_id', $nursery->id)
                ->delete();
        }


    }
}
