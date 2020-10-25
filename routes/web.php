<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\game_master;

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

Auth::routes();

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/game/{section}/{item?}/{death?}', [game_master::class, '__invoke'])->name('game')->middleware('auth');

Route::get('/register', function(){
  return view("register");
})->name('register');
