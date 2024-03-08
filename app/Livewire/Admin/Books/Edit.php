<?php

namespace App\Livewire\Admin\Books;

use App\Livewire\Forms\BookForm;
use App\Models\Books;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    use WithFileUploads;

    public BookForm $form;

    public  $book;

    public function render()
    {
        return view('livewire.admin.books.edit');
    }

    public function mount(Books $book)
    {
        if ($book) {
            $this->form->name = $book->name;
            $this->form->price = $book->price;
            $this->form->description = $book->description;
            $this->form->image = $book->imageUrl;
            $this->form->cover = $book->coverUrl;
        }
        $this->book = $book;
    }
    public function save()
    {
        $save = $this->form->store($this->book);
        if ($save) {
            Toaster::success('Book updated successfully');
            $this->redirect("/admin/books", navigate: true);
        } else{
            Toaster::error('Something went wrong.');
        }
    }
}
