<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-1">
        <a href="{{ route('product.index') }}" class="select-none text-3xl font-bold"
            wire:navigate>{{ config('app.name') }}
        </a>
    </div>
    <div class="flex-none flex items-center gap-2">

        @if (request()->routeIs('product.index'))
            <livewire:header.search />
        @endif

        <div class="dropdown dropdown-end">
            <livewire:header.cart-counter/>
        </div>
        <livewire:header.auth />
    </div>
</div>
