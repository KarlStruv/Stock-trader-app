<?php

use App\Http\Controllers\StocksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/balance/deposit', [UserController::class, 'depositView'])->name('balance.deposit');
Route::patch('/balance/deposit/amount', [UserController::class, 'depositAmount'])->name('balance.depositAmount');

Route::get('/stocks/search', [StocksController::class, 'searchView'])->name('stocks.search');
Route::put('/stocks/search/purchase', [StocksController::class, 'purchase'])->name('stocks.purchase');

Route::get('/stocks/portfolio', [StocksController::class, 'portfolioView'])->name('stocks.portfolio');

require __DIR__.'/auth.php';
