<?php
    use App\Models\Product;
    use Illuminate\Support\Number;
    use Illuminate\Support\Str;
?>

@php
    /** @var Product $product */
@endphp

<div class="card lg:card-side bg-base-100 shadow-sm">
    <figure class="w-full shrink-0 lg:w-1/2">
        <a href="{{ route('product.show', $product->id) }}" wire:navigate>
            <img
                src="{{ $product->image }}"
                alt="{{ $product->title }}"
                class="h-full w-full overflow-hidden object-cover transition-transform duration-300 ease-in-out hover:scale-103"
            />
        </a>
    </figure>

    <div class="card-body">
        <a href="{{ route('product.show', $product->id) }}" class="card-title" wire:navigate>{{ $product->title }}
            @if ($product->hit)
                <div class="badge badge-xs badge-secondary">Хит</div>
            @endif
        </a>

        <p>{{ Str::limit($product->description) }}</p>
        <div class="card-actions mt-4 flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-lg font-semibold">
                    {{ number_format($product->price, 0, ' ,', ' ') }} ₽
                </span>
                <span class="text-xs text-gray-500"> {{ $product->quantity }}шт. </span>
            </div>

            <livewire:product.add-to-cart-button :productId="$product->id" size="sm" action="add" />
        </div>
    </div>
</div>
