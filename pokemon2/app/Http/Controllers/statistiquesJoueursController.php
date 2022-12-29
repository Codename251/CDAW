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
        $Joueurs = User::getUserEnergies();
       
        //appel de la vue avec liste pokemon
        return view('statistique', ['Joueurs' => $Joueurs]);
    }

    public function update($gagnant, $perdant)
    {
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
    }
}
