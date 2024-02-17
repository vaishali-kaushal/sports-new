<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\RoleGroup;
use App\Models\RoleType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function dso()
    {
        $users = new User;
        $users = $users->getUsers('dso');
   
        return view('users.dso.list', ['layout' => 'admin.layouts.app', 'users' => $users]);
    }

    public function adddso()
    {
        return view('users.dso.form', ['layout' => 'admin.layouts.app', 'districts' => District::get()->toArray()]);
    }
    public function editdso($id)
    {
        $user = User::find($id);

        return view('users.dso.form', ['layout' => 'admin.layouts.app', 'districts' => District::get()->toArray(), 'user' => $user]);
    }

    public function storeDso(Request $request)
    {
        $newUser =  $request->validate([
            'name' => "required",
            'mobile' => "required|numeric|min:10",
            'district_id' => "required",
            'email' => "required|email|unique:users,email",
            //    'pwd' =>"required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
            'pwd' => "required",
            'cpwd' => "required|same:pwd",
        ]);
        $user = new User;
        $user->name = $newUser['name'];
        $user->mobile = $newUser['mobile'];
        $user->district_id = $newUser['district_id'];
        $user->email = $newUser['email'];
        $user->password = Hash::make($newUser['pwd']);
        $user->secure_id = bin2hex(random_bytes(16));
        $user->save();
        $roleGroup = new RoleGroup;
        $groupID = $roleGroup->getGroupId('dso');
        $roletype = new RoleType;
        $roletype->role_id = $groupID->id;
        $roletype->user_id = $user->id;
        $roletype->save();

        return redirect('admin/dso');
    }
    public function updateDso(Request $request, $id)
    {


        $newUser =  $request->validate([
            'name' => "required",
            'mobile' => "required|numeric|min:10",
            'district_id' => "required",
            'email' => "required",

        ]);
        $user = User::find($id);
        $user->name = $newUser['name'];
        $user->mobile = $newUser['mobile'];
        $user->district_id = $newUser['district_id'];
        $user->email = $newUser['email'];

        $user->save();

        return redirect('admin/dso');
    }
    public function addPlayer()
    {
        return view('users.players.form', ['layout' => 'coach.layouts.app']);
    }
    public function editPlayer($id)
    {
        $user = User::find($id);
        return view('users.players.form', ['layout' => 'coach.layouts.app', 'user' => $user]);
    }


    public function updatePlayer(Request $request,$id)
    {
        $newUser =  $request->validate([
            'name' => "required",
            'mobile' => "required|numeric|min:10|unique:users,mobile",
            'email' => "required|email|unique:users,email",

        ]);

        $user = User::find($id);
        $user->name = $newUser['name'];
        $user->mobile = $newUser['mobile'];
        $user->email = $newUser['email'];
        $user->save();
        return redirect('coach/player/list');
    }
    public function storePlayer(Request $request)
    {
        $newUser =  $request->validate([
            'name' => "required",
            'mobile' => "required|numeric|min:10",
            // 'district_id' => "required",
            'email' => "required|email|unique:users,email",
            //    'pwd' =>"required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
            'pwd' => "required",
            'cpwd' => "required|same:pwd",
        ]);
        $user = new User;
        $user->name = $newUser['name'];
        $user->mobile = $newUser['mobile'];
        // $user->district_id = $newUser['district_id'];
        $user->email = $newUser['email'];
        $user->password = Hash::make($newUser['pwd']);
        $user->secure_id = bin2hex(random_bytes(16));
        $user->save();
        $roleGroup = new RoleGroup;
        $groupID = $roleGroup->getGroupId('player');
        $roletype = new RoleType;
        $roletype->role_id = $groupID->id;
        $roletype->user_id = $user->id;
        $roletype->coach_id = Auth::user()->id;
        $roletype->save();
        return redirect('coach/player/list');
    }

    public function playerList()
    {
        $users = new User;
        $users = $users->getPlayers('player', Auth::user()->id);

        return view('users.players.list', ['layout' => 'coach.layouts.app', 'users' => $users]);
    }



}