<?php

use App\Http\Controllers\HandbagController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ScanController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Lecture
Route::resource('handbags', HandbagController::class);
Route::get('gettabelhandbag', [HandbagController::class, 'getData'])->name('handbags.getData');


// Route Lecture
Route::resource('lectures', LectureController::class);
Route::get('gettabeldosen', [LectureController::class, 'getData'])->name('lectures.getData');




// Route User
Route::resource('scans', ScanController::class);
