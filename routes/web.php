<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\LoisirController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#----------# Utilisateurs #---------------#
Route::get('/users', [UserController::class, "getUsers"]);
Route::get('/user/{userById}', [UserController::class, "getUserById"]);
Route::post('/user/add', [UserController::class, "addUser"]);
Route::put('/user/modify/{userId}', [UserController::class, "modifyUser"]);
Route::delete('/user/delete/{userId}', [UserController::class, 'deleteUser']);

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
Route::get('/annonces', [AnnonceController::class, "getannonces"]);
Route::get('/annonce/{annonceByid}', [AnnonceController::class,"getannonceById"]);
Route::delete('/annonce/delete/{annonceId}', [AnnonceController::class, 'deleteAnnonce']);
Route::post('/annonce/add', [AnnonceController::class, 'addAnnonce']);
Route::get('/annonces/last', [AnnonceController::class, "getLastAnnonces"]);
