<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Create extends Component
{
    use WithFileUploads;

    public UserForm $form;

    public function render()
    {
        return view('livewire.admin.users.create');
    }

    public function save()
    {
        $save = $this->form->store();
        if ($save) {
            Toaster::success('User created successfully');
            $this->redirect("/admin/users", navigate: true);
        } else{
            Toaster::error('Something went wrong');
        }
    }
}
