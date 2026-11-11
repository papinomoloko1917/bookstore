<?php
use App\Models\Product;
use Illuminate\Support\Str;
?>

@php
    /** @var Product $product */
@endphp

<div class="card lg:card-side bg-base-100 shadow-sm">
    <figure class="shrink-0 w-full lg:w-1/2">
        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="object-cover w-full h-full" />
    </figure>
    <div class="card-body">
        <a href="{{ route('product.show', $product->id) }}"
            class="card-title hover:text-blue-600 transition-all duration-300" wire:navigate>{{ $product->title }}</a>
        <p>{{ Str::limit($product->description) }}</p>
        <div class="card-actions justify-end">
            <button class="btn btn-primary">Купить</button>
        </div>
    </div>
</div>
