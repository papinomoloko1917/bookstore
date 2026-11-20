<?php

use App\Services\CartService;
use Livewire\Attributes\Locked;
use Livewire\Component;

new class extends Component
{
    #[Locked]
    public int $productId;
    public ?string $icon = null;
    public ?string $action = null;

    public function addToCart(CartService $cartService): void
    {
        $cartService->add($this->productId);

        $this->dispatch('cart-updated');
    }

    public function removeToCart(CartService $cartService): void
    {
        $cartService->remove($this->productId);

        $this->dispatch('cart-updated');
    }
};
?>

<button
    {{ $attributes->class(['btn btn-neutral']) }}
    {{ $this->action === 'add' ? 'wire:click="addToCart"' : 'wire:click="removeToCart"' }}
>
    @if ($slots->has('default'))
        {{ $slot }}
    @elseif ($this->icon === 'plus')
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-5"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    @elseif ($icon === 'minus')
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-5"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
        </svg>
    @else
        Купить
    @endif
</button>
