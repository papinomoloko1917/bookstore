<?php

use Illuminate\Support\Str;
use Livewire\Component;

new class extends Component {
    //
};
?>

<div class="card lg:card-side bg-base-100 shadow-sm">
    <figure class="shrink-0 w-full lg:w-1/2">
        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="object-cover w-full h-full" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $product->title }}</h2>
        <p>{{ Str::limit($product->description) }}</p>
        <div class="card-actions justify-end">
            <button class="btn btn-primary">Купить</button>
        </div>
    </div>
</div>
