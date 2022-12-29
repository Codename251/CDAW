<?php

namespace App\Http\Controllers;
use App\Models\Matchs;
use App\Models\User;
use App\Models\UserEnergies;
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

    public function store($gagnant, $perdant, $replay)
    {
        // Validate the request...
 
        $match = new Matchs;
 
        $match->gagnant = $gagnant;
        $match->perdant = $perdant;
        $match->replay = $replay;
        $match->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $match->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        
        $match->save();

        // Players statistics update
        // Validate the request...
        $Gagnant = User::where('name', $gagnant)->first();
        $Perdant = User::where('name', $perdant)->first();

        $victoireGagnant = 1 + $Gagnant->victoire;
        $matchsJouesGagnant = 1 + $Gagnant->matchsJoués;
        $scoreGagnant = 100 + $Gagnant->score;
        $levelGagnant = $Gagnant->level;
        if ($victoireGagnant %10 == 0){
            $levelGagnant += 1;

            $newMaitrise = new UserEnergies;
            $newMaitrise->user_id = $Gagnant->id;
            $newMaitrise->energy_id = $levelGagnant + 1;
            $newMaitrise->created_at = \Carbon\Carbon::now()->toDateTimeString();
            $newMaitrise->updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $newMaitrise->save();
        }

        $matchsJouesPerdant = 1 + $Perdant->matchsJoués;
        $scorePerdant = $Perdant->score;
        if ($scorePerdant > 50){
            $scorePerdant -= 50;
        }

        
        User::where('name', $gagnant)->update([
            'victoire' => $victoireGagnant,
            'matchsJoués'=>  $matchsJouesGagnant,
            'score' => $scoreGagnant,
            'level' => $levelGagnant
        ]);
        
        User::where('name', $perdant)->update([
            'matchsJoués'=>  $matchsJouesPerdant,
            'score' => $scorePerdant
        ]);

        return view('endMatch', ['gagnant' => $gagnant, 'perdant' => $perdant, 'replay' => $replay]);
    }
}
