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




// Route::get('/listePokemons', function () {
    
//     return view('listePokemons');
    
// });

Route::get('/listePokemons', 'App\Http\Controllers\listePokemonsController@getListePokemons');


