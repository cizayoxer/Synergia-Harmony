<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\LoisirController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ServiceController;
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


Route::get('api/users', [UserController::class, "getUsers"]);
Route::get('api/user/{userById}', [UserController::class, "getUserById"]);
Route::post('api/user/add', [UserController::class, "addUser"]);
Route::put('api/user/modify/{userId}', [UserController::class, "modifyUser"]);
Route::delete('api/user/delete/{userId}', [UserController::class, 'deleteUser']);

#----------# Sports #---------------#
Route::get('api/sports', [SportController::class, "getSports"]);
Route::get('api/sport/{sportById}', [SportController::class, "getSportById"]);

#----------# Loisirs #---------------#
Route::get('api/loisirs', [LoisirController::class, "getLoisirs"]);
Route::get('api/loisir/{loisirByid}', [LoisirController::class, "getLoisirById"]);

#----------# Professeurs #---------------#
Route::get('api/professeurs', [ProfesseurController::class, "getProfs"]);
Route::get('api/professeur/{profByid}', [ProfesseurController::class, "getProfById"]);

#----------# Services #---------------#
Route::get('api/services', [ServiceController::class, "getServices"]);
Route::get('api/service/{serviceByid}', [ServiceController::class,"getServiceById"]);

#----------# Cours #---------------#
Route::get('api/cours', [CourController::class, "getCours"]);
Route::get('api/cour/{courByid}', [CourController::class,"getCourById"]);

#----------# Annonce #---------------#
Route::get('api/annonces', [AnnonceController::class, "getannonces"]);
Route::get('api/annonce/{annonceByid}', [AnnonceController::class,"getannonceById"]);
Route::delete('api/annonce/delete/{annonceId}', [AnnonceController::class, 'deleteAnnonce']);
Route::post('api/annonce/add', [AnnonceController::class, 'addAnnonce']);
Route::get('api/annonces/last', [AnnonceController::class, "getLastAnnonces"]);
