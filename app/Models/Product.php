<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'price', 'image', 'quantity', 'hit', 'category'])]
class Product extends Model
{
    //
}
