<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ForgotPassword extends Component
{

    #[Validate('required|email')]
    public string $email;

    public bool $loading = false;

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function sendResetLink()
    {
        $this->validate();
        $this->loading = true;

        $user = User::whereEmail($this->email)->first();
        if (!$user) {
            Toaster::error('User not found');
            $this->loading = false;
        } else {
            $status = Password::sendResetLink(
                ['email' => $user->email]
            );
            if($status) {
                Toaster::success('Reset link has been sent to you email');
                $this->redirect("/login", navigate:true);
            }
            else{
                $this->loading = false;
                Toaster::error('Something went wrong');
            }
        }
    }
}
