<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class AcademicController extends Controller
{
    public function structure()
    {
        return view('frontend.academic.structure');
    }

    public function curriculum()
    {
        return view('frontend.academic.curriculum');
    }

    public function facilities()
    {
        $facilities = Facility::all();
        return view('frontend.academic.facilities', compact('facilities'));
    }
}
