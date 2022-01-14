<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rooms\RoomController;

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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/policies', function () {
    return view('policies');
});

Route::get('/special-events', function () {
    return view('specialEvents');
});

Route::get('/local-attractions', function () {
    return view('localAttractions');
});

/*******************
 ROOMS
 ********************/
Route::get('/rooms/king-lee-suite', [RoomController::class, 'index']);
Route::get('/rooms/windsor-queen-suite-plus', [RoomController::class, 'index']);
Route::get('/rooms/the-carriage-house-apartment-suite', [RoomController::class, 'index']);
