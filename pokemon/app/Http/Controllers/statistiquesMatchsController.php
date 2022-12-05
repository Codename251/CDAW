<?php

namespace App\Http\Controllers;
use App\Models\Matchs;
use Illuminate\Http\Request;

class statistiquesMatchsController extends Controller
{
    //

    public function getStatistiquesMatchs(){
        //appel du model
        $Matchs = Matchs::getMatchs();
        //appel de la vue avec liste pokemon
        return view('derniersMatchs', ['Matchs' => $Matchs]);
    }
}
