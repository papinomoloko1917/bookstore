<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/products', 'pages::product.index')->name('product.index');
Route::livewire('/{id}/product', 'pages::product.show')->name('product.show');

Route::livewire('/register', 'pages::auth.register')->name('auth.register');
