<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\AnnonceController;

class AccueilController extends Controller
{
    // récupère les annonces, les events, les sondages et les cours
    public function getAccueil(){
        $annoncesController = new AnnonceController();
        $evenementsSportifController = new EvenementSportifController();
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
