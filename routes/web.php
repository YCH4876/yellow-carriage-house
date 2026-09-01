<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rooms\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
// Windsor Queen is intentionally not offered. Disabled on the live site and
// kept that way here; its homepage card is commented out in welcome.blade.php
// and its copy remains in RoomController. Re-enable both together.
// Route::get('/rooms/windsor-queen-suite-plus', [RoomController::class, 'index']);
Route::get('/rooms/the-carriage-house-apartment-suite', [RoomController::class, 'index']);
Route::get('/gathering-room', function () {
    return view('rooms.gatheringRoom');
});

/********************
 * REDIRECTS
 *******************/

Route::get('/contact_us_inquiries_reservations', function () {
    return redirect('/#contact');
});
Route::get('/rooms_and_amenities', function () {
    return redirect('/#rooms');
});
Route::get('/local_attractions', function () {
    return redirect('/local-attractions');
});
Route::get('/special_events_weddings_and_receptions', function () {
    return redirect('/special-events');
});
Route::get('/gathering_room', function () {
    return redirect('/gathering-room');
});

/********************
 * AUTHENTICATED
 *******************/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
