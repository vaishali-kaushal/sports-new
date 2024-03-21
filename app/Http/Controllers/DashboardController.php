<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\NurseryApplicationStatus;
use App\Models\Nursery;

class DashboardController extends Controller
{
    //
    // dso login
    public function index()
    {
        $data['total_applications'] = NurseryApplicationStatus::where('district_id', auth()->user()->district_id)->get()->count();
        $data['pending_applications'] = NurseryApplicationStatus::where([['district_id', auth()->user()->district_id],['approved_reject_by_dso', 0]])->get()->count();
        $data['approved'] = NurseryApplicationStatus::where([['district_id', auth()->user()->district_id],['approved_by_admin_or_reject_by_admin', 1]])->get()->count();
        $data['rejected'] = NurseryApplicationStatus::where([['district_id', auth()->user()->district_id],['approved_by_admin_or_reject_by_admin', 2]])->get()->count();
        // dd($data);
        return view('dso.dashboard',['data'=> $data]);
    }
    public function admin()
    {
        // $data['game_cont'] =  Game::get()->count();
        // $data['active_nursery'] =  NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 1)->get()->count();
        // $data['pending'] =  NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 0)->get()->count();
        // $data['players'] = 0;

        $data['total_applications'] = NurseryApplicationStatus::get()->count();
        $data['pending_applications'] = NurseryApplicationStatus::where('approved_reject_by_dso', 0)->get()->count();
        $data['approved'] = NurseryApplicationStatus::where('approved_by_admin_or_reject_by_admin', 1)->get()->count();
        $data['rejected'] = NurseryApplicationStatus::where('approved_by_admin_or_reject_by_admin', 2)->get()->count();
        $districtApplications = NurseryApplicationStatus::groupBy('district_id')->selectRaw('district_id, count(*) as count')
        ->get();
        $data['districtCount'] = $districtApplications->count();
        $govtApp = NurseryApplicationStatus::with(['nursery.district'])
            ->join('nurseries', 'nurseries.id', '=', 'nursery_application_statuses.nursery_id')
            ->where('nurseries.cat_of_nursery', '=', 'govt')
            ->get();
        $privateApp = NurseryApplicationStatus::with(['nursery.district'])
            ->join('nurseries', 'nurseries.id', '=', 'nursery_application_statuses.nursery_id')
            ->where('nurseries.cat_of_nursery', '=', 'private')
            ->get();
        $data['govt'] = $govtApp->count();
        $data['private'] = $privateApp->count();
        $gameApp = NurseryApplicationStatus::with(['nursery.district'])
        ->selectRaw('
            SUM(nurseries.boys) as total_boys_count,
            SUM(nurseries.girls) as total_girls_count,
            (SUM(nurseries.boys) + SUM(nurseries.girls)) AS mix_count
        ')
        ->join('nurseries', 'nurseries.id', '=', 'nursery_application_statuses.nursery_id')
        ->first();
        $data['gameApp'] = $gameApp->mix_count;

        // dd($data);
        return view('admin.dashboard',['data'=> $data]);
    }

    public function dsoNurseryReport($status)
    {
        // dd($status);
        if($status == "total_applications"){
            $applications = NurseryApplicationStatus::where('district_id', auth()->user()->district_id)->with(['nursery' => function($query){
                    $query->where('final_status', 1);
                }])->get();

        }elseif($status == "pending_applications"){
            $applications = NurseryApplicationStatus::where([['approved_reject_by_dso', 0],['district_id',auth()->user()->district_id]])->with(['nursery' => function ($query) {
                     $query->where('final_status', 1);
                }])->get();
        }elseif($status == "approved_applications"){
            $applications = NurseryApplicationStatus::where([['approved_by_admin_or_reject_by_admin', 1],['approved_reject_by_dso',1],['district_id',auth()->user()->district_id]])->with(['nursery' => function ($query) {
                     $query->where('final_status', 1);
                }])->get();
        }elseif($status == "rejected_applications"){
            $applications = NurseryApplicationStatus::where([['approved_reject_by_dso',2],['district_id',auth()->user()->district_id]])->with(['nursery' => function ($query) {
                     $query->where('final_status', 1);
                }])->get();
        }
        // dd($applications);
        return view('dso.report', ['applications' => $applications]);
    }


    public function adminNurseryReport($status)
    {
        if($status == "total_applications"){
            $applications = NurseryApplicationStatus::with(['nursery' => function($query){
                    $query->where('final_status', 1);

            }])->get();

        }elseif($status == "pending_applications"){
            $applications = NurseryApplicationStatus::where([['approved_reject_by_dso', 0],['approved_by_admin_or_reject_by_admin', 0]])->get();
        }elseif($status == "approved_applications"){
            $applications = NurseryApplicationStatus::where([['approved_by_admin_or_reject_by_admin', 1],['approved_reject_by_dso',1]])->get();
        }elseif($status == "rejected_applications"){
            $applications = NurseryApplicationStatus::where('approved_reject_by_dso', 2)->get();
        }

        // dd($applications);
        return view('admin.report', ['applications' => $applications]);
    }

    public function districtReport()
    {
        $districtApplications = NurseryApplicationStatus::groupBy('district_id')
        ->selectRaw('district_id, count(*) as count')
        ->get();
        $totalRecords = $districtApplications->sum('count');
        $totalDistricts = $districtApplications->count();
        // dd($totalRecords);
        return view('admin.districtreport',compact('districtApplications','totalRecords','totalDistricts'));
    }

    public function nurseryCategoryReport($category)
    {
        if($category == 'private'){

        $applications = NurseryApplicationStatus::with(['nursery.district'])
            ->selectRaw('districts.name as district_name,
                SUM(CASE WHEN nurseries.type_of_nursery = "pvt_school" THEN 1 ELSE 0 END) AS count_pvt_school,
                SUM(CASE WHEN nurseries.type_of_nursery = "pvt_institute" THEN 1 ELSE 0 END) AS count_pvt_institute,
                COUNT(*) as total_count')
            ->join('nurseries', 'nurseries.id', '=', 'nursery_application_statuses.nursery_id')
            ->join('districts', 'districts.id', '=', 'nurseries.district_id')
            ->where('nurseries.cat_of_nursery', '=', 'private')
            ->groupBy('district_name')
            ->get();
        }else{
            $applications = NurseryApplicationStatus::with(['nursery.district'])
            ->selectRaw('districts.name as district_name,
                SUM(CASE WHEN nurseries.type_of_nursery = "govt_school" THEN 1 ELSE 0 END) AS count_govt_school,
                SUM(CASE WHEN nurseries.type_of_nursery = "panchayat" THEN 1 ELSE 0 END) AS count_panchayat,
                COUNT(*) as total_count')
            ->join('nurseries', 'nurseries.id', '=', 'nursery_application_statuses.nursery_id')
            ->join('districts', 'districts.id', '=', 'nurseries.district_id')
            ->where('nurseries.cat_of_nursery', '=', 'govt')
            ->groupBy('district_name')
            ->get();
        }
        // dd($applications);
        return view('admin.nurserycategoryreport',compact('applications'));
        # code...
    }

    public function gameDispReport()
    {
       $applications = NurseryApplicationStatus::with(['nursery.district'])
        ->selectRaw('
            districts.name as district_name,
            SUM(nurseries.boys) AS boys_count,
            SUM(nurseries.girls) AS girls_count,
            (SUM(nurseries.boys) + SUM(nurseries.girls)) AS mix_count
        ')
        ->join('nurseries', 'nurseries.id', '=', 'nursery_application_statuses.nursery_id')
        ->join('districts', 'districts.id', '=', 'nurseries.district_id')
        ->groupBy('district_name')
        ->get();

        // dd($applications);
        return view('admin.gamedispreport',compact('applications'));
    }


}
