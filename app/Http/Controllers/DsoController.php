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
        // dd($district_id->district->name);

        return view('nursery.report.form', ['layout' => 'dso.layouts.app', 'nursery' => $nursery, 'districts' => District::get()->toArray(),'nurseryStatus' => $nurseryStatus, 'gameCounts'=>$gameCounts]);
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
            $file->storeAs($application_number.'/dso_report', $fileName, 'public');
            $filePath = 'dso_report/'.$fileName;
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
}
