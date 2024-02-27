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
        $data['game_cont'] =  Game::get()->count();
        $data['active_nursery'] =  NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 1)->get()->count();
        $data['pending'] =  NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 0)->get()->count();
        $data['players'] = 0;

        return view('admin.dashboard',['data'=> $data]);
    }

    public function dsoNurseryReport($status)
    {
        // dd($status);
        if($status == "total_applications"){
            $applications = Nursery::where([['district_id', auth()->user()->district_id],['final_status', 1]])->with('nurseryStatus')->get();

        }elseif($status == "pending_applications"){
            $applications = Nursery::where([['district_id', auth()->user()->district_id],['final_status', 1]])->with(['nurseryStatus' => function ($query) {
                    $query->where('approved_reject_by_dso', 0);
                }])->get();
        }elseif($status == "approved_applications"){

        }elseif($status == "rejected_applications"){
            
        }

        // dd($applications);
        return view('dso.report', ['applications' => $applications]);
    }


}
