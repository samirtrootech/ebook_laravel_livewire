<?php

namespace App\Livewire\Auth;

use App\Models\PasswordResetTokens;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;
use Masmerise\Toaster\Toaster;

class ResetPassword extends Component
{
    #[Validate('required|min:8|confirmed')]
    public string $password;

    #[Validate('required')]
    public string $password_confirmation;

    #[Validate('required')]
    public string $token;

    #[Validate('required')]
    public string $email;

    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function mount($token)
    {
        // dd($token);
        // Toaster::success('User created!');
        // toast()
        //     ->success('You earned a cookie! 🍪')
        //     ->duration(3000)
        //     ->push();
        $this->token = $token;
        // dd(Hash::check($this->token, '$2y$12$M1mxNQP04bbFS3nfoA/xbuvcnNbRlMTFxKKzPxTS9U1T8pNpodAaW'));
        $this->email = request()->get('email');
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            ["email" => $this->email, "password" => $this->password, "token" => $this->token],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            Toaster::success('Password has been reset successfully');
            $this->redirect('/login');
        } else {
            Toaster::error('The link has been expired or it is used.');
        }
    }
}
