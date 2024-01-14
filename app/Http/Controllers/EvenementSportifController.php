<?php

namespace App\Http\Controllers;

use App\Models\EvenementSportif; // Import the missing class

use Illuminate\Http\Request;

class EvenementSportifController extends Controller
{
    //
    public function getEvenements()
    {
        $evenements = EvenementSportif::all(); // Use the imported class

        return response()->json($evenements, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
