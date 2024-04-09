<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use App\Models\UTILISATEUR;
use Carbon\Carbon;
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


        $now = Carbon::now(); // Récupère la date et l'heure actuelles

        $reservations = Reservation::where('IDACHETEUR', $idUser)
            ->whereHas('service', function ($query) use ($now) {
                $query->where('DATEPREVUE', '<', $now);
            })
            ->with('service.typeService')
            ->get();

        return response()->json($reservations);
    }

    public function getReservationServiceByUser(Request $request, $idUser, $idService)
    {
        $reservation = Reservation::where('IDACHETEUR', $idUser)
            ->where('IDSERVICE', $idService)
            ->with('service.typeService')
            ->first();

        if ($reservation) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }




    public function getAutres(Request $request)
    {
        $autres=Service::where('typeService',3)->get();
        if ($autres==null)
        {
            return response()->json(['message' => 'Service non trouvé.'], 404);
        }
        else
        {
            return response()->json($autres);
        }

    }

    public function getAutreById(Request $request,$idService)
    {
        $autre=Service::find($idService);


        if ($autre==null)
        {
            return response()->json(['message' => 'Service non trouvé.'], 404);
        }
        else
        {
            $autre->where('typeService',3)->get();
            return response()->json($autre);
        }
    }

    public function annulerReservation(Request $request, $idReservation)
    {
        $reservation=Reservation::find($idReservation);
        if(!empty($reservation))
        {
            $reservation->delete();
            return response()->json("Réservation supprimé avec succés");
        }
        else
        {
            return response()->json();
        }
    }


}
