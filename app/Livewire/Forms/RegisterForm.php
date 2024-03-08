<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate]
    public $profileImage;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;
    public string $password_confirmation;


    public function rules()
    {
        return [
            'profileImage' => 'required|image|max:1024',
            'firstName' => 'required|max:100',
            'lastName' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ];
    }


    public function store(): User | null
    {
        $this->validate();
        try {
            DB::beginTransaction();
            $imageName = $this->profileImage instanceof TemporaryUploadedFile ? $this->profileImage->getClientOriginalName() : '';

            $data = [
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'email' => $this->email,
                'profileImage' => $imageName,
                'password' => Hash::make($this->password),
            ];

            $user = User::create($data);

            if ($this->profileImage instanceof TemporaryUploadedFile) $this->profileImage->storeAs(path: "public/images/$user->uuid", name: $imageName);

            DB::commit();

            return $user;
        } catch (\Exception $th) {
            DB::rollBack();
            return null;
        }
    }
}
