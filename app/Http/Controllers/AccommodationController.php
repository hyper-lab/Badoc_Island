<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
        return view('book', compact('accommodations'));
    }
}