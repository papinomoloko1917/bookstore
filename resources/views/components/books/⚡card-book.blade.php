<?php

use Livewire\Component;
use Illuminate\Support\Str;

new class extends Component {
    //
};
?>

<div class="card lg:card-side bg-base-100 shadow-sm">
    <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.webp" alt="Album"
            class="object-cover w-full h-full" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $book->title }}</h2>
        <p>{{ Str::limit($book->description) }}</p>
        <div class="card-actions justify-end">
            <button class="btn btn-primary">Купить</button>
        </div>
    </div>
</div>
