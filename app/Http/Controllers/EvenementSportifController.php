<?php

namespace App\Http\Controllers;

use App\Models\CINEMA;
use App\Models\EvenementSportif; // Import the missing class

use Illuminate\Http\Request;

class EvenementSportifController extends Controller
{
    //
    public function getEvenementsSport()
    {
        $evenementsSport = EvenementSportif::all(); // Use the imported class
        return response()->json($evenementsSport, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getEvenementsCinema()
    {
        $evenementsCinema = CINEMA::all(); // Use the imported class
        return response()->json($evenementsCinema, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
