<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [];

    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class, 'id');
    }

}
