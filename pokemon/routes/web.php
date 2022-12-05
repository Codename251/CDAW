<?php

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

    // Route::get('/{prenom}/{nom}', function ($prenom, $nom) {

    //     return $prenom . " " . $nom;

    //     //return "Hello world";
    //     //return view('welcome');
    // });

// Route::get('/{title}', function ($title) {
   
//         return $title;
    
// })->where('title', '[A-Za-z]+');
Route::get('/', 'App\Http\Controllers\homeController@getHomePage');



Route::get('/htmlTest', function () {
    
     ?>

    <!doctype html>
            <html lang="fr">
            <head>
            <meta charset="UTF-8">
            <title>Mauvaise façon</title>
        </head>
        <body>
            <p>Le fichier risque d'être longggggg</p>
        </body>

        </html>

<?php 
});

// Route::get('/listePokemons', function () {
    
//     return view('listePokemons');
    
// });

Route::get('/listePokemons', 'App\Http\Controllers\listePokemonsController@getListePokemons');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
