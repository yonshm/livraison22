<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GeneralConteroller;
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

Route::prefix('admin')->group(function () {

    // Start Route Ville ::::::::::::::::::::::::::::::::
    Route::get('/villes', [VilleController::class, 'index'])->name('villes.index');
    Route::post('/villes', [VilleController::class, 'store'])->name('villes.store');
    Route::get('/villes/edit/{id}', [VilleController::class, 'edit'])->name('villes.edit');
    Route::put('/villes/update/{id}', [VilleController::class, 'update'])->name('villes.update');
    Route::delete('/villes/{id}', [VilleController::class, 'destroy'])->name('villes.destroy');
    // End Route Ville ::::::::::::::::::::::::::::::::
    
    // Start Route Zone ::::::::::::::::::::::::::::::::
    Route::get('/zones', [ZoneController::class, 'index'])->name('zones.index');
    Route::post('/zones', [ZoneController::class, 'store'])->name('zones.store');
    Route::get('/zones/edit/{id}', [ZoneController::class, 'edit'])->name('zones.edit');
    Route::put('/zones/update/{id}', [ZoneController::class, 'update'])->name('zones.update');
    Route::delete('/zones/{id}', [ZoneController::class, 'destroy'])->name('zones.destroy');
    // End Route Zone ::::::::::::::::::::::::::::::::
    
    // Start Route General ::::::::::::::::::::::::::::::::

    Route::get('/general', [GeneralConteroller::class, 'index'])->name('general.index');
    Route::put('/general/update/{id}', [GeneralConteroller::class, 'update'])->name('general.update');

    // Start Route General ::::::::::::::::::::::::::::::::
    // Start Route Admin ::::::::::::::::::::::::::::::::
    
    Route::get('/', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/{id}', [AdminController::class, 'show'])->name('admins.show');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');


Route::get('/clients', [AdminController::class, 'showClients'])->name('admins.showClients');
Route::get('/clients/t', [AdminController::class, 'test'])->name('admins.test');

});
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