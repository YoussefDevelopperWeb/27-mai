<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth:sanctum')->group(function() {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::apiResource('categories', CategorieController::class);
Route::apiResource('admins', AdminController::class);
Route::apiResource('commandes', CommandeController::class);
Route::apiResource('produits', ProduitController::class);
Route::apiResource('feedback', FeedbackController::class);
Route::apiResource('paniers', PanierController::class);
Route::apiResource('favoris', FavoriController::class);
Route::apiResource('profiles', ProfileController::class);
Route::apiResource('paiements', PaiementController::class);
Route::apiResource('livraisons', LivraisonController::class);
Route::apiResource('factures', FactureController::class);

