<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminArtistController;
use App\Http\Controllers\TicketController;
use App\Livewire\Counter;
use App\Models\Ticket;

Route::view('/', 'welcome');



Route::middleware(['is_admin'])->prefix('admin')->name('admin.')->group(function(){

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::resource('music-events', AdminEventController::class)
    ->missing(fn($request)=> redirect()->route('admin.music-events.index')->with('message', 'no model has been found'))
        ->scoped([
            'event' => 'slug',
        ]);

    Route::resource('artists', AdminArtistController::class)
        ->missing(fn($request)=> redirect()->route('admin.artists.index')->with('message', 'no model has been found'))
        ->scoped([
            'artist' => 'slug',
        ]);

});


Route::middleware('auth')->group(function () {

    Route::resource('tickets', TicketController::class)
        ->missing(fn($request) => redirect()->route('admin.dashboard'))
        ->except('index');

});



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    

 
    Route::get('/counter', Counter::class);

require __DIR__.'/auth.php';
