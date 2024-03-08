<div>
    @guest
        <livewire:components.header></livewire:components.header>
    @endguest
    <div class="{{ Auth::check() ? '' : 'container mx-auto px-4 mt-5' }}">
        <div class="flex justify-end">
            <label class="input input-bordered flex items-center input-sm mb-4 w-96">
                <span class="material-symbols-outlined">search</span>
                <input type="text" class="grow" placeholder="Type to search..."
                    wire:model.live.debounce.500ms="search" />
                @error('form.name')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <div class="grid grid-cols-4 gap-2">
            @foreach ($books as $book)
                <div class="card card-compact w-full bg-base-200 shadow-xl rounded">
                    <figure>
                        <img src="{{ $book->imageUrl ?? 'https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg' }}"
                            alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title"><a href="{{ route('front.books.details', ['book' => $book->uuid]) }}"
                                wire:navigate>{{ $book->name }}</a></h2>
                        <p>{{ $book->description }}</p>
                        <p><b>${{ $book->price }}</b></p>
                        @if (Auth::check())
                            <div class="card-actions justify-between">
                                <a class="btn btn-ghost btn-sm rounded-full justify-start" wire:navigate
                                    href="{{ route('front.books.details', ['book' => $book->uuid]) }}">
                                    Read More
                                </a>
                                <button class="btn btn-ghost btn-sm rounded-full"
                                    wire:click="handleFavourite('{{ $book->uuid }}')">
                                    <span
                                        class="material-symbols-outlined {{ $book->isFavourite ? 'text-red-600' : '' }}">
                                        favorite
                                    </span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex w-full justify-center mt-4 mb-4">
            <button class="btn btn-primary rounded" wire:click="loadmore">Load more</button>
        </div>
    </div>
</div>
