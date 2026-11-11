<?php

use Livewire\Component;

new class extends Component {
    public bool $showSearch = false;
};
?>

<div>
    <input x-ref="searchInput" type="text" placeholder="Поиск" class="input w-24 md:w-auto" wire:show="showSearch"
        wire:cloak x-on:input.debounce.300ms="$dispatch('product-search', { query: $event.target.value })" />

    <button type="button" x-on:click="$wire.showSearch = true;
    $nextTick(() => $refs.searchInput.focus());"
        class="btn btn-ghost btn-circle" wire:show="!showSearch">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-search preview-icon">
            <path d="m21 21-4.34-4.34" />
            <circle cx="11" cy="11" r="8" />
        </svg>
    </button>
    <button type="button" class="btn btn-ghost btn-circle"
        x-on:click="
            $wire.showSearch = false;
            $refs.searchInput.value = '';
            $dispatch('close-search');
        "
        wire:show="showSearch">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-search-x preview-icon">
            <path d="m13.5 8.5-5 5" />
            <path d="m8.5 8.5 5 5" />
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.3-4.3" />
        </svg>
    </button>
</div>
