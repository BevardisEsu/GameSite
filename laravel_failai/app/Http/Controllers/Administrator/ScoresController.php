<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        $scores= Score::query()->with('scores')->get();
        return view('scores.index',compact('scores'));
    }
    public function create(){

        return view('scores.create');
    }
    public function store(Request $request){

        $score = new Score();
        $score->user_id = $request->input('user_id');
        $score->game_id = $request->input('game_id');
        $score->score = $request->input('score');
        $score->status = $request->input('status');
        $score->save();
        return redirect()->route('scores.show',$score);
    }
    public function edit(Score $scores){
        return view('scores.edit',compact('scores'));
    }
    public function update(Request $request, Score $score){
        $score->update($request->all());
        return redirect()->route('scores.show',$score);
    }
    public function destroy(Score $score){
        $score->delete();
        return redirect()->route('scores.index');
    }
    public function show(Score $score){
        return view('scores.show',['score'=>$score]);
    }


    public function saveScore(Request $request)
    {
        $score = $request->input('score');
        if ($score >= 324) {
            $status = 'win';
        } else {
             $status = 'lose';
        }
        $gameID= 1; //Dabar suhardcodinta
        $userID = Auth::id();

        // Save the score to the database or perform any other necessary actions
        $scoreData = new Score;
        $scoreData->user_id = $userID;
        $scoreData->game_id = $gameID;
        $scoreData->score = $score;
        $scoreData->status = $status;
        $scoreData->save();

        // Return a response to the client
        return response()->json(['success' => true]);
    }

}
