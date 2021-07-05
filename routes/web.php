<?php

use App\Http\Controllers\{
    AnimalController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::any('/animals/search', [AnimalController::class, 'search'])->name('animals.search');
    Route::get('/animals/changeStatus/{id}', [AnimalController::class, 'changeStatus'])->name('animals.changeStatus');
    Route::put('/animals/update/{id}', [AnimalController::class, 'update'])->name('animals.update');
    Route::get('/animals/edit/{id}', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::post('/animals/store', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';