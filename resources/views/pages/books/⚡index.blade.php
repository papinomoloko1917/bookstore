<?php

use App\Models\Book;
use Livewire\Component;

new class extends Component
{
    public $books;

    public function mount()
    {
        $this->books = Book::OrderBy('id')->get();
    }
};
?>

<div>
    <ul>
        @forelse ($books as $book)
            <li>{{ $book->title }}</li>
        @empty
            <span>Пусто...</span>
        @endforelse
    </ul>
</div>
