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

    public function store(Request $request, $gagnant, $perdant, $replay)
    {
        // Validate the request...
 
        $match = new Matchs;
 
        $match->gagnant = $request->gagnant;
        $match->perdant = $request->perdant;
        $match->replay = $request->replay;
        $match->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $match->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        
        $match->save();

        return view('endMatch', ['match' => $request]);
    }
}
