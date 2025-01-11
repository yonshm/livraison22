<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    public $timestamps = false;

    protected $fillable = [];

    function client(){
        return $this->hasOne(Client::class, 'id_utilisateur');
    }
    function banque(){
        return $this->hasMany(Banque::class, 'id_banque');
    }
    function ville(){
        return $this->hasMany(Ville::class, 'local');
    }
    function role(){
        return $this->hasMany(Role::class, 'id_role');
    }
}
