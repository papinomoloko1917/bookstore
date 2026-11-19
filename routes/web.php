<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/products', 'pages::product.index')->name('product.index');
Route::livewire('/{id}/product', 'pages::product.show')->name('product.show');
Route::livewire('/product/cart', 'pages::product.cart')->name('product.cart');

Route::livewire('/register', 'pages::auth.register')->name('auth.register');
Route::livewire('/login', 'pages::auth.login')->name('auth.login');
