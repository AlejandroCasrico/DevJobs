<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteControler;
use App\Http\Controllers\Home;
use App\Http\Controllers\CandidatoController;
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

Route::get('/',Home::class)->name('home');

Route::get('/candidatos/{vacante}',[CandidatoController::class, 'index'])->name('candidatos.index');
Route::get('/dashboard',[VacanteControler::class,'index'])->middleware(['auth', 'verified'])->name('vacantes.index');
Route::get('/dashboard/create',[VacanteControler::class,'create'])->middleware(['auth', 'verified'])->name('vacantes.create');

Route::get('/dashboard/{vacante}/edit',[VacanteControler::class,'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/dashboard/{vacante}',[VacanteControler::class,'show'])->name('vacantes.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';