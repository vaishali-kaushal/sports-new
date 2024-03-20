<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Nursery;
use Illuminate\Support\Facades\Auth;
use  App\Models\NurseryApplicationStatus;
use  App\Models\District;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use  App\Models\ApplicationRemark;
use  App\Models\NurseryApplicationTransaction;
use  App\Models\Game;
use  App\Models\User;
use  App\Models\RoleType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DsoController extends Controller
{
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
        $games['total'] = Nursery::where([['game_id', $nursery['game_id']],['district_id', Auth::user()->district_id],['final_status', 1]])->get();
        $selectedGameIds = $games['total']->pluck('id');
        $games['totalApprovedCount'] = NurseryApplicationStatus::whereIn('nursery_id', $selectedGameIds)->where('approved_by_admin_or_reject_by_admin', 1)->count();
        $games['totalPendingCount'] = NurseryApplicationStatus::whereIn('nursery_id', $selectedGameIds)->where('approved_by_admin_or_reject_by_admin', 0)->count();
        return view('nursery.report.form', ['layout' => 'dso.layouts.app', 'nursery' => $nursery, 'districts' => District::get()->toArray(),'nurseryStatus' => $nurseryStatus, 'games'=>$games]);
    }

    public function nurseryReportStore(Request $request, $secure_id)
    {
    	$data = $request->all();
    	$this->validateForm($data);
        DB::beginTransaction();
        try{
        	if(!empty($request['reportphoto_images'][0])){
                $reportPhotos = explode(',',$request['reportphoto_images'][0]);
                if (count($reportPhotos) > 3) {
                    return response()->json(['status' => 'error','message' => 'Photographs can not be greater than 3']);
                // return redirect()->back()->with('error', 'Please add the remarks');

                }
            }
    	// dd(count($request['reportphoto_images'][0]));
            if (empty($request['reportphoto_images'][0])) {
                return response()->json(['status' => 'error','message' => 'Photographs can not be empty']);
            }
            if(!empty($request['inspectionreport_images'][0])){
                $inspectionReport = explode(',',$request['inspectionreport_images'][0]);
            }
            if (empty($request['inspectionreport_images'][0])) {
                return response()->json(['status' => 'error','message' => 'Inspection Report Can not be empty']);
            }

	        $nursery = Nursery::where('secure_id', $secure_id)->first();
	        $user = Auth::user()->id;
	        // dd($nursery->nurseryStatus->id);
	        $applicationRemark = ApplicationRemark::create([
	        	'user_id' => $user,
	        	'application_status_id' => $nursery->nurseryStatus->id,
	        	'remarks' => $request['remarks'],
	        	'site_visit' => $request['site_visit'],
	        	'recommend_status' => $request['recommend_status'],
	        	'files' => $request['reportphoto_images'][0],
	        	'inspection_report' => $request['inspectionreport_images'][0],
	        	'created_at' => now()
	        ]);
            if($applicationRemark){
            	$dsoremark = $request['recommend_status'] == 'yes' ? 1 : 2;
            	// dd($dsoremark);
           	 	$applicationStatus = NurseryApplicationStatus::where('id', $nursery->nurseryStatus->id)->update(['approved_reject_by_dso' => $dsoremark]);

           	 	$nurseryTransaction = NurseryApplicationTransaction::create([
                            'nursery_id'=>$nursery->id,
                            'transaction_date'=>date('Y-m-d'),
                            'action_by'=> $user
                        ]);
            }
        
            DB::commit();

	        if($dsoremark == 1){
	            return redirect('dso/nursery/pendingapproval')->with('success', 'The application has been successfully sent to concerned official in Head Office for necessary action.');
	        }else if($dsoremark == 2){
	            return redirect('dso/nursery/pendingapproval')->with('success', 'Application Not recommended for further action.');

	        }else{
	            return redirect('dso/nursery/pendingapproval')->with('error', 'Something went wrong.');
	        }

        } catch (\Exception $e) {
        	DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Error Found: ' . $e->getMessage()]);
        }

    }

    public function validateForm($data)
    {
        $rules = [
            'site_visit' => 'required',
            'remarks' => 'required',
            'recommend_status' => 'required'

        ];

        $messages = [ ];
        
        $validator = Validator::make($data, $rules, $messages);
        // dd($validator->errors()->toArray());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }

    public function reportFileUpload(Request $request)
    {
        // dd($request->all());
        $application_number = $request->application_number;
        $filePath = '';
        if ($request->hasFile('reportphotosfile') && !empty($application_number)) {
            $file = $request->file('reportphotosfile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs($application_number.'/dso_report', $fileName, 'public');
            $filePath = 'dso_report/'.$fileName;
        }elseif($request->hasFile('inspectionreportfile') && !empty($application_number)) {
            $file = $request->file('inspectionreportfile');
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $file->storeAs($application_number.'/dso_inspection_report', $fileName, 'public');
            $filePath = 'dso_inspection_report/'.$fileName;
        }
        
        return $filePath;
    }

    public function reportFileRemove(Request $request)
    {     
    	// dd($request->filePath);
        if ($request->filePath) {
            if (Storage::exists('public/'.$request->application_number.'/'.$request->filePath)) {
                Storage::delete('public/'.$request->application_number.'/'.$request->filePath);
            }
        }

    }

    public function nurseryList(Request $request)
    {
        $nursery = Nursery::where([['district_id', Auth::user()->district_id],['cat_of_nursery','departmental']])->with('game')->get();
        // dd($nursery);
        return view('dso.nursery.index', compact('nursery'));
    }

    public function nurseryRegistration($secure_id=null)
    {
        $nursery = Nursery::where('secure_id', $secure_id)->first();
        $district = District::get()->toArray();
        $games = Game::get()->toArray();
        // dd($nursery);
        return view('dso.nursery.register', compact('district','nursery','games'));
    }

    public function saveNurseryDetail(Request $request,$secureId=null)
    {
        // dd($request->all());
        $isRecordExist = Nursery::where('mobile_number', $request->mobile_number)->first();
        $district_code = District::where('id', Auth::user()->district_id)->first();
        $current_year = date('Y');
        $checkNurseries = Nursery::get();
                // dd($checkNurseries);
        if(empty($isRecordExist)){
            
                $latest_application_number = Nursery::orderBy('id', 'desc')->value('application_number');
                $last_six_digits = intval(substr($latest_application_number, -6)) + 1;
                // Pad the incremented number back to six digits
                $random_number = str_pad($last_six_digits, 6, '0', STR_PAD_LEFT);
                // dd($random_number);
                $application_number = $current_year.$district_code->code.$random_number;
                $secure_id = bin2hex(random_bytes(16));
            
        }else{
                $application_number = $isRecordExist->application_number;
                $secure_id = $isRecordExist->secure_id;

        }    
        $data = $request->all();
        $this->validateSaveForm($data);
        try{
            // dd($secureId);
            $nursery = Nursery::updateOrInsert(
                [
                    // 'mobile_number' => $request->mobile_number,
                    'secure_id' => $secureId,
                ],
                [
                    'secure_id' => $secure_id,
                    'application_number' => $application_number,
                    'mobile_number' => $request->mobile_number,
                    'head_pricipal' => $request->head_pricipal,
                    'name_of_nursery' => $request->name_of_nursery,
                    'district_id' =>Auth::user()->district_id,
                    'cat_of_nursery' => $request->cat_of_nursery,
                    'address' => $request->address,
                    'reg_no_running_nursery' => $request->reg_no_running_nursery,
                    'coach_name' =>$request->coach_name,
                    'email' =>$request->email,
                    'pin_code' =>$request->pin_code,
                    'game_id' =>$request->game_id,
                    'game_disp' =>$request->game_disp,
                    'final_status' =>1,
                    'created_by' => Auth::user()->id,
                    'created_at' =>now(),

                ]
            );
            // dd($nursery);
            DB::beginTransaction();

            if ($nursery) {
                $currentsavedNursery = Nursery::where('mobile_number', $request->mobile_number)->first();
                $nurseryStatus = NurseryApplicationStatus::create([
                    'nursery_id'=>$currentsavedNursery->id,
                    'district_id'=>$currentsavedNursery->district_id,
                    'approved_reject_by_dso'=>1,
                    'approved_by_admin_or_reject_by_admin'=>1,
                    'created_at'=>now()
                ]);

                if($nurseryStatus){
                    if($secureId == null){
                        $user = User::create([
                            'secure_id'=> $secure_id,
                            'name'=> $request->head_pricipal,
                            'email'=> $request->email,
                            'mobile'=> $request->mobile_number,
                            'district_id'=> Auth::user()->district_id,
                            'password'=> bin2hex(random_bytes(16)),
                            'created_at '=> now(),
                        ]);
                        RoleType::create(['user_id'=>$user->id,'role_id'=>'5']);
                    }
                        $nurseryTransaction = NurseryApplicationTransaction::create([
                            'nursery_id'=>$currentsavedNursery->id,
                            'transaction_date'=>date('Y-m-d'),
                            'action_by'=> Auth::user()->id
                        ]);

                        DB::commit();
                        return redirect()->route('dso.nurseryList')->with('success','Nursery Saved Successfully');
                    
                }

            } else {
                return redirect()->route('dso.nursery.register')->with('error','Error saving Nursery Details: Unknown error');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('dso.nursery.register')->with('error' . $e->getMessage());
        }

    }

    public function validateSaveForm($data)
    {
        
        $rules = [
            'district_id' => 'required',
            'cat_of_nursery' => 'required',
            'head_pricipal' => 'required|string|max:100|min:5',
            'name_of_nursery' => 'required|string|max:100|min:5',
            'address' => 'required|string|max:255',
            'reg_no_running_nursery' => 'required',
            'coach_name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'pin_code' => 'required|digits:6'


        ];

        $messages = [
            'head_pricipal.max' => 'The name must not exceed 100 characters.',
            'email.email' => 'Please enter a valid email address.',
            'email.required' => 'The email field is required.',
        ];
        
        $validator = Validator::make($data, $rules, $messages);
        // dd($validator->errors()->toArray());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }

    public function nurseryDelete($secure_id)
    {
        if(!empty($secure_id)){
            $nursery = Nursery::where('secure_id',$secure_id)->first();
            $nurseryStatus = NurseryApplicationStatus::where('nursery_id',$nursery->id)->first();
        }
    }
}
