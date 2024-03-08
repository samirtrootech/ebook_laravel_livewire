<?php

namespace App\Observers;

use App\Models\books;
use Illuminate\Support\Str;

class BooksObserver
{
    /**
     * Handle the books "created" event.
     */
    public function creating(books $books): void
    {
        $books->uuid = Str::uuid();
    }

    /**
     * Handle the books "updated" event.
     */
    public function updated(books $books): void
    {
        //
    }

    /**
     * Handle the books "deleted" event.
     */
    public function deleted(books $books): void
    {
        //
    }

    /**
     * Handle the books "restored" event.
     */
    public function restored(books $books): void
    {
        //
    }

    /**
     * Handle the books "force deleted" event.
     */
    public function forceDeleted(books $books): void
    {
        //
    }
}
