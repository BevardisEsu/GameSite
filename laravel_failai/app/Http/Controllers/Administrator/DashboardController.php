<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\GamesList;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Score;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $latestCategory = Categories::latest()->take(1)->get();
        $latestGame = GamesList::latest()->take(1)->get();
        $latestOrder = Order::latest()->take(1)->get();
        $latestPayment = Payment::latest()->take(1)->get();
        $latestProduct = Product::latest()->take(1)->get();
        $latestScore = Score::latest()->take(1)->get();
        $latestStatus = Status::latest()->take(1)->get();
        $latestUser = User::latest()->take(1)->get();

        return view('administrator.dashboard',compact('latestCategory','latestGame','latestOrder',
        'latestPayment','latestProduct','latestScore','latestStatus','latestUser'));
    }
}
