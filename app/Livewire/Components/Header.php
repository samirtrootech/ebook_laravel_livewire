<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.components.header');
    }

    public function logout(): void
    {
        if (Auth::check()) {
            Auth::logout();
            $this->redirect("/login", navigate: true);
        }
    }
}
