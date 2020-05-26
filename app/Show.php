<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    public function scopeShows($query)
    {
        return $query;
        
    }

    public function sala(){
        return $this->belongsTo(Sala::class);

    }
    public function movie(){
        return $this->belongsTo(Movie::class);

    }
    public function sites(){
        return $this->hasMany(Site::class);

    }
}
