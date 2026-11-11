<?php
use App\Models\Product;

use Livewire\Component;

new class extends Component {
    //
};
?>

@php
    /** @var Product $product */
@endphp

<div class="breadcrumbs text-sm">
    <ul>
        <li><a href="{{ route('product.index') }}" wire:navigate>Главная</a></li>
        <li>{{ $product->title }}</li>
    </ul>
</div>
