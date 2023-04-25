<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class BooksForm extends Component
{

    use WithFileUploads;

    public $book, $photo;

    protected $rules = [
        "book.title" => "required|string|min:4|max:255",
        "book.author" => "required|string|min:4|max:255",
        "book.genre" => "required|string",
        "book.description" => "nullable|string",
        "book.price" => "nullable|integer",
        "book.stars" => "nullable|integer",
        "book.stocks" => "nullable|integer",
        "photo" => "nullable|file",
    ];

    public function submit()
    {
        $this->validate();

        if ($this->photo) {
            $fileName = $this->photo->storePublicly('uploads/books/'.$this->book->slug);
            $this->book->image = $fileName;
        }

        $this->book->save();

        $this->emitUp('updateParent');

        auth("admin")->user()->createActivity("Updated '" . $this->book->title . "' book.");
    }

    public function delete() {
        $this->emit("deleteBook");
    }

    public function render()
    {
        return view('pages.admin.books.form');
    }
}
