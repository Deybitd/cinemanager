<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class specialty extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
