<?php

use App\Http\Controllers\LoisirController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#----------# Utilisateurs #---------------#
Route::get('/users', [UserController::class, "getUsers"]);
Route::get('/user/{userId}', [UserController::class, "getUserById"]);

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
