<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ZoneController;

Route::get('/', function () {
    return view('welcome');
});

// Start Route Clients ::::::::::::::::::::::::::::::::
// Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

// Route::get('/clients/{id}', function () {
//     return view('clients.show');
// });

Route::get('/client/{user}', [ClientController::class, 'index'])->name('clients.index');
Route::get('/client/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/client', [ClientController::class, 'store'])->name('clients.store');
// Route::get('/client/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/client/update/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
// End Route Clients :::::::::::::::::::::::::::::::::

// Start Route Ville ::::::::::::::::::::::::::::::::
Route::get('/admin/villes', [VilleController::class, 'index'])->name('villes.index');
Route::post('/admin/villes', [VilleController::class, 'store'])->name('villes.store');
Route::get('/admin/villes/edit/{id}', [VilleController::class, 'edit'])->name('villes.edit');
Route::put('/admin/villes/update/{id}', [VilleController::class, 'update'])->name('villes.update');
Route::delete('/admin/villes/{id}', [VilleController::class, 'destroy'])->name('villes.destroy');
// End Route Ville ::::::::::::::::::::::::::::::::

// Start Route Zone ::::::::::::::::::::::::::::::::
Route::get('/admin/zones', [ZoneController::class, 'index'])->name('zones.index');
Route::post('/admin/zones', [ZoneController::class, 'store'])->name('zones.store');
Route::get('/admin/zones/edit/{id}', [ZoneController::class, 'edit'])->name('zones.edit');
Route::put('/admin/zones/update/{id}', [ZoneController::class, 'update'])->name('zones.update');
Route::delete('/admin/zones/{id}', [ZoneController::class, 'destroy'])->name('zones.destroy');
// End Route Zone ::::::::::::::::::::::::::::::::

// Start Route Admin ::::::::::::::::::::::::::::::::

Route::get('/admin', [AdminController::class, 'index'])->name('admins.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admins.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admins.store');
Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admins.show');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admins.update');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');

Route::get('/admin/clients', [AdminController::class, 'showClients'])->name('admins.showClients');
Route::get('/admin/clients/t', [AdminController::class, 'test'])->name('admins.test');

// End Route Admin ::::::::::::::::::::::::::::::::


// Start Route Coli ::::::::::::::::::::::::::::::::

// Route::get('/client/colis', [ColiController::class, 'index'])->name('colis.index');
Route::get('/client/colis', [ColiController::class, 'indexByClient'])->name('colis.indexByClient');
Route::get('/client/colis/ramassage', [ColiController::class, 'colisAttenderRamassage'])->name('colis.colisAttenderRamassage');
Route::get('/client/colis/NonExpedies', [ColiController::class, 'colisNonExpedies'])->name('colis.colisNonExpedies');
Route::get('/client/colis/create', [ColiController::class, 'create'])->name('colis.create');
Route::post('/client/colis', [ColiController::class, 'store'])->name('colis.store');
Route::get('/client/colis/{id}', [ColiController::class, 'show'])->name('colis.show');
Route::get('/client/colis/edit/{id}', [ColiController::class, 'edit'])->name('colis.edit');
Route::put('/client/colis/update/{id}', [ColiController::class, 'update'])->name('colis.update');
Route::delete('/client/colis/{id}', [ColiController::class, 'destroy'])->name('colis.destroy');

// End Route Coli ::::::::::::::::::::::::::::::::

// Start Route Auth ::::::::::::::::::::::::::::::::
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'check'])->name('auth.check');
// End Route Auth ::::::::::::::::::::::::::::::::