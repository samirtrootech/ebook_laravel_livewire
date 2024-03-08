<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <a class="btn btn-default btn-sm rounded mb-4" href="/" wire:navigate>
        <span class="material-symbols-outlined text-lg">keyboard_backspace</span>
        Back to Home
      </a>
      <h1 class="text-5xl font-bold">Login now!</h1>
      <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
        quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
    </div>
    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
      <form class="card-body" wire:submit="login">
        <div class="form-control">
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
          <label class="label">
            <a href="{{ route('forgot.password') }}" wire:navigate class="label-text-alt link link-hover">Forgot
              password?</a>
            <a href="{{ route('register') }}" wire:navigate class="label-text-alt link link-hover">Sign up?</a>
          </label>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
