<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class UserProfile extends Component
{
    use WithFileUploads;

    public UserForm $form;

    public function render()
    {
        return view('livewire.user-profile');
    }

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $this->form->firstName = $user->firstName;
            $this->form->lastName = $user->lastName;
            $this->form->email = $user->email;
            $this->form->profileImage = $user->profileImageUrl;
        }
    }

    public function save()
    {
        $save = $this->form->store(Auth::user());
        if ($save) {
            Toaster::success('Profile updated successfully');
            // $this->redirect("/", navigate: true);
        } else {
            Toaster::success('Something went wrong.');
        }
    }
}
