<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;

//*Affichage des produits */
Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/', [ProductsController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.detail');
Route::get('/product/category/{id}', [ProductsController::class, 'ProductByCategory'])->name('product.category');
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




require __DIR__.'/auth.php';
