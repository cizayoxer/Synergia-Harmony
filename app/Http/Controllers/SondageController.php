<?php

namespace App\Http\Controllers;

use App\Models\A_VOTE_SONDAGE;
use App\Models\AVOTESONDAGE;
use App\Models\SONDAGE; // Utiliser le modèle Sondage correctement
use App\Models\UTILISATEUR;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class SondageController extends Controller
{
    public function getSondages()
    {
        // Récupérer tous les sondages
        $sondages = SONDAGE::all();

        // Parcourir chaque sondage pour ajouter les informations de vote
        foreach ($sondages as $sondage) {

            $votesPour = $sondage->votes()->where('AVIS', 'POUR')->count();
            $votesContre = $sondage->votes()->where('AVIS', 'CONTRE')->count();
            $sondage->votes_pour = $votesPour;
            $sondage->votes_contre = $votesContre;
        }

        // Retourner la réponse JSON avec les données de vote ajoutées à chaque sondage
        return response()->json($sondages, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getSondageById(Request $request, $sondageId)
    {
        $sondage = SONDAGE::find($sondageId);

        $votesPour = $sondage->votes()->where('AVIS', 'POUR')->count();
        $votesContre = $sondage->votes()->where('AVIS', 'CONTRE')->count();
        $sondage->votes_pour = $votesPour;
        $sondage->votes_contre = $votesContre;

        return response()->json($sondage, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function votePourSondage(Request $request,$idSondage,$idUser)
    {

        $userId = $idUser;

        $voteExist = A_VOTE_SONDAGE::where('IDSONDAGE', $idSondage)
            ->where('IDUTILISATEUR', $userId)
            ->exists();

        if ($voteExist) {
            return response()->json("Vous avez déja voté pour ce sondage", 200, [], JSON_UNESCAPED_UNICODE);
        }

        A_VOTE_SONDAGE::create([
            'IDSONDAGE' => $idSondage,
            'IDUTILISATEUR' => $userId,
            'AVIS' => 'POUR'
        ]);

//        $user=Utilisateur::where('IDUTILISATEUR',$userId);
//        $user->increment('SOLDE', 10);
        return response()->json("Votre vote a été pris en compte", 200, [], JSON_UNESCAPED_UNICODE);

    }



    public function voteContreSondage(Request $request,$idSondage,$idUser)
    {

        $userId = $idUser;

        $voteExist = A_VOTE_SONDAGE::where('IDSONDAGE', $idSondage)
            ->where('IDUTILISATEUR', $userId)
            ->exists();

        if ($voteExist) {
            return response()->json("Vous avez déja voté pour ce sondage", 200, [], JSON_UNESCAPED_UNICODE);
        }

                A_VOTE_SONDAGE::create([
                    'IDSONDAGE' => $idSondage,
                    'IDUTILISATEUR' => $userId,
                    'AVIS' => 'CONTRE'
                ]);

//        $user=Utilisateur::where('IDUTILISATEUR',$userId);
//        $user->increment('SOLDE', 10);
        return response()->json("Votre vote a été pris en compte", 200, [], JSON_UNESCAPED_UNICODE);

    }

//
//    public function votePour(Request $request, int $idSondage,int $idUser)
//    {
//
//                $userId = $idUser;
//
//                $voteExist = AvoteSondage::where('IDSONDAGE', $idSondage)
//                    ->where('IDUTILISATEUR', $userId)
//                    ->exists();
//
//                // Si l'utilisateur a déjà voté, renvoyer à la page précédente avec un message d'erreur
//                if ($voteExist) {
//                    return redirect()->back()->withErrors(['error' => 'Vous avez déjà voté pour ce sondage.', 'idSondage' => $idSondage]);
//                }
//
//                // Insérer le vote dans la table A_VOTE_SONDAGE
//                AvoteSondage::create([
//                    'IDSONDAGE' => $idSondage,
//                    'IDUTILISATEUR' => $userId,
//                    'AVIS' => 'POUR' // Ou 'CONTRE' selon le cas
//                ]);
//
//                // Redirection vers le tableau de bord avec un message de succès
//                return redirect()->route('dashboard')->with('success', 'Votre vote a été enregistré avec succès.')->with('idSondage', $idSondage);
//            } else {
//                // Redirection vers le tableau de bord avec un message d'erreur
//                return redirect()->route('dashboard')->withErrors(['error' => 'Vous devez être connecté pour voter.']);
//            }
//        } catch (\Exception $e) {
//            // Redirection vers le tableau de bord avec un message d'erreur
//            return redirect()->route('dashboard')->withErrors(['error' => 'Une erreur est survenue lors de l\'enregistrement de votre vote.']);
//        }
//    }



}
