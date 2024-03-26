<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourController extends Controller
{
    public function getCours()
    {
        // Requête SQL pour récupérer les cours avec les colonnes spécifiées
//        $cours = DB::table('COURS')
//            ->select('COURS.IDMATIERE as Classe', 'LIBELLEMATIERE', 'LIBELLESPECIALITE')
//            ->join('CLASSE', 'COURS.IDSPECIALITE', '=', 'CLASSE.IDSPECIALITE')
//            ->join('ETRE_INCLU', 'ETRE_INCLU.IDSPECIALITE', '=', 'COURS.IDSPECIALITE')
//            ->get();
        $cours = Cour::all();

        foreach ($cours as $cour) {
            // Récupérer le nom du sport associé à partir de la relation
            $nomMatiere = $cour->c_l_a_s_s_e->LIBELLEMATIERE;
            // Ajouter le nom du sport à l'objet événement sportif
            $cour->nom_matiere = $nomMatiere;
        }


        return response()->json($cours, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getCourById(Request $request, $courId)
    {
        $cour = DB::table('COURS')
            ->select('COURS.IDMATIERE as Classe', 'LIBELLEMATIERE', 'LIBELLESPECIALITE', 'UTILISATEUR.NOMUTILISATEUR', 'UTILISATEUR.PRENOMUTILISATEUR', 'EMAIL')
            ->join('CLASSE', 'COURS.IDSPECIALITE', '=', 'CLASSE.IDSPECIALITE')
            ->join('ETRE_INCLU', 'ETRE_INCLU.IDSPECIALITE', '=', 'COURS.IDSPECIALITE')
            ->join('ETUDIANT', 'ETUDIANT.IDUTILISATEUR', '=', 'ETRE_INCLU.IDUTILISATEUR')
            ->join('UTILISATEUR', 'UTILISATEUR.IDUTILISATEUR', '=', 'ETUDIANT.IDUTILISATEUR')
            ->where('COURS.IDMATIERE', $courId)
            ->get();

        return response()->json($cour, 200, [], JSON_UNESCAPED_UNICODE);
    }






}
