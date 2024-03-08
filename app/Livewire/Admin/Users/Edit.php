<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    use WithFileUploads;

    public UserForm $form;

    public  $user;

    public function render()
    {
        return view('livewire.admin.users.edit');
    }

    public function mount(User $user)
    {
        // dd(request()->route());
        if ($user) {
            $this->form->firstName = $user->firstName;
            $this->form->lastName = $user->lastName;
            $this->form->email = $user->email;
            $this->form->profileImage = $user->profileImageUrl;
        }
        $this->user = $user;
    }

    public function save()
    {
        $save = $this->form->store($this->user);
        if ($save) {
            Toaster::success('User upadted successfully');
            $this->redirect("/admin/users", navigate: true);
        } else {
            Toaster::error('Something went wrong.');
        }
    }
}
