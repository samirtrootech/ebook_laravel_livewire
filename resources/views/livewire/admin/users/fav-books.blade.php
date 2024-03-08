<div>
    <x-page-header :header="'Favorite Books'">
		<a class="btn btn-default btn-sm rounded" href="{{ route('admin.users') }}" wire:navigate>
			<span class="material-symbols-outlined text-lg">keyboard_backspace</span>
			Back
		</a>
	</x-page-header>

	<div class="flex justify-end">
        <label class="input input-bordered flex items-center input-sm mb-4 w-96">
            <span class="material-symbols-outlined">search</span>
            <input type="text" class="grow" placeholder="Type to search..." wire:model.live.debounce.500ms="search" />
            @error('form.name')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </label>
    </div>

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
				@if ($books->count())
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
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="3">
							No Favorite book is available.
						</td>
					</tr>
				@endif
            </tbody>
        </table>
    </div>
</div>
