<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Reset Password</h1>
        <p class="py-6">Enter password and confirm password to reset</p>
      </div>
      <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" wire:submit="resetPassword">
          <div class="form-control">
            <label class="label">
              <span class="label-text">New Password</span>
            </label>
            <input type="password" placeholder="New Password" class="input input-bordered" wire:model="password" />
            @error('password')
              <small class="text-error">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Confirm Password</span>
            </label>
            <input type="password" placeholder="Confirm Password" class="input input-bordered" wire:model="password_confirmation" />
            @error('password_confirmation')
              <small class="text-error">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
