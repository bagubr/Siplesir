<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PermohonanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('authorized/google/callback', [RegisterController::class, 'handleGoogleCallback'])->name('google-auth-callback');
Route::get('authorized/google', [RegisterController::class, 'redirectToGoogle'])->name('google-auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('/permohonan-status/{permohonan}', [PermohonanController::class, 'status'])->name('permohonan.update.status');
    Route::get('/permohonan-selesai', [PermohonanController::class, 'selesai'])->name('permohonan.selesai');
    Route::resource('permohonan', PermohonanController::class);
    Route::resource('users', UserController::class);

    Route::get('/hakakses', [App\Http\Controllers\HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [App\Http\Controllers\HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [App\Http\Controllers\HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [App\Http\Controllers\HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');


});
