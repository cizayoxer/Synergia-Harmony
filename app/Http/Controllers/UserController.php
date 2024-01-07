<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUsers(Request $request)
    {
        $users = Utilisateur::all();

        return response()->json($users, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getUsersWithoutPassword(Request $request)
    {
        $users = Utilisateur::select('IDUTILISATEUR','NOMUTILISATEUR','PRENOMUTILISATEUR','SOLDE','EMAILUTILISATEUR')
            ->get();

        return response()->json($users, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getUserById(Request $request,$userById)
    {
        return response()->json(Utilisateur::find($userById));
    }

    function addUser(Request $request){
        $user = new Utilisateur();
        $user->NOMUTILISATEUR = $request->NOMUTILISATEUR;
        $user->PRENOMUTILISATEUR = $request->PRENOMUTILISATEUR;
        $user->MOTDEPASSE = $request->MOTDEPASSE;
        $user->SOLDE = 10;
        $user->EMAILUTILISATEUR = $request->EMAILUTILISATEUR;
        $user->save();
        return response()->json($user);
    }

    public function modifyUser(Request $request, $userId)
    {
        // Valider les données de la requête
        $this->validate($request, [
            'NOMUTILISATEUR' => 'required|string',
            'PRENOMUTILISATEUR' => 'required|string',
            'MOTDEPASSE' => 'required|string',
            'EMAILUTILISATEUR' => 'required|email',
        ]);

        // Récupérer l'utilisateur existant par son ID
        $user = Utilisateur::find($userId);

        if (!$user) {
            // Gérer le cas où l'utilisateur n'est pas trouvé
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        // Mettre à jour les informations de l'utilisateur
        $user->NOMUTILISATEUR = $request->NOMUTILISATEUR;
        $user->PRENOMUTILISATEUR = $request->PRENOMUTILISATEUR;
        $user->MOTDEPASSE = $request->MOTDEPASSE;
        $user->EMAILUTILISATEUR = $request->EMAILUTILISATEUR;

        // Enregistrer les modifications dans la base de données
        $user->save();

        // Retourner la réponse JSON avec les données mises à jour de l'utilisateur
        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function deleteUser(Request $request, $userId)
    {
        $user = Utilisateur::find($userId);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès.']);
    }





}
