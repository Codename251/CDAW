<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class listePokemonsController extends Controller
{
    //

    public function getListePokemons(){
        //appel du model
        $Pokemons = Pokemon::getPokemons();
        //appel de la vue avec liste pokemon
        return view('listePokemons', ['Pokemons' => $Pokemons]);
    }
}
