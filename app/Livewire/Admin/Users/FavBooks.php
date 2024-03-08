<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class FavBooks extends Component
{

    public  $user;
    public  $search = '';

    public function render()
    {
		$books = $this->user->books()->filter($this->search)->orderBy("created_at", 'desc')->get();
        return view('livewire.admin.users.fav-books')->withBooks($books);
    }

	public function mount(User $user)
    {
        $this->user = $user;
    }
}
