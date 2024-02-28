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
        $data['total_applications'] = Nursery::where([['district_id', auth()->user()->district_id],['final_status', 1]])->get()->count();
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
            $applications = NurseryApplicationStatus::where([['approved_reject_by_dso', 0],['approved_by_admin_or_reject_by_admin', 0],['district_id',auth()->user()->district_id]])->with(['nursery' => function ($query) {
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


}
