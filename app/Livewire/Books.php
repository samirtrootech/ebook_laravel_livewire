<?php

namespace App\Livewire;

use App\Models\Books as ModelsBooks;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

class Books extends Component
{
    public int $limit = 8;

    public string $search = '';
    public function render()
    {
        if (Auth::check()) {
            $books = ModelsBooks::filter($this->search)->orderBy("created_at", 'desc')->paginate($this->limit)->map(function (ModelsBooks $book) {
                $book->isFavourite = false;
                if ($book->users->isNotEmpty()) {
                    $data = $book->users->filter(function (User $user) {
                        return $user->uuid === Auth::user()->uuid;
                    });
                    if ($data->isNotEmpty()) {
                        $book->isFavourite = true;
                    }
                }
                return $book;
            });
        } else {
            $books = ModelsBooks::filter($this->search)->orderBy("created_at", 'desc')->paginate($this->limit);
        }
        return view('livewire.books')->withBooks($books);
    }

    public function loadmore()
    {
        $this->limit += $this->limit;
    }

    public function handleFavourite($bookId)
    {
        try {
            Auth::user()->books()->attach($bookId);
            Toaster::success('Book marked as favourite');
        } catch (\Throwable $th) {
            Toaster::error('Something went wrong');
        }
    }
}
