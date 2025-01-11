<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    protected $fillable = [];

    public function utilisateur(){
        return $this->hasOne(Utilisateur::class, 'id');
    }

}
