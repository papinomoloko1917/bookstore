<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/products', 'pages::product.index')->name('product.index');

Route::livewire('/register', 'pages::auth.register')->name('auth.register');
