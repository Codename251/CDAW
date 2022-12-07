<?php

namespace App\Http\Controllers;
use App\Models\UserInfo;
use App\Models\User;
use Illuminate\Http\Request;

class statistiquesJoueursController extends Controller
{
    //
    public function getStatistiquesJoueurs(){
        //appel du model
        $Joueurs = User::all();
        // $Joueurs = [];
        //appel de la vue avec liste pokemon
        return view('statistique', ['Joueurs' => $Joueurs]);
    }
}
