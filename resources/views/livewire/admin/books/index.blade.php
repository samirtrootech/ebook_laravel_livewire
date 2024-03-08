<div>
  <x-page-header :header="'Books'">
    <a class="btn btn-primary btn-sm rounded" href="/admin/books/create" wire:navigate>
      <span class="material-symbols-outlined text-lg">add</span>
      Add New
    </a>
  </x-page-header>
  <div class="overflow-x-auto">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Desc</th>
          <th>Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($books as $book)
          <tr>
            <td>
              <div class="flex items-center gap-3">
                <x-avatar src="{{ $book->imageUrl }}" alt="{{ $book->name }}" size="small" />
                <div>
                  <div class="font-bold">{{ $book->name }}</div>
                </div>
              </div>
            </td>
            <td class="">
              <p class="truncate w-96">{{ $book->description }}</p>
            </td>
            <td>{{ $book->price }}</td>
            <th>
              <a class="btn btn-ghost btn-xs" href="{{ route('admin.books.edit', ['book' => $book->uuid]) }}"
                wire:navigate>
                <span class="material-symbols-outlined">edit</span>
              </a>
              <button class="btn btn-ghost btn-xs" wire:click="delete('{{ $book->uuid }}')"
                wire:confirm="Are you sure you want to delete this book?">
                <span class="material-symbols-outlined">delete</span>
              </button>
            </th>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mb-5">
      {{ $books->links() }}
    </div>
  </div>
</div>
