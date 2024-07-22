<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProductsController;

//*Affichage des produits */
Route::get('/', [ProductsController::class, 'index'])->name('product');
Route::get('/product/{product}', [ProductsController::class, 'show'])->name('product.detail');
Route::get('/product/category/{id}', [ProductsController::class, 'ProductByCategory'])->name('product.category');
Route::get('/boutique', [ProductsController::class, 'boutique'])->name('boutique');

/** */
/**Gestion dashboard */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/**Gestion de l'authentification */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/**Gestion du panier */
Route::middleware('auth')->group(function () {
    Route::get('/panier', [PanierController::class, 'index'])->name('panier.lister');
    Route::get('/panier/add/{product}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
    Route::get('/panier/moins/{panier}', [PanierController::class, 'moins'])->name('panier.moins');
    Route::get('/panier/remove/{panier}', [PanierController::class, 'remove'])->name('panier.remove');



});



/**Ajouter un produit favoris*/
Route::middleware('auth')->group(function () {

Route::get('/favoris', [FavorisController::class, 'index'])->name('favoris.lister');
Route::get('/favoris/ajouter/{product}', [FavorisController::class, 'ajouter'])->name('favoris.ajouter');
Route::get('/favoris/remove/{favoris}', [FavorisController::class, 'remove'])->name('favoris.remove');

});

/**Gestion des commandes */
Route::middleware('auth')->group(function () {
    Route::get('/commande', [CommandeController::class, 'index'])->name('commandes.lister');
    Route::get('/commande/create', [CommandeController::class, 'create'])->name('commande.create');

});

require __DIR__.'/auth.php';
