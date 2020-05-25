<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\specialty;

class SpecialtyController extends Controller
{
    public function doctors(specialty $specialty){

        return $specialty->users()->get(['users.id','users.name']);

    }
}
