<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Game;
class GameController extends Controller
{
    //
    public function index()
    {
        $games = Game::orderBy("created_at","desc")->get()->toArray();
     
        return view("game.list",['games'=>$games,'layout'=> "admin.layouts.app"]);
    }

    public function addGame()
    {
        return view('game.form', ['layout' => 'admin.layouts.app']);
    }

    public function storeGame(Request $request)
    {

        $game =  $request->validate([
            'name' => "required",
        ]);
        $newGame  = new Game;
        $newGame->name = $game['name'];
        $newGame->save();
        return redirect('admin/game');
    }
    public function editGame($id)
    {

        return view('game.form', ['layout' => 'admin.layouts.app','game'=> Game::find($id)]);

    }

    public function updateGame(Request $request, $id)
    {
        $game =  $request->validate([
            'name' => "required",
        ]);
        $newGame  = Game::find($id);
        $newGame->name = $game['name'];
        $newGame->save();
        return redirect('admin/game');
    }
}
