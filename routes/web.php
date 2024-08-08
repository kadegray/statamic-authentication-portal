<?php

use App\Livewire\Login;
use Illuminate\Support\Facades\Route;

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/login', Login::class)->name('login');
