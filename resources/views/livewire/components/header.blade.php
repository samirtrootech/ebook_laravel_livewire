<div class="drawer">
  @php
    $books = '';
    $users = '';
    $currentRoute = request()->route()->getName();
    if (
        $currentRoute === 'admin.books' or
        $currentRoute === 'admin.books.create' or
        $currentRoute === 'admin.books.edit'
    ) {
        $users = '';
        $books = 'active';
    } elseif (
        $currentRoute === 'admin.users' or
        $currentRoute === 'admin.users.create' or
        $currentRoute === 'admin.users.edit'
    ) {
        $books = '';
        $users = 'active';
    }
  @endphp
  <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col">
    <div class="w-full navbar bg-base-300">
      <div class="flex-none lg:hidden">
        <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            class="inline-block w-6 h-6 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </label>
      </div>
      <div class="flex-1 px-2 mx-2 font-bold text-lg">Books</div>
      <div>
        @auth
          <div class="inline-flex hidden lg:flex">
            <ul class="menu menu-horizontal">

              @unless (Auth::user()->role->name === 'admin')
                <li>
                  <a class="tooltip tooltip-bottom flex {{ $users }}" data-tip="Favourites"
                    href="{{ route('front.books.fav') }}" wire:navigate>
                    <span class="material-symbols-outlined text-lg">group</span>
                    My Favourites
                  </a>
                </li>
              @else
                <li>
                  <a class="tooltip tooltip-bottom flex {{ $books }}" data-tip="Books" href="/admin/books"
                    wire:navigate>
                    <span class="material-symbols-outlined text-lg">book_4</span>
                    Books
                  </a>
                </li>
                <li>
                  <a class="tooltip tooltip-bottom flex {{ $users }}" data-tip="Users"
                    href="{{ route('admin.users') }}" wire:navigate>
                    <span class="material-symbols-outlined text-lg">group</span>
                    Users
                  </a>
                </li>
              @endunless

            </ul>
            <div class="dropdown dropdown-end">
              <div tabindex="0" role="button" class="btn btn-ghost btn-rounded avatar p-1">
                <x-avatar src="{{ Auth::user()->profileImageUrl }}" alt="{{ Auth::user()->fullName }}" size="w-10" />
              </div>
              <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded w-52">
                <li>
                  <a href="{{ route('user.profile') }}" wire:navigate>
                    <span class="material-symbols-outlined">account_circle</span>
                    Profile
                  </a>
                </li>
                <li>
                  <button wire:click="logout">
                    <span class="material-symbols-outlined">logout</span>
                    Logout
                  </button>
                </li>
              </ul>
            </div>
          </div>
        @endauth
        @guest

          <div class="inline-flex hidden lg:flex">
            <ul class="menu menu-horizontal">
              <li>
                <a class="tooltip tooltip-bottom flex " data-tip="Home" href="/"
                  wire:navigate>
                  <span class="material-symbols-outlined">home</span>
                  Home
                </a>
              </li>
              <li>
                <a class="tooltip tooltip-bottom flex " data-tip="Sign in" href="/login"
                  wire:navigate>
                  <span class="material-symbols-outlined">login</span>
                  Signin
                </a>
              </li>
              <li>
                <a class="tooltip tooltip-bottom flex " data-tip="Sign up" href="/register"
                  wire:navigate>
                  <span class="material-symbols-outlined">app_registration</span>
                  Signup
                </a>
              </li>
            </ul>
          </div>
        @endguest
      </div>
    </div>
  </div>
  <div class="drawer-side">
    <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu p-4 w-80 min-h-full bg-base-200">
      <!-- Sidebar content here -->
      <li><a>Sidebar Item 1</a></li>
      <li><a>Sidebar Item 2</a></li>
    </ul>
  </div>
</div>
