<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use App\Models\UTILISATEUR;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class ServiceController extends Controller
{

    public function getServices(Request $request)
    {
        $services = Service::all();
        return response()->json($services, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getServiceById(Request $request, $service)
    {
        return response()->json(Service::find($service));
    }

    public function reserverService(Request $request,$idUser,$idService)
    {
        $reservation= new Reservation();
        $reservation->IDACHETEUR=$idUser;
        $reservation->IDSERVICE=$idService;
        $reservation->save();
        return response()->json($reservation);
    }

    public function getReservationUsers(Request $request, $idUser)
    {

        $reservations = Reservation::where('IDACHETEUR', $idUser)->get();


        return response()->json($reservations);
    }



}
