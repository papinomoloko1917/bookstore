<?php
use Illuminate\Support\Number;
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
        <a href="{{ route('product.show', $product->id) }}" class="card-title" wire:navigate>{{ $product->title }}
            @if ($product->hit)
                <div class="badge badge-xs badge-secondary">Хит</div>
            @endif
        </a>

        <p>{{ Str::limit($product->description) }}</p>
        <div class="card-actions flex items-center justify-between mt-4">
            <div class="flex flex-col">
                <span class="text-lg font-semibold">
                    {{ number_format($product->price, 0, ',', ' ') }} ₽
                </span>
                <span class="text-gray-500 text-xs">
                    {{ $product->quantity }}шт.
                </span>
            </div>


            <button class="btn btn-neutral btn-sm">
                Купить
            </button>
        </div>
    </div>
</div>
