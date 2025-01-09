<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public function utilisateur(){
        return $this->hasOne(Utilisateur::class, 'id');
    }
    public function coli(){
        return $this->hasOne(Coli::class, 'id');
    }
}
