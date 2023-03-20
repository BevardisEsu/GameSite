<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function edit($scores){
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
        $gameID = $request->input('game_id');
        $userID = Auth::id();

        if ($gameID == 1) {
            // Score counting system for game ID 1
            if ($score >= 324) {
                $status = 'win';
            } else {
                $status = 'lose';
            }
        } elseif ($gameID == 2) {
            if ($score >= 10){
                $status = 'win';
            }else {
                $status = 'loose';
            }
        } elseif($gameID==3) {
            if ($score >= 20){
                $status = 'loose';
            }else{
                $status='win';
            };
        }else {
        // Handle unknown game ID
        abort(404);
    }
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


    public function countScores()
    {
        $userId = Auth::id();
        $userCountSnake = DB::table('scores')->where('user_id', $userId)->where('game_id', 1)->count();
        $userCountWordle = DB::table('scores')->where('user_id', $userId)->where('game_id', 2)->count();
        $userCountSudoku = DB::table('scores')->where('user_id', $userId)->where('game_id', 3)->count();
        $highScoreSnake = DB::table('scores')->where('user_id', $userId)->where('game_id', 1)->max('score');
        $highScoreWordle = DB::table('scores')->where('user_id', $userId)->where('game_id', 2)->max('score');
        $highScoreSudoku = DB::table('scores')->where('user_id', $userId)->where('game_id', 3)->max('score');
        $highestScoreSnake = DB::table('scores')
            ->select('scores.score', 'users.name')
            ->join('users', 'scores.user_id', '=', 'users.id')
            ->where('scores.game_id', 1)
            ->orderByDesc('scores.score')
            ->first();

        return view('home',
            compact('userCountSnake', 'highScoreSnake',
                             'userCountWordle','highScoreWordle',
                             'userCountSudoku','highScoreSudoku',
                              'highestScoreSnake'));
    }

}
