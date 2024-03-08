<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Index extends Component
{

    use WithPagination, WithoutUrlPagination;

    protected string $paginationTheme = 'tailwind';

    public bool $isEditModalOpen = false;

    public function render()
    {
        $users = User::onlyUsers()->orderBy("created_at", 'desc')->paginate(10);
        return view('livewire.admin.users.index')->withUsers($users);
    }

    public function handleEditModalOpen()
    {
        $this->isEditModalOpen = true;
    }

    public function delete($userId) {
        $user = User::find($userId);
        if($user) {
            $user->delete();
            Toaster::success("User Deleted successfully");
        } else{
            Toaster::error("User counld not be found");
        }
    }
}
