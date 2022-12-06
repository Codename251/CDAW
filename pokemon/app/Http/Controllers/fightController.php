<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fightController extends Controller
{
    //
    public function startFight($fightMode){
        //appel du model
        
        //appel de la vue avec liste pokemon
        return view('fight', ['fightMode' => $fightMode]);
    }
}
