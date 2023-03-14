<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\GamesList;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
     $game= GamesList::query()->with('GamesList')->get();
     return view('games.index',compact('game'));
    }
    public function create(){

        return view('games.create');
    }
    public function store(Request $request){

       $game = GamesList::create($request->all());
       return redirect()->route('games.show',$game);
    }
    public function edit(GamesList $games){
        return view('games.edit',compact('games'));
    }
    public function update(Request $request, GamesList $game){
        $game->update($request->all());
        return redirect()->route('games.show',$game);
    }
    public function destroy(GamesList $game){
        $game->delete();
        return redirect()->route('games.index');
    }
    public function show(GamesList $game){
        return view('games.show',['game'=>$game]);
    }
}
