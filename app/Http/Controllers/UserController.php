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

    public function getUserById(Request $request,$userId)
    {
        return response()->json(Utilisateur::find($userId));
    }

    function addUser(Request $request){
        $user = new Utilisateur();
        $user->NOMUTILISATEUR = $request->NOMUTILISATEUR;
        $user->PRENOMUTILISATEUR = $request->PRENOMUTILISATEUR;
        $user->MOTDEPASSE = $request->MOTDEPASSE;
        $user->prix = 10;
        $user->EMAILUTILISATEUR = $request->EMAILUTILISATEUR;
        $user->save();
        return response()->json($user);
    }




}
