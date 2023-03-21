<?php

use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\GameController;
use App\Http\Controllers\Administrator\OrderController;
use App\Http\Controllers\Administrator\PaymentController;
use App\Http\Controllers\Administrator\PaymentTypeController;
use App\Http\Controllers\Administrator\ProductController;
use App\Http\Controllers\Administrator\ProfileController;
use App\Http\Controllers\Administrator\ScoresController;
use App\Http\Controllers\Administrator\StatusController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\isPersonel;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => SetLocale::class], function () {
    require __DIR__.'/auth.php';
    Route::get('/switch-language/{lang}', [LanguageController::class,'setLanguage'])->name('setLanguage');

    Route::middleware(['auth'])->prefix('games')->group(function () {
        Route::get('/snake', function () {
            return view('gamesList.snake');
        });
        Route::get('/sudoku', function () {
            return view('gamesList.sudoku');
        });
        Route::get('/wordle', function () {
            return view('gamesList.wordle');
        });
    });
    Route::middleware(['auth'])->group(function () {
        Route::get('/home', function () {
            return view('home');
        });
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', isPersonel::class]], function () {
        Route::get('/', HomeController::class)->name('home');

        Route::delete('/product/file/{file}', [ProductController::class, 'destroyFile'])->name('product.destroy-file');
        Route::resources([
            'products'     => ProductController::class,
            'categories'   => CategoryController::class,
            'orders'       => OrderController::class,
            'statuses'     => StatusController::class,
            'users'        => UserController::class,
            'payments'     => PaymentController::class,
            'paymenttypes' => PaymentTypeController::class,
            'games'        => GameController::class,
            'scores'       => ScoresController::class,

        ]);
    });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


});
Route::post('/saveScore', [ScoresController::class, 'saveScore'])->name('saveScore');
Route::get('/home', [ScoresController::class,'countScores'])->name('countScores');
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');

});

