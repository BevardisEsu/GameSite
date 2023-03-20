<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\GamesListsRequest;
use App\Models\GamesList;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
     $games= GamesList::query()->with('games')->get();
     return view('games.index',compact('games'));
    }
    public function create(){

        return view('games.create');
    }
    public function store(Request $request){

       $game = GamesList::create($request->all());
       return redirect()->route('games.show',$game);
    }
    public function edit(GamesListsRequest $games){
        return view('games.edit',compact('games'));
    }
    public function update(Request $request, GamesListsRequest $game){
        $game->update($request->all());
        return redirect()->route('games.show',$game);
    }
    public function destroy(GamesListsRequest $game){
        $game->delete();
        return redirect()->route('games.index');
    }
    public function show(GamesListsRequest $game){
        return view('games.show',['game'=>$game]);
    }
}
