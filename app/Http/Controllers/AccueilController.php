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
    /**
     * @OA\Get(
     *     path="/accueil",
     *     tags={"Accueil"},
     *     summary="Récupère les annonces, les événements, les sondages et les cours.",
     *     description="Récupère les annonces, les événements, les sondages et les cours pour afficher sur la page d'accueil.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des annonces, événements, sondages et cours récupérés avec succès.",
     *         @OA\JsonContent(
     *             @OA\Property(property="annonces", type="array", @OA\Items(ref="#/components/schemas/Annonce")),
     *             @OA\Property(property="events", type="array", @OA\Items(ref="#/components/schemas/Evenement")),
     *             @OA\Property(property="sondages", type="array", @OA\Items(ref="#/components/schemas/Sondage")),
     *             @OA\Property(property="cours", type="array", @OA\Items(ref="#/components/schemas/Cour")),
     *         ),
     *     ),
     *     @OA\Info(ref="#/components/info")
     * )
     */
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
