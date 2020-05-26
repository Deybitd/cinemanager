<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function scopeSales($query)
    {
        return $query;
        
    }

    // public function show(){
    //     return $this->belongsTo(Show::class);

    // }
  
}
