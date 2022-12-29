<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Http\Request;

class fightController extends Controller
{

    public function chooseOpponent($fightMode){

        $Joueurs = User::getUserEnergies();
        //appel de la vue avec liste pokemon
        return view('chooseOpponent', ['fightMode' => $fightMode, 'Joueurs' => $Joueurs]);
    }
    //
    public function startFight($fightMode, $opposantName){
        //appel du model
        $Pokemons = Pokemon::getPokemons();
        //appel de la vue avec liste pokemon
        return view('fight', ['fightMode' => $fightMode, 'Pokemons' => $Pokemons , 'opposantName' => $opposantName]);
    }
}
