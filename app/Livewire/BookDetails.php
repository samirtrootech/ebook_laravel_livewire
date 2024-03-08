<?php

namespace App\Livewire;

use App\Models\Books;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class BookDetails extends Component
{
    public $book;
    public function render()
    {
        return view('livewire.book-details');
    }

    public function mount(Books $book)
    {
        $book->isFavourite = false;
        if ($book->users->isNotEmpty()) {
            $usersArr = $book->users()->pluck('uuid')->toArray();
            if (in_array(Auth::user()->uuid, $usersArr)) {
                $book->isFavourite = true;
            }
        }
        $this->book = $book;
    }
    public function makeFavourite($bookId)
    {
        try {
            Auth::user()->books()->attach($bookId);
            $this->book->isFavourite = true;
            Toaster::success('Book marked as favourite');
        } catch (\Throwable $th) {
            Toaster::error('Something went wrong');
        }
    }
    public function removeFavourite($bookId)
    {
        try {
            Auth::user()->books()->detach($bookId);
            $this->book->isFavourite = false;
            Toaster::success('Book removed from favourite');
        } catch (\Throwable $th) {
            Toaster::error('Something went wrong');
        }
    }
}
