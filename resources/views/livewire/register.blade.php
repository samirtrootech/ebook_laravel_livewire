<div class="hero min-h-screen bg-base-200">
  @php
    $previewImage = $form->profileImage ? $form->profileImage->temporaryUrl() : '';
  @endphp
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <a class="btn btn-default btn-sm rounded mb-4" href="/" wire:navigate>
        <span class="material-symbols-outlined text-lg">keyboard_backspace</span>
        Back to Home
      </a>
      <h1 class="text-5xl font-bold">Register!</h1>
      <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
        quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
    </div>
    <div class="card  w-full max-w-xl shadow-2xl bg-base-100">
      <form class="card-body" wire:submit="save">
        <div class="grid grid-cols-2 gap-4">
          <div class="flex gap-4 items-center col-span-2">
            <x-avatar src="{{ $previewImage }}" alt="User" size="large" />
            <x-file-input name="form.profileImage">Uplaod Image</x-file-input>
            @error('form.profileImage')
              <span class="text-error">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">First Name</span>
            </label>
            <input type="text" placeholder="First Name" class="input input-bordered" wire:model="form.firstName" />
            @error('form.firstName')
              <small class="text-error">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Last Name</span>
            </label>
            <input type="text" placeholder="Last Name" class="input input-bordered" wire:model="form.lastName" />
            @error('form.lastName')
              <small class="text-error">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-control col-span-2">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" placeholder="Email" class="input input-bordered" wire:model="form.email" />
            @error('form.email')
              <small class="text-error">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" placeholder="Password" class="input input-bordered" wire:model="form.password" />
            @error('form.password')
              <small class="text-error">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Confirm Password</span>
            </label>
            <input type="password" placeholder="Confirm Password" class="input input-bordered"
              wire:model="form.password_confirmation" />
            @error('form.password_confirmation')
              <small class="text-error">{{ $message }}</small>
            @enderror
            <label class="label">
              <a href="{{ route('login') }}" wire:navigate class="label-text-alt link link-hover">Already have an
                account?</a>
            </label>
          </div>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
