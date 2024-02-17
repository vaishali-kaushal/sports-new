<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\NurseryApplicationStatus;

class DashboardController extends Controller
{
    //
    // dso login
    public function index()
    {
        return view('dso.dashboard');
    }
    public function admin()
    {
        $data['game_cont'] =  Game::get()->count();
        $data['active_nursery'] =  NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 1)->get()->count();
        $data['pending'] =  NurseryApplicationStatus::where('approved_reject_by_dso', 1)->where('approved_by_admin_or_reject_by_admin', 0)->get()->count();
        $data['players'] = 0;

        return view('admin.dashboard',['data'=>$data]);
    }


}
