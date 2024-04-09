<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ParametresController;
use App\Http\Controllers\RouteurController;
use App\Http\Controllers\StaffController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('dashboard', [DashboardController::class, 'index'])->name('index');

Route::get('liste-routeur', [RouteurController::class, 'index'])->name('liste-routeur');

Route::get('liste-staff', [StaffController::class, 'index'])->name('liste-staff');

Route::get('liste-region', [LocationController::class, 'index'])->name('liste-region');

Route::get('liste-site', [LocationController::class, 'indexSite'])->name('liste-site');

Route::get('liste-equipement', [EquipementController::class, 'index'])->name('liste-equipement');
Route::get('creation-equipement', [EquipementController::class, 'createquipement'])->name('create-equipement');
Route::post('creation-equipements', [EquipementController::class, 'create'])->name('creation-equipements');
Route::get('modifier-{item}', [EquipementController::class, 'store'])->name('afficher-modification');
Route::get('modifiers-{item}', [EquipementController::class, 'update'])->name('modifier-equipements');

Route::get('liste-operation', [EquipementController::class, 'indexOperation'])->name('liste-operation');

Route::get('liste-parametres', [ParametresController::class, 'index'])->name('liste-parametres');

