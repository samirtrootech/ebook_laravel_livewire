<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Login extends Component
{
    public LoginForm $form;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        if ($this->form->store()) {

            Toaster::success("Welcome " . Auth::user()->fullName);
            if (Auth::user()->role->name === 'admin') {
                $this->redirect("/admin/books", navigate: true);
            } else {
                $this->redirect("/", navigate: true);
            }
        } else {
            Toaster::error('Unauthenticated');
        }
    }
}
