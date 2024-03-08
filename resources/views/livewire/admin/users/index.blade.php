<div>
  <x-page-header :header="'Books'">
    <a class="btn btn-primary btn-sm rounded" href="/admin/users/create" wire:navigate>
      <span class="material-symbols-outlined text-lg">add</span>
      Add New
    </a>
  </x-page-header>
  <div class="overflow-x-auto">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>
              <div class="flex items-center gap-3">
                <x-avatar src="{{ $user->profileImageUrl }}" alt="{{ $user->fullName }}" size="small" />
                <div>
                  <div class="font-bold">{{ $user->fullName }}</div>
                </div>
              </div>
            </td>
            <td class="">
              <p class="truncate w-96">{{ $user->email }}</p>
            </td>
            <td>
              @if ($user->status)
                <span class="rounded-full p-2 bg-green-200 text-green-600">Active</span>
              @else
                <span class="rounded-full p-2 bg-red-200 text-orange-600">Inactive</span>
              @endif
            </td>
            <th>
              <a class="btn btn-ghost btn-xs" data-tooltip="Favorite Books" href="{{ route('admin.users.fav.books', ['user' => $user->uuid]) }}"
                wire:navigate>
                <span class="material-symbols-outlined">favorite</span>
              </a>
              <a class="btn btn-ghost btn-xs" data-tooltip="Edit User" href="{{ route('admin.users.edit', ['user' => $user->uuid]) }}"
                wire:navigate>
                <span class="material-symbols-outlined">edit</span>
              </a>
              <button class="btn btn-ghost btn-xs" data-tooltip="Delete User" wire:click="delete('{{ $user->uuid }}')"
                wire:confirm="Are you sure you want to delete this user?">
                <span class="material-symbols-outlined">delete</span>
              </button>
            </th>
          </tr>
        @endforeach
        @if ($users->isEmpty())
          <tr>
            <td colspan="4" class="text-center">
              No users available
            </td>
          </tr>
        @endif
      </tbody>
    </table>
    <div class="mb-5">
      {{ $users->links() }}
    </div>
  </div>
</div>
