<div class="{{ Auth::check() ? '' : 'container mx-auto px-4 mt-5' }}">
    @php
        $favFunction = $book->isFavourite ? "removeFavourite('$book->uuid')" : "makeFavourite('$book->uuid')";
    @endphp
    <x-page-header header="{{ $book->name }}">
        <button @class([
            'btn',
            'btn-default',
            'rounded',
            'btn-sm',
            'bg-red-200' => $book->isFavourite,
            'text-red-600' => $book->isFavourite,
        ]) wire:click="{{ $favFunction }}">
            <span class="material-symbols-outlined text-lg">favorite</span>
            {{ $book->isFavourite ? 'Remove Favourite' : 'Favourite' }}
        </button>
        <a class="btn btn-default rounded btn-sm" href="{{ route('front.books') }}" wire:navigate>
            <span class="material-symbols-outlined text-lg">keyboard_backspace</span>
            Back
        </a>
    </x-page-header>
    <div class="grid grid-cols-2 gap-6">
        <div class="border-2 p-1 rounded-md">
            <img class="rounded-md" src="{{ $book->imageUrl }}" />
        </div>
        <div class="flex flex-col gap-4">
            <p class="text-2xl font-bold">{{ $book->name }}</p>
            {!! $book->description !!}
            <p class="font-bold">$ {{ $book->price }}</p>
        </div>
    </div>
</div>
