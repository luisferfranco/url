<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Volt::route('/', 'dashboard');

require __DIR__.'/auth.php';
