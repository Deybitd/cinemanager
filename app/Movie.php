<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function scopeMovies($query)
    {
        return $query;
        
    }
}
