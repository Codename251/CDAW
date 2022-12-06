<?php

Route::get('/', 'App\Http\Controllers\homeController@getHomePage');


Route::get('/listePokemons', 'App\Http\Controllers\listePokemonsController@getListePokemons');
Route::get('/statistiquesJoueurs', 'App\Http\Controllers\statistiquesJoueursController@getStatistiquesJoueurs');
Route::get('/statistiquesMatchs', 'App\Http\Controllers\statistiquesMatchsController@getStatistiquesMatchs');
Route::get('/fight', 'App\Http\Controllers\fightController@startFight');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
