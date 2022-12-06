<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class statistiquesJoueursController extends Controller
{
    //
    public function getStatistiquesJoueurs(){
        //appel du model
        //$Pokemons = Pokemon::getPokemons();
        $Joueurs = User::getUsers();
        //appel de la vue avec liste pokemon
        return view('statistique', ['Joueurs' => $Joueurs]);
    }
}
