<?php

namespace App\Observers;

use App\Models\Roles;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserObserver
{
    /**
     * Handle the user "created" event.
     */
    public function creating(user $user): void
    {
        $user->uuid = Str::uuid();
        $user->role_id = $user->role_id ??= Roles::where('name', 'user')->first()->id;
        $user->password = $user->password ??= Hash::make('password');
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(user $user): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(user $user): void
    {
        //
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(user $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(user $user): void
    {
        //
    }
}
