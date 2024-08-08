<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('login');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
