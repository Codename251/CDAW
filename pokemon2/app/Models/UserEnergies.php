<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEnergies extends Model
{
    use HasFactory;


    protected $table = 'userenergies';

    public static function getUserEnergies(){
        return self::all();
    }
}
