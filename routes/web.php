<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenceController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckUserIsActive;
use App\Http\Middleware\CheckUserIsOwner;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'user'])->middleware(['auth', 'verified',CheckUserIsActive::class])->name('dashboard');

Route::get('/admin', [DashboardController::class,'admin'])->name('AdminDashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//colocation
Route::post('newColoc/', [ColocationController::class,'newColoc'])->name('newColoc');
Route::view('colocForm', 'coloc-form');
Route::get('colocation/{id}', [ColocationController::class,'colocDetails'])->name('colocDetails');

//expense
Route::get('expense/form/{col_id}', [ExpenceController::class,'index']);
Route::post('expense/{id}', [ExpenceController::class,'addExpence'])->name('addExp');
Route::get('colocation/expense/list/{id}', [ExpenceController::class,'list']);

//admin
Route::post('bannUser/{id}', [AdminController::class,'bannUser'])->name('bannUser');
Route::get('activateUser/{id}', [AdminController::class,'activateUser'])->name('activateUser');
Route::get('transfer-owner/{current_owner_id}', [AdminController::class,'transfer'])->name('transfer-owner');
Route::post('transfer-owner/confirm/{id}/{oldOwner}', [AdminController::class,'newOwner'])->name('finirTransfer');

//owner
Route::post('retirerUser/{id}', [OwnerController::class,'retirerUser'])->middleware(CheckUserIsOwner::class)->name('retirerUser');
//email
Route::post('invite/{id}', [InvitationController::class,'sendInvitation'])->name('invite');

require __DIR__ . '/auth.php';
