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

            <li class="p-4 pb-2 text-xs tracking-wide opacity-60">Test</li>

            <li class="list-row">
                <div>
                    <img
                        class="rounded-box size-10"
                        alt="Tailwind CSS list item"
                        src="https://img.daisyui.com/images/profile/demo/1@94.webp"
                    />
                </div>
                <div>
                    <div>{{ $product->title }}</div>
                    <div class="text-xs font-semibold uppercase opacity-60">Remaining Reason</div>
                </div>
                <button class="btn btn-square btn-ghost">
                    <span>{{ $quantity }}</span>
                </button>
                <button class="btn btn-square btn-ghost">
                    <svg
                        aria-label="Favorite"
                        class="size-[1.2em]"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                    >
                        <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2"
                            fill="none"
                            stroke="currentColor"
                        >
                            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                        </g>
                    </svg>
                </button>
            </li>
        @empty
            <span>Пусто...</span>
        @endforelse
    </ul>
</div>
