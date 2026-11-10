<?php

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    #[Computed]
    public function products()
    {
        return Product::OrderBy('id')->paginate(6);
    }
};
?>

<div>
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-1 lg:grid-cols-3">
        @forelse ($this->products as $product)
            <livewire:product.card-product :product="$product" :key="'product' . $product->id" />
        @empty
            <span>Пусто...</span>
        @endforelse
    </div>
    <div class="pt-5">
        {{ $this->products->links() }}
    </div>
</div>
