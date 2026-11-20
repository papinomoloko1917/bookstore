<?php

use App\Services\CartService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    #[On('cart-updated')]
    public function refreshCart(): void {}

    #[Computed]
    public function products()
    {
        return app(CartService::class)->getItems();
    }

    #[Computed]
    public function sum()
    {
        return app(CartService::class)->getTotal();
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
                    <div class="text-xs font-semibold opacity-60">
                        {{ number_format($product->price, 0, ' ,', ' ') }} ₽
                    </div>
                </div>
                <div>
                    <div class="text-center">
                        <span>{{ number_format($product->price * $quantity, 0, ' ,', ' ') }} ₽</span>
                    </div>
                    <livewire:product.add-to-cart-button
                        :product-id="$product->id"
                        class="btn-square btn-ghost btn-sm"
                        icon="minus"
                        action="remove"
                    />

                    <button class="btn btn-square btn-ghost btn-sm">{{ number_format($quantity, 0, ' ,', ' ') }}</button>

                    <livewire:product.add-to-cart-button
                        :product-id="$product->id"
                        class="btn-square btn-ghost btn-sm"
                        icon="plus"
                        action="add"
                    />
                </div>
            </li>
        @empty
            <span>Корзина пуста</span>
        @endforelse
    </ul>
    @if ($this->sum > 0)
        <div class="text-md mt-4 text-right font-semibold">
            <span> Сумма: <span>{{ number_format($this->sum, 0, ' ,', ' ') }} ₽</span> </span>
        </div>
    @endif
</div>
