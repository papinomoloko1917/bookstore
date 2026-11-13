<?php
use App\Models\Product;
use Illuminate\Support\Str;
?>

@php
    /** @var Product $product */
@endphp

<div class="card lg:card-side bg-base-100 shadow-sm">

    <figure class="shrink-0 w-full lg:w-1/2">
        <a href="{{ route('product.show', $product->id) }}" wire:navigate>
            <img src="{{ $product->image }}" alt="{{ $product->title }}"
                class="object-cover w-full h-full hover:scale-103 duration-300 transition-transform ease-in-out overflow-hidden" />
        </a>
    </figure>


    <div class="card-body">
        <a href="{{ route('product.show', $product->id) }}" class="card-title" wire:navigate>{{ $product->title }}</a>
        <p>{{ Str::limit($product->description) }}</p>
        <div class="card-actions justify-end">
            <button class="btn btn-neutral btn-sm">Купить</button>
        </div>
    </div>
</div>
