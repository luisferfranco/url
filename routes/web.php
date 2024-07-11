<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Volt::route('/', 'dashboard')
  ->name('home');

Route::get('/g/{liga}', [\App\Http\Controllers\LigaController::class, 'show'])
  ->name('liga.show');

require __DIR__.'/auth.php';
