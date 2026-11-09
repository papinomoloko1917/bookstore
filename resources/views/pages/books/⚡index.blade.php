<?php

use App\Models\Book;
use Livewire\Component;

new class extends Component {
    public $books;

    public function mount()
    {
        $this->books = Book::OrderBy('id')->get();
    }
};
?>

<div class="grid grid-cols-3 gap-8 sm:grid-cols-2 lg:grid-cols-3">
    @forelse ($books as $book)
        <livewire:books.card-book :book="$book" />
    @empty
        <span>Пусто...</span>
    @endforelse
</div>
