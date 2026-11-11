<?php
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

new class extends Component {
    use WithPagination;

    public string $search = '';

    #[On('product-search')]
    public function searchProducts(string $query): void
    {
        $this->search = $query;
        $this->resetPage();
    }

    #[On('close-search')]
    public function searchClose(): void
    {
        $this->search = '';
        $this->resetPage();
    }

    #[Computed]
    public function products(): LengthAwarePaginator
    {
        $search = trim($this->search);

        $query = Product::query();

        if ($search !== '') {
            $query->where('title', 'ilike', "%{$search}%")->orderByRaw('CASE WHEN title ILIKE ? THEN 0 ELSE 1 END', ["{$search}%"]);
        }

        return $query->orderBy('title')->paginate(6);
    }
};
?>

<div>
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-1 lg:grid-cols-3">
        @forelse ($this->products as $product)
            <x-product.card-product :product="$product" :key="'product' . $product->id" />
        @empty
            <span>Пусто...</span>
        @endforelse
    </div>
    <div class="pt-5">
        {{ $this->products->links('components.pagination.daisyui') }}
    </div>
</div>
