<?php

use App\Http\Controllers\LoisirController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#----------# Utilisateurs #---------------#
Route::get('/users', [UserController::class, "getUsers"]);
Route::get('/user/{userById}', [UserController::class, "getUserById"]);
Route::post('/user/add/{userId}', [UserController::class, "addUser"]);
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
Route::get('/cours', [ServiceController::class, "getServices"]);
Route::get('/cour/{courByid}', [ServiceController::class,"getServiceById"]);
