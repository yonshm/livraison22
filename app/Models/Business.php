<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    function client(){
        return $this->hasOne(Client::class, 'id');
    }
}
