<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ExpenceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('newColoc/',[ColocationController::class,'newColoc'])->name('newColoc');
Route::view('colocForm', 'coloc-form');
Route::get('colocation/{id}',[ColocationController::class,'colocDetails'])->name('colocDetails');
Route::get('expense/form/{col_id}',[ExpenceController::class,'index']);
Route::post('expense/{id}',[ExpenceController::class,'addExpence'])->name('addExp');



require __DIR__.'/auth.php';
