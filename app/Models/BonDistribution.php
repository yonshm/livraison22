<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonDistribution extends Model
{
    protected $fillable = ['id_livreur'];
    public $timestamps = false;
    
    public function coli(){
        return $this->hasMany(Coli::class, 'bon_Distribution');
    }

    public function zones()
    {
    return $this->hasManyThrough(
        Zone::class, 
        Ville::class,
        'id_ville',        
        'id_zone',        
        'id',        
        'zone'       
    );
    }
    public function livreur(){
        return $this->belongsTo(Utilisateur::class, 'id_livreur');
    }

}
