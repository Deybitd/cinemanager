<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{   
    public $fillable = ['nombre'];
    public function scopeSalas($query)
    {
        return $query;
        
    }

    public function shows(){
        return $this->hasMany(Show::class);

    }
}
