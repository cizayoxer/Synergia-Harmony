<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\SondageController;
use App\Http\Controllers\CourController;
use OpenApi\Annotations as OA;

class AccueilController extends Controller
{

    public function getAccueil(){
        $annoncesController = new AnnonceController();
        $evenementsSportifController = new EvenementController();
        $sondagesController = new SondageController();
        $annonces = $annoncesController->getAnnonces();
        $events = $evenementsSportifController->getEvenements();
        $sondages = $sondagesController->getSondages();
        $courController = new CourController();
        $cours = $courController->getCours();
        return response()->json([
            "annonces" => $annonces,
            "events" => $events,
            "sondages" => $sondages,
            "cours" => $cours
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
