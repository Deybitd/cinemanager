<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function scopeProducts($query)
    {
        return $query;
        
    }
}
