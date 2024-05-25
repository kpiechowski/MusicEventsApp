<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminArtistController;
use App\Livewire\Counter;

Route::view('/', 'welcome');



Route::middleware(['is_admin'])->prefix('admin')->name('admin.')->group(function(){

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::resource('events', AdminEventController::class);

    Route::resource('artists', AdminArtistController::class)
        ->missing(fn($request)=> redirect()->route('admin.artists.index')->with('message', 'no model has been found'))
        ->scoped([
            'artist' => 'slug',
        ]);

});



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    

 
    Route::get('/counter', Counter::class);

require __DIR__.'/auth.php';
