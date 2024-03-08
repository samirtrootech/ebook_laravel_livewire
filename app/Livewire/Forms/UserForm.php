<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate]
    public $profileImage;
    public string $firstName;
    public string $lastName;
    public string $email;


    public function rules()
    {
        if (request()->route()->getName() === 'admin.users.create') {
            return [
                'profileImage' => 'required|image|max:1024',
                'firstName' => 'required|max:100',
                'lastName' => 'required|max:100',
                'email' => 'required|email|unique:users',
            ];
        } else {
            return [
                'firstName' => 'required|max:100',
                'lastName' => 'required|max:100',
                'email' => 'required|email',
            ];
        }
    }


    public function store(User $user = null): User | null
    {
        $this->validate();
        try {
            DB::beginTransaction();
            $imageName = $this->profileImage instanceof TemporaryUploadedFile ? $this->profileImage->getClientOriginalName() : $user->name;

            $data = [
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'email' => $this->email,
                'profileImage' => $imageName
            ];

            if ($user) {
                $user->update($data);
            } else {
                $user = User::create($data);
            }

            if ($this->profileImage instanceof TemporaryUploadedFile) $this->profileImage->storeAs(path: "public/images/$user->uuid", name: $imageName);

            DB::commit();

            return $user;
        } catch (\Exception $th) {
            DB::rollBack();
            return null;
        }
    }
}
