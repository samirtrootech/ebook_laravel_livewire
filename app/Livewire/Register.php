<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisterForm;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Register extends Component
{
    use WithFileUploads;

    public RegisterForm $form;
    public function render()
    {
        return view('livewire.register');
    }

    public function save()
    {
        $save = $this->form->store();
        if ($save) {
            Toaster::success("User register successfully.");
            $this->redirect("/login", navigate: true);
        } else {
            Toaster::error("Something went wrong.");
        }
    }
}
