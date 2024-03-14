<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NurseryApplicationStatus;
use App\Models\Nursery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicationRemark;
use App\Models\Otp;
use App\Models\District;
use App\Models\NurseryApplicationTransaction;

class AdminController extends Controller
{
    public function AdminList()
    {
        $nursery  = NurseryApplicationStatus::whereIn('approved_reject_by_dso', [1, 2])->where('approved_by_admin_or_reject_by_admin', 0)->with('nursery')->get()->toArray();
        return view('admin.nursery.list', ['layout' => 'admin.layouts.app', 'nurserys' => $nursery]);
    }

    public function adminProcess($id)
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
        // dd($nursery);

        $nurseryRemarks = $nursery['nursery_status']['remark'];
       
            // dd(!empty($nurseryRemarks['files']));
        return view('admin.nursery.report.form', ['layout' => 'admin.layouts.app', 'nursery' => $nursery, 'districts' => District::get()->toArray(),'count' =>$count,'remarks'=>$nurserRemarks,'nurseryRemarks'=>$nurseryRemarks]);
    }

    public function AdminReportStore(Request $request, $secure_id)
    {
        // dd($request->all());
    $data = $request->all();
	$this->validateForm($data);

    $nursery = Nursery::where('secure_id', $secure_id)->first();

	    try{

	        $filePath = '';
	        if ($request->hasFile('admin_nursery_report') && empty($filePath)) {
	            foreach ($request->file('admin_nursery_report') as $file) {
	            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
	            $file->storeAs($nursery->application_number.'/admin_report', $fileName, 'public');
	            $filePath = 'admin_report/'.$fileName;
		        }
	        }
	        // dd($filePath);
	        $userId = Auth::user()->id;
	        $nurseryApplicationRemarks = ApplicationRemark::create([
	        	'user_id' => $userId,
	        	'application_status_id' => $nursery->nurseryStatus->id,
	        	'remarks' => $request->remarks,
	        	'files' => $filePath,
	        	'created_at' => now()
	        ]);

	        if($nurseryApplicationRemarks){
	        	NurseryApplicationStatus::where('id', $nursery->nurseryStatus->id)->update(['approved_by_admin_or_reject_by_admin' => $request['status'] ]);

	        	$nurseryTransaction = NurseryApplicationTransaction::create([
                            'nursery_id'=>$nursery->id,
                            'transaction_date'=>date('Y-m-d'),
                            'action_by'=> $userId
                        ]);
	        }

	        
		    if($request['status'] == 1){
		    	if(env('APP_ENV') == "local"){
	                $otpp='111111';
	                $sms_message   = "Dear User, ".$otpp. " is OTP for Login, Nursery Management System, Sports Department Government of Haryana";
	                $tid           = "1407170557686704067";

	                // $this->sendSMS($request->mobile,$sms_message,$tid);

	            }
	            if(env('APP_ENV') == 'production'){
	                $otpp=$this->generateNumericOTP(6);
	                $sms_message   = "Dear User, ".$otpp. " is OTP for Login, Nursery Management System, Sports Department Government of Haryana";
	                $tid           = "1407170557686704067";
	                $this->sendSMS($request->mobile,$sms_message,$tid);
	            }
		        return redirect()->back()->with('success', 'Application has been approved Successfully');

		    }else if($request['status'] == 2){
		        return redirect()->back()->with('success', 'Application has been Rejected');

		    }else if($request['status'] == 3){
		        return redirect()->back()->with('success', 'Objection raised Successfully');

		    }else{
		        return redirect()->back()->with('error', 'something went wrong');
		    }

	    }catch (\Exception $e) {
	    	DB::rollback();
	        return response()->json(['status' => 'error', 'message' => 'Error Found: ' . $e->getMessage()]);
	    }
    }

    public function validateForm($data)
    {
        $rules = [
            'remarks' => 'required',
            'status' => 'required'

        ];

        $messages = [ ];
        
        $validator = Validator::make($data, $rules, $messages);
        // dd($validator->errors()->toArray());
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }

    public function approvedList()
    {
    	$nursery  = NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 1)->with('nursery')->get()->toArray();
        return view('admin.nursery.list', ['layout' => 'admin.layouts.app', 'nurserys' => $nursery]);
    }
    public function rejectList()
    {
    	$nursery  = NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 2)->with('nursery')->get()->toArray();
        return view('admin.nursery.list', ['layout' => 'admin.layouts.app', 'nurserys' => $nursery]);
    }
    public function objectionList()
    {
    	$nursery  = NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 3)->with('nursery')->get()->toArray();
        return view('admin.nursery.list', ['layout' => 'admin.layouts.app', 'nurserys' => $nursery]);
    }

    public function excelDownload()
    {
        $applications  = NurseryApplicationStatus::with('nursery')->orderBy('created_at', 'asc')->get();
        // dd($nursery);
        return view('admin.excel',compact('applications'));
    }
}
