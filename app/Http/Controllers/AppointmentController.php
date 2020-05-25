<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\SpecialtyController;
use App\specialty;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create(){
        $specialties = specialty::all();
        return view('appointments.create',compact('specialties'));

    }
}
