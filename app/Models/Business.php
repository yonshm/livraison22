<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public $timestamps = false;

    function client(){
        return $this->hasOne(Client::class, 'id');
    }
}
