<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\EchangCompetController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\LoisirController;
use App\Http\Controllers\CovoiturageController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SondageController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', [UserController::class, "getUsers"]);
Route::get('/user/{userById}', [UserController::class, "getUserById"]);
Route::post('/user/add', [UserController::class, "addUser"]);
Route::put('/user/modify/{userId}', [UserController::class, "modifyUser"]);
Route::delete('/user/delete/{userId}', [UserController::class, 'deleteUser']);
Route::put('/user/crediter/{userId}', [UserController::class, "addMonnaie"]);
Route::put('/user/verser/{userId}', [UserController::class, "removeMonnaie"]);


#----------# Sports #---------------#
Route::get('/sports', [SportController::class, "getSports"]);
Route::get('/sport/{sportById}', [SportController::class, "getSportById"]);


#----------# Loisirs #---------------#
Route::get('/loisirs', [LoisirController::class, "getLoisirs"]);
Route::get('/loisir/{loisirByid}', [LoisirController::class, "getLoisirById"]);


#----------# Professeurs #---------------#
Route::get('/professeurs', [ProfesseurController::class, "getProfs"]);
Route::get('/professeur/{profByid}', [ProfesseurController::class, "getProfById"]);


#----------# Services #---------------#
Route::get('/services', [ServiceController::class, "getServices"]);
Route::get('/service/{serviceByid}', [ServiceController::class,"getServiceById"]);


#----------# Cours #---------------#
Route::get('/cours', [CourController::class, "getCours"]);
Route::get('/cour/{courByid}', [CourController::class,"getCourById"]);


#----------# Annonce #---------------#
Route::get('/annonces', [AnnonceController::class, "getAnnonces"]);
Route::get('/annonce/{annonceByid}', [AnnonceController::class,"getAnnonceById"]);
Route::delete('/annonce/delete/{annonceId}', [AnnonceController::class, 'deleteAnnonce']);
Route::post('/annonce/add', [AnnonceController::class, 'addAnnonce']);
Route::get('/annonces/last/{limit}', [AnnonceController::class, "getLastAnnonces"]);


#----------# Accueil #---------------#
Route::get('/accueil', [AccueilController::class, "getAccueil"]);

#----------# Sondage #---------------#
Route::get('/sondages', [SondageController::class, "getSondages"]);
Route::get('/sondage/{sondageByid}', [SondageController::class,"getSondageById"]);

#----------# Events#---------------#
Route::get("/events/cinema",[EvenementController::class,'getEvenementsCinema']);
Route::get("/events/sport",[EvenementController::class,'getEvenementsSport']);

#----------# Convoiturage#---------------#
Route::get("/covoiturages",[CovoiturageController::class,'getConvoits']);
Route::get("/covoiturage/{covoiturageId}",[CovoiturageController::class,'getConvoitById']);

#----------# Convoiturage#---------------#
Route::get("/echangeCompetences",[EchangCompetController::class,'getAllEchanges']);
Route::get("/echangeCompetence/{echangeCompId}",[EchangCompetController::class,'getEchangeById']);
