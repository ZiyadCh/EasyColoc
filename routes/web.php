<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtController;
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
Route::get('quitter/{id}', [ColocationController::class,'leaveColocation'])->name('leave');
Route::delete('/colocation/{id}', [ColocationController::class, 'destroy'])->name('destroy');
Route::get('/colocation/cancel/{id}', [ColocationController::class, 'cancel'])->name('cancel');

//categorie
Route::get('categorie/form/{id}', [CategorieController::class,'index'])->name('categories');
Route::post('categorie/add/{id}', [CategorieController::class,'addCategorie'])->name('addCat');
Route::delete('categorie/delete/{id}', [CategorieController::class,'destroy'])->name('deleteCat');

//expense
Route::get('expense/form/{col_id}', [ExpenceController::class,'index']);
Route::post('expense/{id}', [ExpenceController::class,'addExpence'])->name('addExp');
Route::get('colocation/expense/list/{id}', [ExpenceController::class,'list']);
Route::post('expense/month/{id}', [ExpenceController::class,'filter'])->name('filter');

//admin
Route::post('bannUser/{id}', [AdminController::class,'bannUser'])->name('bannUser');
Route::get('activateUser/{id}', [AdminController::class,'activateUser'])->name('activateUser');
Route::get('transfer-owner/{current_owner_id}', [AdminController::class,'transfer'])->name('transfer-owner');
Route::post('transfer-owner/confirm/{id}/{oldOwner}', [AdminController::class,'newOwner'])->name('finirTransfer');

//owner
Route::post('retirerUser/{id}', [OwnerController::class,'retirerUser'])->middleware(CheckUserIsOwner::class)->name('retirerUser');
//email & invitation
Route::post('invite/{id}', [InvitationController::class,'sendInvitation'])->name('invite');
Route::get('join/{token}', [InvitationController::class,'joinColocation'])->name('accept');
//debts
Route::get('debts/{id}', [DebtController::class,'showDebts'])->name('debts');
Route::post('debts/payed/{id}', [DebtController::class,'markedAsPaid'])->name('debt.settle');

require __DIR__ . '/auth.php';
