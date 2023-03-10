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

        $game = new GamesList();
        $game->name = $request->name;
        $game->description = $request->name;
    }
}
