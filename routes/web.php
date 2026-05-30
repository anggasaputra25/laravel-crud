<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ProductController::class, 'show']);
Route::post('/product', [ProductController::class, 'store'])->name("product.store");
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name("product.remove");
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name("product.edit");
Route::put('/product/{id}', [ProductController::class, 'update'])->name("product.update");
Route::get('/add/product', [ProductController::class, 'create'])->name("product.add");

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
