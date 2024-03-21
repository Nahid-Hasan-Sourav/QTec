<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Notes\NotesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/notes', [NotesController::class, 'index'])->name('notes');
    Route::get('/get/note', [NotesController::class, 'getAllNote'])->name('notes.getAll');

    Route::post('/note/store', [NotesController::class, 'store'])->name('notes.store');
    Route::get('/note/edit/{id}', [NotesController::class, 'edit'])->name('notes.edit');
    Route::post('/note/update', [NotesController::class, 'update'])->name('notes.update');
    Route::get('/note/delete/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');






});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
