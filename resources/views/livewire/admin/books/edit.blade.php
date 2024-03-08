@php
  $previewImage =
      $form->image instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile
          ? $form->image->temporaryUrl()
          : $book->imageUrl;
  $previewCover =
      $form->cover instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile
          ? $form->cover->temporaryUrl()
          : $book->coverUrl;
@endphp
<div>
  <x-page-header header="Edit Book">
    <a class="btn btn-default btn-sm rounded" href="/admin/books" wire:navigate>
      Discard
    </a>
  </x-page-header>
  <form wire:submit="save" class="flex flex-col gap-4">
    <div class="grid grid-cols-2 gap-4">
      <div class="flex gap-4 items-center">
        <x-avatar src="{{ $previewImage }}" alt="Book" size="large" />
        <x-file-input name="form.image">Uplaod Image</x-file-input>
        @error('form.image')
          <span class="text-error">{{ $message }}</span>
        @enderror
      </div>
      <div class="flex gap-4 items-center">
        <x-avatar src="{{ $previewCover }}" alt="Cover" size="large" />
        <x-file-input name="form.cover">Uplaod Cover</x-file-input>
        @error('form.cover')
          <span class="text-error">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <label class="input input-bordered flex items-center gap-2">
        <span class="material-symbols-outlined">book_4</span>
        <input type="text" class="grow" placeholder="Book Name" wire:model="form.name" />
        @error('form.name')
          <span class="text-error">{{ $message }}</span>
        @enderror
      </label>
      <label class="input input-bordered flex items-center gap-2">
        <span class="material-symbols-outlined">attach_money</span>
        <input type="number" class="grow" placeholder="Book price" wire:model="form.price" />
        @error('form.price')
          <span class="text-error">{{ $message }}</span>
        @enderror
      </label>
      <textarea class="col-span-2 textarea textarea-bordered" placeholder="Books description" wire:model="form.description"></textarea>
      @error('form.description')
        <span class="text-error">{{ $message }}</span>
      @enderror
    </div>
    <div class="flex w-full justify-end">
      <button class="btn btn-primary btn-sm w-32 rounded">
        <span class="material-symbols-outlined text-lg">save</span>
        Save
      </button>
    </div>
  </form>
</div>
