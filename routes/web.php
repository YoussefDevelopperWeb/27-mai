<?php

use App\Http\Controllers\CategorieAdController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeAdController;
use App\Http\Controllers\FactureAdController;
use App\Http\Controllers\FeedbackAdController;
use App\Http\Controllers\ProduitAdController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Admin Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Admin Commande routes
Route::get('/admin/commandes', [CommandeAdController::class, 'index'])->name('commande.index');
Route::delete('/admin/commandes/{id}', [CommandeAdController::class, 'destroy'])->name('commande.destroy');

// Admin Facture routes
Route::get('/admin/factures', [FactureAdController::class, 'index'])->name('facture.index');
Route::delete('/admin/factures/{id}', [FactureAdController::class, 'destroy'])->name('facture.destroy');

// Admin Feedback routes
Route::get('/admin/feedbacks', [FeedbackAdController::class, 'index'])->name('feedback.index');

// Admin Produit routes
Route::get('/admin/produits', [ProduitAdController::class, 'index'])->name('produit.index');
Route::get('/admin/produits/create', [ProduitAdController::class, 'create'])->name('produit.create');
Route::post('/admin/produits', [ProduitAdController::class, 'store'])->name('produit.store');
Route::get('/admin/produits/{id}/edit', [ProduitAdController::class, 'edit'])->name('produit.edit');
Route::put('/admin/produits/{id}', [ProduitAdController::class, 'update'])->name('produit.update');
Route::delete('/admin/produits/{id}', [ProduitAdController::class, 'destroy'])->name('produit.destroy');

Route::get('/categories', [CategorieAdController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieAdController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieAdController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategorieAdController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategorieAdController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategorieAdController::class, 'destroy'])->name('categories.destroy');
// Authentication routes
require __DIR__.'/auth.php';
