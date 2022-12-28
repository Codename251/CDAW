<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chooseOpponentController extends Controller
{

    public function getOpponent(){

        return view('chooseOpponent');
    }
}
