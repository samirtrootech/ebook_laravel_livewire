<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

class Favourites extends Component
{
    public int $limit = 8;
    public function render()
    {
        $books = Auth::user()->books()->orderBy("created_at", 'desc')->paginate($this->limit);
        return view('livewire.favourites')->withBooks($books);
    }

    public function loadmore()
    {
        $this->limit += $this->limit;
    }

    public function handleFavourite($bookId)
    {
        try {
            Auth::user()->books()->detach($bookId);
            Toaster::success('Book removed from favourite');
        } catch (\Throwable $th) {
            Toaster::error('Something went wrong');
        }
    }
}
