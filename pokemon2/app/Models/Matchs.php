<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    use HasFactory;


    protected $table = 'match';

    public static function getMatchs(){
        return self::all();
    }
}
