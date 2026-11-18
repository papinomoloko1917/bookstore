<?php

use App\Models\Product;
use App\Services\CartService;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public int $id;

    #[Computed]
    public function product(): Product
    {
        return Product::findOrFail($this->id);
    }

    public function addToCart(CartService $cartService, int $productId): void
    {
        $cartService->add($productId);
    }
};
?>

<div>
    <x-breadcrumbs :product="$this->product" />
    <div class="hero bg-base-200 pt-5">
        <div class="hero-content flex-col lg:flex-row">
            <img
                alt="{{ $this->product->title }}"
                src="{{ $this->product->image }}"
                class="max-w-sm rounded-lg shadow-2xl"
            />
            <div>
                <h1 class="text-5xl font-bold">{{ $this->product->title }}</h1>
                <p class="py-6">
                    {{ $this->product->description }}
                </p>
                <button class="btn btn-primary" wire:click="addToCart({{ $this->product->id }})">Купить</button>
            </div>
        </div>
    </div>
</div>
