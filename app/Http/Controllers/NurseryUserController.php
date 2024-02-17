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


class NurseryUserController extends Controller
{
    public function index()
    {
        return view('nursery.user.dashboard');
    }

    public function userNursery()
    {
    	$user_mobile = Auth::user()->mobile;
    	$nursery = Nursery::where('mobile_number', $user_mobile)->first();
    	// dd($nursery);
    	$districts = District::get()->toArray();
    	$games = Game::get()->toArray();
    	$coach_qualification = CoachQualification::where('is_active', 1)->get()->toArray();
        $nurseryMedias = NurseryMedia::where('nursery_id', $nursery->id)->get();
        $nurseryPhotos =[];
        foreach ($nurseryMedias as $nurseryMedia) {
            switch ($nurseryMedia->type) {
                case 'playground':
                    $nurseryPhotos['playground'] = $nurseryMedia->media_path;
                    break;
                case 'equipment':
                    $nurseryPhotos['equipment'] = $nurseryMedia->media_path;
                    break;
                // Add more cases for other types as needed
                default:
                    // Handle any other types
                    break;
            }
        }
                    // dd(json_decode($nurseryPhotos['playground']));
    	return view('nursery.user.mynursery',['nursery' => $nursery,'districts'=> $districts, 'games'=>$games, 'coach_qualification'=>$coach_qualification,'nurseryPhotos' => $nurseryPhotos ]);

    }

    public function viewNursery()
    {
        $user_mobile = Auth::user()->mobile;
        $nursery = Nursery::where('mobile_number', $user_mobile)->first();
        // dd($nursery);
        $districts = District::get()->toArray();
        $games = Game::get()->toArray();
        $coach_qualification = CoachQualification::where('is_active', 1)->get()->toArray();
        return view('nursery.user.view',['nursery' => $nursery,'districts'=> $districts, 'games'=>$games, 'coach_qualification'=>$coach_qualification ]);

    }

    public function updateNurseryDetails(Request $request)
    {

        // dd($request->all());

        $secure_id = bin2hex(random_bytes(16));
        $data = $request->all();
        $user_mobile = Auth::user()->mobile;
        $registration_end_date = '2024-02-15';
        $current_date = now();
        $userNursery = Nursery::where('mobile_number', $user_mobile)->first();
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
                    // 'facility_images' => json_encode($facility_images)
                    // 'coach_available' => $request->coach_available,
                    'coach_name' => $request->coach_name,
                    'coach_qualification' => $request->coach_qualification,
                    'percentage_fee' => $request->percentage_fee,
                    'game_descipline_previous'=>$request->game_disp_previous,
                    'game_previous_id'=>$request->game_previous_id,
                    'already_running_nursery'=>$request->already_running_nursery,

                ]);
                // dd($updateThirdStep);
                if($updateThirdStep) {
                    $currentsavedNursery = Nursery::where('mobile_number', $request->mobile_number)->first();
                    /************** playground files **************/
                    if($request->playground_hall_court_available == 'yes'){
                        $playgroundfiles = $request->file('playground_images');
                        if (!empty($playgroundfiles) && count($playgroundfiles) < 3) {
                            return response()->json(['status' => 'error','message' => 'PlaygroundFiles can not be less than 3']);
                        } else if(count($playgroundfiles) > 3) {
                            return response()->json(['status' => 'error','message' => 'PlaygroundFiles can not be greater than 3']);
                        }
                        //  else{
                        //     return response()->json(['status' => 'error','message' => 'Upload PlaygroundFiles']);

                        // }
                        if(!empty($playgroundfiles) && count($playgroundfiles) === 3 && $request->playground_hall_court_available == 'yes'){
                            $playground_images = [];
                            foreach ($playgroundfiles as $file) {
                                $fileName = $file->getClientOriginalName();
                                $file->storeAs('playground_images', $fileName, 'public');
                                $filePath = 'storage/playground_images/' . $fileName;
                                array_push($playground_images, $filePath);
                            }
                            $playground_images = json_encode($playground_images);
                            NurseryMedia::where('nursery_id', $currentsavedNursery->id)->([
                                'type' => "playground",
                                'media_path' => $playground_images,
                                'updated_at'=>now()
                            ]);
                        }
                    }
                    if($request->equipment_related_to_selected_games_available == 'yes'){
                        /************** equipment files **************/
                        $equipmentfiles = $request->file('equipment_images');
                         if (!empty($equipmentfiles) && count($equipmentfiles) < 3) {
                                return response()->json(['status' => 'error','message' => 'Equipmentfiles can not be less than 3']);
                            } elseif(count($equipmentfiles) > 3) {
                                return response()->json(['status' => 'error','message' => 'Equipmentfiles can not be greater than 3']);
                            } 
                            // else{
                            //     return response()->json(['status' => 'error','message' => 'Upload Equipmentfiles']);

                            // }
                        if(!empty($equipmentfiles) && count($equipmentfiles) === 3 && $request->equipment_related_to_selected_games_available == 'yes'){
                            $equipment_images = [];
                            foreach ($equipmentfiles as $file) {
                                $fileName = $file->getClientOriginalName();
                                $file->storeAs('equipment_images', $fileName, 'public');
                                $filePath = 'storage/equipment_images/' . $fileName;
                                array_push($equipment_images, $filePath);
                            }
                            $equipment_images = json_encode($equipment_images);
                            NurseryMedia::where('nursery_id', $currentsavedNursery->id)->([
                                'type' => "equipment",
                                'media_path' => $equipment_images,
                                'updated_at'=>now()
                            ]);
                        }
                    }

                    /************** coach_certificate files **************/
                    if($request->whether_qualified_coach_is_available_for_the_concerned_game == 'yes'){
                        $coach_certificate_files = $request->file('coach_certificate');
                        if(!empty($coach_certificate_files) && $request->whether_qualified_coach_is_available_for_the_concerned_game == 'yes'){
                            $coach_certificate = [];
                            foreach ($coach_certificate_files as $file) {
                                $fileName = $file->getClientOriginalName();
                                $file->storeAs('coach_certificate', $fileName, 'public');
                                $filePath = 'storage/coach_certificate/' . $fileName;
                                array_push($coach_certificate, $filePath);
                            }
                            $coach_certificate = json_encode($coach_certificate);
                            NurseryMedia::where('nursery_id', $currentsavedNursery->id)->([
                                'type' => "coach_certificate",
                                'media_path' => $coach_certificate,
                                'updated_at'=>now()
                            ]);
                            if(empty($coach_certificate_files)){
                                return response()->json(['status' => 'error','message' => 'Upload coach certificate']);

                            }
                        }
                    }

                    /************** player_list files **************/
                    $player_list_files = $request->file('player_list');
                    if(!empty($player_list_files)){
                        $player_list = [];
                        foreach ($player_list_files as $file) {
                            $fileName = $file->getClientOriginalName();
                            $file->storeAs('player_list', $fileName, 'public');
                            $filePath = 'storage/player_list/' . $fileName;
                            array_push($player_list, $filePath);
                        }
                        $player_list = json_encode($player_list);
                        NurseryMedia::where('nursery_id', $currentsavedNursery->id)->([
                            'type' => "player_list",
                            'media_path' => $player_list,
                            'updated_at'=>now()
                        ]);
                    }else{
                        return response()->json(['status' => 'error','message' => 'Upload player list file']);
                    }
                    $nurseryStatus = NurseryApplicationStatus::where('nursery_id', $currentsavedNursery->id)->([
                        'district_id'=>$currentsavedNursery->district_id,
                        'updated_at'=>now()
                    ]);

                    if($nurseryStatus){
                        $user = User::where('mobile', $request->mobile_number)->([
                            'name'=> $request->name_of_nursery,
                            'email'=> $request->email,
                            'district_id'=> $request->district_id,
                            'password'=> bin2hex(random_bytes(16)),
                            'updated_at '=> now(),
                        ]);
                    }else{
                        return response()->json(['status' => 'error','message' => 'Error saving user Details: Unknown error']);

                    }

                    return response()->json(['status' => 'success', 'message' => 'Your application is submitted successfully.You can login to view your application details.']);
                }else {
                    return response()->json(['status' => 'error','message' => 'Error saving gaming Details: Unknown error']);
                }

            } catch (ValidationException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Error saving gaming Details: ' . $e->getMessage()]);
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
                'already_running_nursery' => 'required',
                'year_allotment' => ['required_if:already_running_nursery,yes'],
                'game_previous_id' => ['required_if:already_running_nursery,yes'],
                'game_disp_previous' => ['required_if:already_running_nursery,yes'],
                'whether_nursery_will_provide_sports_kits_to_selected_players' => 'required',
                'whether_nursery_will_provide_fee_concession_to_selected_players' => 'required',
                'percentage_fee' => ['required_if:whether_nursery_will_provide_fee_concession_to_selected_players,yes'],
                // 'playground_images' => ['required_if:playground_hall_court_available,yes',
                //     'extensions:jpg,png,jpeg',
                //     'max:300',
                //     'max:1', 
                //     'image',
                // ],
                // 'equipment_images' => ['required_if:equipment_related_to_selected_games_available,yes',
                //     'image',
                //     'mimes:jpg,png,jpeg',
                //     'max:300',
                //     'max:3',
                // ],
            ];

            $messages =[];
        }
        $validator = Validator::make($data, $rules, $messages);
        // dd($validator->errors()->toArray());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }
}
