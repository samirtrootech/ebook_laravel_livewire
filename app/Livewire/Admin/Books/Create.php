<?php

namespace App\Livewire\Admin\Books;

use App\Livewire\Forms\BookForm;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Create extends Component
{
    use WithFileUploads;

    public BookForm $form;

    public function render()
    {
        return view('livewire.admin.books.create');
    }

    public function save()
    {
        $save = $this->form->store();
        if ($save) {
            Toaster::success('Book created successfully');
            $this->redirect("/admin/books", navigate: true);
        } else{
            Toaster::error('Something went wrong');
        }
    }
}
