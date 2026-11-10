@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination">
        <div class="join">
            {{-- Назад --}}
            <button type="button" class="join-item btn" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                wire:loading.attr="disabled" @disabled($paginator->onFirstPage())>
                «
            </button>

            {{-- Номера страниц --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <button type="button" class="join-item btn btn-disabled" disabled>
                        {{ $element }}
                    </button>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <button type="button" wire:key="page-{{ $paginator->getPageName() }}-{{ $page }}"
                            wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            class="join-item btn {{ $page == $paginator->currentPage() ? 'btn-active' : '' }}"
                            @if ($page == $paginator->currentPage()) aria-current="page" @endif>
                            {{ $page }}
                        </button>
                    @endforeach
                @endif
            @endforeach

            {{-- Вперёд --}}
            <button type="button" class="join-item btn" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                wire:loading.attr="disabled" @disabled(!$paginator->hasMorePages())>
                »
            </button>
        </div>
    </nav>
@endif
