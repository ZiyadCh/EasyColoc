<?php

use App\Http\Controllers\AdminController;
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
//colocation
Route::post('newColoc/',[ColocationController::class,'newColoc'])->name('newColoc');
Route::view('colocForm', 'coloc-form');
Route::get('colocation/{id}',[ColocationController::class,'colocDetails'])->name('colocDetails');

//expense
Route::get('expense/form/{col_id}',[ExpenceController::class,'index']);
Route::post('expense/{id}',[ExpenceController::class,'addExpence'])->name('addExp');
Route::get('colocation/expense/list/{id}',[ExpenceController::class,'list']);

//admin
Route::post('bannUser/{id}',[AdminController::class,'bannUser'])->name('bannUser');
Route::get('transfer-owner/{current_owner_id}',[AdminController::class,'transfer'])->name('transfer-owner');





require __DIR__.'/auth.php';
