<div>
  <x-page-header header="Favourite Books">
    <a class="btn btn-default btn-sm rounded" href="/" wire:navigate>
      <span class="material-symbols-outlined text-lg">keyboard_backspace</span>
      Back
    </a>
  </x-page-header>
  <div class="grid grid-cols-4 gap-2">
    @foreach ($books as $book)
      <div class="card card-compact w-full bg-base-200 shadow-xl rounded">
        <figure>
          <img src="{{ $book->imageUrl ?? 'https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg' }}"
            alt="Shoes" />
        </figure>
        <div class="card-body">
          <h2 class="card-title"><a
              href="{{ route('front.books.details', ['book' => $book->uuid]) }}">{{ $book->name }}</a></h2>
          <p>{{ $book->description }}</p>
          <div class="card-actions justify-beetween">
            <a class="btn btn-ghost btn-sm rounded-full justify-start" wire:navigate
              href="{{ route('front.books.details', ['book' => $book->uuid]) }}">
              Read More
            </a>
            <button class="btn btn-ghost btn-sm rounded-full" wire:click="handleFavourite('{{ $book->uuid }}')">
              <span class="material-symbols-outlined text-red-600">
                favorite
              </span>
            </button>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  @if ($books->isEmpty())
    <p class="w-full text-center">No fabourites</p>
  @endif
  @if ($books->hasMorePages())
    <div class="flex w-full justify-center mt-4 mb-4">
      <button class="btn btn-primary rounded" wire:click="loadmore">Load more</button>
    </div>
  @endif
</div>
