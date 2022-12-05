<?php

Route::get('/', 'App\Http\Controllers\homeController@getHomePage');


Route::get('/listePokemons', 'App\Http\Controllers\listePokemonsController@getListePokemons');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
