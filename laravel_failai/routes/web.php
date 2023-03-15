<?php

use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\GameController;
use App\Http\Controllers\Administrator\OrderController;
use App\Http\Controllers\Administrator\PaymentTypeController;
use App\Http\Controllers\Administrator\ProductController;
use App\Http\Controllers\Administrator\ProfileController;
use App\Http\Controllers\Administrator\StatusController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\HomeController;
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
    Route::get('/', HomeController::class)->name('home');
    Route::view('/wordle', 'wordle.wordle');
    Route::view('/snake', 'snake.snake');
    Route::view('/sudoku', 'sudoku.sudoku');
    Route::view('/header', 'layouts.header');
    Route::view('/body', 'layouts.body');


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', isPersonel::class]], function () {
        Route::get('/', DashBoardController::class)->name('dashboard');
        Route::delete('/product/file/{file}', [ProductController::class, 'destroyFile'])->name('product.destroy-file');
        Route::resources([
            'products'     => ProductController::class,
            'categories'   => CategoryController::class,
            'orders'       => OrderController::class,
            'statuses'     => StatusController::class,
            'users'        => UserController::class,
            'paymentTypes' => PaymentTypeController::class,
            'games'        => GameController::class
        ]);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
