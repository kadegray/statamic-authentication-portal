<?php

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Dashboard;

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth:portal')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
