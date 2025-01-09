<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coli extends Model
{
    public $timestamps = false;
    protected $fillable = ['ref','telephone','adresse','id_business','marchandise','id_ville','destinataire','ouvrir',
                    'date_creation','bon_ramassage','prix','id_client','pret_preparation','etat',
                    'coli_type','commentaire'];

    function ville(){
        return $this->belongsTo(Ville::class, 'id_ville');
    }
    public function business(){
        return $this->belongsTo(Business::class, 'id_business');
    }
}
