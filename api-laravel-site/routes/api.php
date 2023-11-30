<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\HebergeurController;
use App\Http\Controllers\DomaineController;

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

Route::post("/inscription", [UserController::class, "inscription"]);
Route::post("/login", [UserController::class, "login"]);

Route::get('/plan', [PlanController::class, 'get_All_Plans']);
Route::get('/plans/{id}', [PlanController::class, 'get_Plan']);
Route::post('/add_plan', [PlanController::class, 'store']);
Route::put('/plans/{id}', [PlanController::class, 'update']);
Route::delete('/plans/{id}', [PlanController::class, 'destroy']);

Route::get('/hebergeur', [HebergeurController::class, 'get_All_Hebergeurs']);
Route::get('/hebergeurs/{id}', [HebergeurController::class, 'get_Hebergeur']);
Route::post('/add_hebergeurs', [HebergeurController::class, 'store']);
Route::put('/hebergeurs/{id}', [HebergeurController::class, 'update']);
Route::delete('/hebergeurs/{id}', [HebergeurController::class, 'destroy']);

Route::get('/domaine', [DomaineController::class, 'get_All_Hebergeurs']);
Route::get('/domaines/{id}', [DomaineController::class, 'get_Hebergeur']);
Route::post('/add_domaines', [DomaineController::class, 'store']);
Route::put('/domaines/{id}', [DomaineController::class, 'update']);
Route::delete('/domaines/{id}', [DomaineController::class, 'destroy']);
