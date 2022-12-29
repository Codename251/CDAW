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
        $id_gagnant = User::where('name', $gagnant);
        $id_perdant = User::where('name', $perdant);

        $victoireGagnant = 1;
        $matchsJouesGagnant = 1;
        $scoreGagnant = 100;
        /*if ($id_gagnant->victoire%10 == 0){
            $id_gagnant->level = 1;
            $newMaitrise = new UserEnergies;
            $newMaitrise->user_id = $id_gagnant;
            $newMaitrise->energy_id = $id_gagnant->level + 1;
            $newMaitrise->save();
        }*/

        $matchsJouesPerdant = 1;
        $scorePerdant = 50;
        /*if ($id_perdant->score > 50){
            $id_perdant->score = 50;
        }*/

        
        User::where('name', $gagnant)->update([
            'victoire' => $victoireGagnant,
            'matchsJoués'=>  $matchsJouesGagnant,
            'score' => $scoreGagnant
        ]);
        
        User::where('name', $perdant)->update([
            'matchsJoués'=>  $matchsJouesPerdant,
            'score' => $scorePerdant
        ]);
    }
}
