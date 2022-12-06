<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemon';

    public function energy(){
        return $this->belongsTo('App\Models\Energy', 'id_energy', 'id' );
    }

    public static function getPokemons(){
        return self::with('energy')
        ->get();
    }


}
