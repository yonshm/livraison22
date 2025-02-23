<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bon_ramassage extends Model
{
    public function bon_envoi(){
        return $this->belongsTo(Bon_envoi::class, 'bon_envoi');
    }

}
