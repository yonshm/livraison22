<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable = [];

    function client(){
        return $this->hasOne(Client::class, 'id_utilisateur');
    }
    function banque(){
        return $this->belongsTo(Banque::class, 'id_banque');
    }
    function ville(){
        return $this->belongsTo(Ville::class, 'local');
    }
}
