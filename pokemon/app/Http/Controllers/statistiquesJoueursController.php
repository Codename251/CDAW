<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Energy;
use Illuminate\Http\Request;

class statistiquesJoueursController extends Controller
{
    //
    public function getStatistiquesJoueurs(){
        //appel du model
        //$Pokemons = Pokemon::getPokemons();
        $Joueurs = Pokemon::all();


        //appel de la vue avec liste pokemon
        return view('statistique', ['Joueurs' => $Joueurs]);
    }
}
