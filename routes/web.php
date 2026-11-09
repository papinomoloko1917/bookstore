<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/books', 'pages::books.index')->name('books.index');
