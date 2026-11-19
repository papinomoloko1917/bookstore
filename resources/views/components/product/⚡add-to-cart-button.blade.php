<?php

use App\Services\CartService;
use Livewire\Attributes\Locked;
use Livewire\Component;

new class extends Component
{
    public string $size = 'md';

    #[Locked]
    public int $productId;

    public function addToCart(CartService $cartService): void
    {
        $cartService->add($this->productId);

        $this->dispatch('cart-updated');
    }
};
?>

<div>
    <button
        class="btn btn-neutral {{ $this->size === 'md' ? 'btn-md' : 'btn-sm' }}"
        wire:click="addToCart()"
    >Купить</button>
</div>
