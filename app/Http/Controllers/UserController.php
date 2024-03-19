<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * Récupère tous les utilisateurs.
     *
     * @return JsonResponse JSON contenant tous les utilisateurs.
     *
     * @OA\Get(
     *     path="/users",
     *     tags={"Utilisateurs"},
     *     summary="Récupère tous les utilisateurs.",
     *     description="Récupère tous les utilisateurs dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des utilisateurs récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Utilisateur")
     *         )
     *     )
     * )
     */
    public function getUsers(Request $request)
    {
        $users = Utilisateur::all();
        return response()->json($users, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère tous les utilisateurs sans mot de passe.
     *
     * @return JsonResponse JSON contenant tous les utilisateurs sans mot de passe.
     *
     * @OA\Get(
     *     path="/users/nopassword",
     *     tags={"Utilisateurs"},
     *     summary="Récupère tous les utilisateurs sans mot de passe.",
     *     description="Récupère tous les utilisateurs sans mot de passe dans le système.",
     *     @OA\Response(
     *         response=200,
     *         description="Liste des utilisateurs sans mot de passe récupérés avec succès.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Utilisateur")
     *         )
     *     )
     * )
     */
    public function getUsersWithoutPassword(Request $request)
    {
        $users = Utilisateur::select('IDUTILISATEUR', 'NOMUTILISATEUR', 'PRENOMUTILISATEUR', 'SOLDE', 'EMAILUTILISATEUR')
            ->get();
        return response()->json($users, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Récupère un utilisateur spécifique en utilisant son ID.
     *
     * @param Request $request La requête HTTP.
     * @param int $userId L'ID de l'utilisateur à récupérer.
     * @return JsonResponse Un JSON contenant l'utilisateur spécifié.
     *
     * @OA\Get(
     *     path="/users/{userId}",
     *     tags={"Utilisateurs"},
     *     summary="Récupère un utilisateur spécifique.",
     *     description="Récupère un utilisateur spécifique en utilisant son ID.",
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur à récupérer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur récupéré avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Utilisateur")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non trouvé."
     *     )
     * )
     */
    public function getUserById(Request $request, $userId)
    {
        return response()->json(Utilisateur::find($userId));
    }

    /**
     * Ajoute un utilisateur.
     *
     * @param Request $request La requête HTTP.
     * @return JsonResponse Un JSON contenant l'utilisateur ajouté.
     *
     * @OA\Post(
     *     path="/users",
     *     tags={"Utilisateurs"},
     *     summary="Ajoute un utilisateur.",
     *     description="Ajoute un utilisateur au système.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Utilisateur")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur ajouté avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Utilisateur")
     *     )
     * )
     */
    public function addUser(Request $request)
    {
        $user = new Utilisateur();
        $user->NOMUTILISATEUR = $request->NOMUTILISATEUR;
        $user->PRENOMUTILISATEUR = $request->PRENOMUTILISATEUR;
        $user->MOTDEPASSE = bcrypt($request->MOTDEPASSE);
        $user->SOLDE = 10;
        $user->EMAILUTILISATEUR = $request->EMAILUTILISATEUR;
        $user->save();
        return response()->json($user);
    }

    /**
     * Modifie un utilisateur existant.
     *
     * @param Request $request La requête HTTP.
     * @param int $userId L'ID de l'utilisateur à modifier.
     * @return JsonResponse Un JSON contenant l'utilisateur modifié.
     *
     * @OA\Put(
     *     path="/users/{userId}",
     *     tags={"Utilisateurs"},
     *     summary="Modifie un utilisateur existant.",
     *     description="Modifie un utilisateur existant dans le système.",
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur à modifier.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Utilisateur")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur modifié avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Utilisateur")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non trouvé."
     *     )
     * )
     */
    public function modifyUser(Request $request, $userId)
    {

        $this->validate($request, [
            'NOMUTILISATEUR' => 'required|string',
            'PRENOMUTILISATEUR' => 'required|string',
            'MOTDEPASSE' => 'required|string',
            'EMAILUTILISATEUR' => 'required|email',
        ]);

        $user = Utilisateur::find($userId);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $user->NOMUTILISATEUR = $request->NOMUTILISATEUR;
        $user->PRENOMUTILISATEUR = $request->PRENOMUTILISATEUR;
        $user->MOTDEPASSE = bcrypt($request->MOTDEPASSE);
        $user->EMAILUTILISATEUR = $request->EMAILUTILISATEUR;

        $user->save();

        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }
    /**
     * Supprime un utilisateur existant.
     *
     * @param Request $request La requête HTTP.
     * @param int $userId L'ID de l'utilisateur à supprimer.
     * @return JsonResponse Un JSON contenant un message indiquant si la suppression a réussi.
     *
     * @OA\Delete(
     *     path="/users/{userId}",
     *     tags={"Utilisateurs"},
     *     summary="Supprime un utilisateur existant.",
     *     description="Supprime un utilisateur existant dans le système.",
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur à supprimer.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur supprimé avec succès.",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non trouvé."
     *     )
     * )
     */
    public function deleteUser(Request $request, $userId)
    {
        $user = Utilisateur::find($userId);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès.']);
    }
    /**
     * Ajoute de la monnaie au solde d'un utilisateur.
     *
     * @param Request $request La requête HTTP.
     * @param int $userId L'ID de l'utilisateur auquel ajouter la monnaie.
     * @return JsonResponse Un JSON contenant l'utilisateur avec le solde mis à jour.
     *
     * @OA\Post(
     *     path="/users/{userId}/add-monnaie",
     *     tags={"Utilisateurs"},
     *     summary="Ajoute de la monnaie au solde d'un utilisateur.",
     *     description="Ajoute de la monnaie au solde d'un utilisateur dans le système.",
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur auquel ajouter la monnaie.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"SOLDE"},
     *             @OA\Property(property="SOLDE", type="number", format="float", example=100)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Monnaie ajoutée avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Utilisateur")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non trouvé."
     *     )
     * )
     */
    public function addMonnaie(Request $request, $userId)
    {
        $user = Utilisateur::find($userId);
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
        if($request->post("SOLDE", 0)<0 || $request->post("SOLDE", 0)>10000)
        {
            return response()->json(['message' => 'Borne dépassé'], 404);
        }

        $user->SOLDE +=  $request->post("SOLDE", 0);
        $user->save();

        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }
    /**
     * Supprime de la monnaie du solde d'un utilisateur.
     *
     * @param Request $request La requête HTTP.
     * @param int $userId L'ID de l'utilisateur auquel supprimer la monnaie.
     * @return JsonResponse Un JSON contenant l'utilisateur avec le solde mis à jour.
     *
     * @OA\Post(
     *     path="/users/{userId}/delete-monnaie",
     *     tags={"Utilisateurs"},
     *     summary="Supprime de la monnaie du solde d'un utilisateur.",
     *     description="Supprime de la monnaie du solde d'un utilisateur dans le système.",
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur auquel supprimer la monnaie.",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"SOLDE"},
     *             @OA\Property(property="SOLDE", type="number", format="float", example=100)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Monnaie supprimée avec succès.",
     *         @OA\JsonContent(ref="#/components/schemas/Utilisateur")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non trouvé."
     *     )
     * )
     */
    public function removeMonnaie(Request $request, $userId)
    {
        $user = Utilisateur::find($userId);
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
        if($request->post("SOLDE", 0)<0 || $request->post("SOLDE", 0)>10000)
        {
            return response()->json(['message' => 'Borne dépassé'], 404);
        }

        $user->SOLDE -=  $request->post("SOLDE", 0);
        $user->save();

        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }





}
