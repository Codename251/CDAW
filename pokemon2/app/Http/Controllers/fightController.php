<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class fightController extends Controller
{
    //
    public function startFight($fightMode){
        //appel du model
        $Pokemons = Pokemon::getPokemons();
        //appel de la vue avec liste pokemon
        return view('fight', ['fightMode' => $fightMode, 'Pokemons' => $Pokemons]);
    }
}
