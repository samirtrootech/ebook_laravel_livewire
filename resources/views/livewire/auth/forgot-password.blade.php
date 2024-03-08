<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl font-bold">Forgot Password</h1>
      <p class="py-6">Enter an email to sent a varification link by which you can reset your password.</p>
    </div>
    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
      <form class="card-body" wire:submit="sendResetLink">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" placeholder="Email" class="input input-bordered" wire:model="email" />
          @error('email')
            <small class="text-error">{{ $message }}</small>
          @enderror
          <label class="label">
            <a href="{{ route('login') }}" wire:navigate class="label-text-alt link link-hover">Back to Login?</a>
          </label>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary" {{ $loading ? 'disabled' : '' }}>
            @if ($loading)
              <span class="loading loading-spinner"></span>
            @endif
            Send Reset Link
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
