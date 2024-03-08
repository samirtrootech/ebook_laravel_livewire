<?php

namespace App\Livewire\Admin\Books;

use App\Models\Books as ModelsBooks;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Index extends Component
{

    use WithPagination, WithoutUrlPagination;

    protected string $paginationTheme = 'tailwind';

    public bool $isEditModalOpen = false;

    public string $search = '';

    public function render()
    {
        $books = ModelsBooks::filter($this->search)->orderBy("created_at", 'desc')->paginate(10);
        return view('livewire.admin.books.index')->withBooks($books);
    }

    public function handleEditModalOpen()
    {
        $this->isEditModalOpen = true;
    }
    public function delete($bookId) {
        $book = ModelsBooks::find($bookId);
        if($book) {
            $book->delete();
            Toaster::success("Book Deleted successfully");
        } else{
            Toaster::error("Book counld not be found");
        }
    }
}
