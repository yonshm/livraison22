<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banque extends Model
{
    public function utilisateur(){
        return $this->hasOne(Utilisateur::class, 'id');
    }
}
