<?php

Route::get('/', 'App\Http\Controllers\homeController@getHomePage');

Route::get('/postFight/{gagnant}/{perdant}/{replay}', 'App\Http\Controllers\statistiquesMatchsController@store');

Route::get('/listePokemons', 'App\Http\Controllers\listePokemonsController@getListePokemons');
Route::get('/statistiquesJoueurs', 'App\Http\Controllers\statistiquesJoueursController@getStatistiquesJoueurs');
Route::get('/statistiquesMatchs', 'App\Http\Controllers\statistiquesMatchsController@getStatistiquesMatchs');
Route::get('/fight/{fightMode}', 'App\Http\Controllers\fightController@chooseOpponent');
Route::get('/fight/{fightMode}/{opposantName}', 'App\Http\Controllers\fightController@startFight');
Route::get('/chooseOpponent', 'App\Http\Controllers\chooseOpponentController@getOpponent');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
