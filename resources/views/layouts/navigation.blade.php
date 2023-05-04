<header class="navbar container mx-auto bg-base-100">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-2xl" href="/">Larablog</a>
    </div>
    <div class="flex-none gap-2">
        <div class="form-control">
            <input type="text" placeholder="Search" class="input input-bordered" />
        </div>

        @auth
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://api.dicebear.com/5.x/initials/svg?seed={{ Auth::user()->name }}}&backgroundColor=000000" />
                    </div>
                </label>
                <ul tabindex="0" class="mt-3 p-2 shadow-lg menu menu-compact dropdown-content bg-gray-100 w-52">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}">
                            Profile
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="p-0">
                            @csrf
                
                            <button type="submit" class="w-full h-full px-4 py-2 text-left">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a class="btn ml-6" href="{{ route('login') }}">Join us</a>
        @endauth
    </div>
</header>
