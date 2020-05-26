<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function scopeSites($query)
    {
        return $query;
        
    }

    public function show(){
        return $this->belongsTo(Show::class);

    }
  
}
