<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Utils\BookGenres;
use Livewire\Component;

class BooksControlPage extends Component
{
    protected $listeners = ['updateParent' => '$refresh', 'deleteBook'];

    public $books;
    public $book;

    public function mount()
    {
        $this->refreshList();
    }

    public function switch ($id)
    {
        $this->reset(["book"]);
        if ($id > -1) {
            $this->book = Book::find($id);
        }
    }

    public function deleteBook() {
        $title = $this->book->title;
        $this->book->delete();
        $this->reset(["book"]);
        $this->refreshList();

        auth("admin")->user()->createActivity("Deleted '" . $title . "' book.");
    }

    public function create() {
        $user = auth("admin")->user();
        $newKey = count($this->books) + 1;
        $newBook = new Book();

        $newBook->fill([
            "title" => "New Book " . $newKey,
            "author" => fake()->name(),
            "genre" => BookGenres::Others,
            "description" => fake()->text(),
            "price" => fake()->numberBetween(10,30),
            "stocks" => fake()->numberBetween(5,500),
            "stars" => fake()->numberBetween(1,5),
        ]);

        $newBook->seller()->associate($user);
        $newBook->save();

        $this->refreshList();
        $this->switch($newBook->id);
        $user->createActivity("Created '" . $newBook->title . "' book.");
    }

    private function refreshList() {
        $this->books = Book::query()->orderBy("created_at", "desc")->get();
    }

    public function render()
    {
        return view('pages.admin.books.index')
            ->layout("layouts.admin", [
                "title" => "Books",
                "navTitle" => "Books",
                "selected" => 2
            ]);
    }
}
