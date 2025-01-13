<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bon_ramassage extends Model
{
    public $timestamps = false;
    protected $fillable = [];

    public function coli(){
        return $this->hasMany(Coli::class, 'bon_ramassage');
    }
    public function ville(){
        return $this->belongsTo(Ville::class, 'ville_ramassage');
    }
}
