<?php

use App\Models\Product;
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
                <livewire:product.add-to-cart-button :productId="$this->product->id" action="add" />
            </div>
        </div>
    </div>
</div>
