<?php
use Livewire\Attributes\Computed;
use App\Models\Product;

use Livewire\Component;

new class extends Component {
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
            <img alt="{{ $this->product->title }}" src="{{ $this->product->image }}"
                class="max-w-sm rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">{{ $this->product->title }}</h1>
                <p class="py-6">
                    {{ $this->product->description }}
                </p>
                <button class="btn btn-primary">Купить</button>
            </div>
        </div>
    </div>
</div>
