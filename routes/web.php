<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Register;
use App\Livewire\Login;

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
