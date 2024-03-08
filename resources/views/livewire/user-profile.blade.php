<div>
  @php
    $previewImage =
        $form->profileImage instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile
            ? $form->profileImage->temporaryUrl()
            : Auth::user()->profileImageUrl;
    $isAdmin = Auth::user()->role->name === 'admin';
  @endphp
  <x-page-header header="Profile">
    <a class="btn btn-default btn-sm rounded" href="{{ $isAdmin ? '/admin/users' : '/' }}" wire:navigate>
      <span class="material-symbols-outlined text-lg">keyboard_backspace</span>
      Back
    </a>
  </x-page-header>
  <form wire:submit="save" class="flex flex-col gap-4">
    <div class="grid grid-cols-2 gap-4">
      <div class="flex gap-4 items-center">
        <x-avatar src="{{ $previewImage }}" alt="User" size="large" />
        <x-file-input name="form.profileImage">Uplaod Image</x-file-input>
        @error('form.profileImage')
          <span class="text-error">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <label class="input input-bordered flex items-center gap-2">
        <span class="material-symbols-outlined">person</span>
        <input type="text" class="grow" placeholder="First Name" wire:model="form.firstName" />
        @error('form.firstName')
          <span class="text-error">{{ $message }}</span>
        @enderror
      </label>
      <label class="input input-bordered flex items-center gap-2">
        <span class="material-symbols-outlined">person</span>
        <input type="text" class="grow" placeholder="Last Name" wire:model="form.lastName" />
        @error('form.lastName')
          <span class="text-error">{{ $message }}</span>
        @enderror
      </label>
      <label class="input input-bordered flex items-center gap-2 col-span-2 opacity-50">
        <span class="material-symbols-outlined">mail</span>
        <input type="text" class="grow" placeholder="Email" wire:model="form.email" disabled />
        @error('form.email')
          <span class="text-error">{{ $message }}</span>
        @enderror
      </label>
    </div>
    <div class="flex w-full justify-end">
      <button class="btn btn-primary btn-sm w-32 rounded">
        <span class="material-symbols-outlined text-lg">save</span>
        Save
      </button>
    </div>
  </form>
</div>
