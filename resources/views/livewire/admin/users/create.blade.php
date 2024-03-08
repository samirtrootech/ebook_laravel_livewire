<div>
  @php
    $previewImage = $form->profileImage ? $form->profileImage->temporaryUrl() : '';
  @endphp
  <x-page-header header="Create User">
    <a class="btn btn-default btn-sm rounded" href="/admin/users" wire:navigate>
      Discard
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
      <label class="input input-bordered flex items-center gap-2 col-span-2">
        <span class="material-symbols-outlined">mail</span>
        <input type="text" class="grow" placeholder="Email" wire:model="form.email" />
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
