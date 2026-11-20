<?php

use App\Services\CartService;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public $products;

    public function mount(CartService $cartService)
    {
        $this->products = $cartService->getItems();
    }
};
?>

<div>
    <ul class="list bg-base-100 rounded-box shadow-md">
        @forelse ($this->products as $item)
            @php
                $quantity = $item['quantityInCart'];

                $product = $item['product'];
            @endphp

            <li class="p-4 pb-2 text-xs tracking-wide opacity-60">#{{ $product->sku }}</li>

            <li class="list-row">
                <div>
                    <img class="rounded-box size-10" alt="Tailwind CSS list item" src="{{ $product->image }}" />
                </div>
                <div>
                    <div>{{ $product->title }}</div>
                    <div class="text-xs font-semibold opacity-60">{{ $product->price }}₽</div>
                </div>
                <div>
                    <livewire:product.add-to-cart-button
                        :product-id="$product->id"
                        class="btn-square btn-ghost btn-sm"
                        icon="minus"
                        action="remove"
                    />

                    <button class="btn btn-square btn-ghost btn-sm">{{ $quantity }}</button>

                    <livewire:product.add-to-cart-button
                        :product-id="$product->id"
                        class="btn-square btn-ghost btn-sm"
                        icon="plus"
                        action="add"
                    />
                </div>
            </li>
        @empty
            <span>Пусто...</span>
        @endforelse
    </ul>
</div>
