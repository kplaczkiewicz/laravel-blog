<header class="sticky top-0 w-full bg-base-100 z-10">
    <div class="navbar container">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-2xl" href="/">Larablog</a>
        </div>
        <div class="flex-none gap-2">
            <div class="form-control">
                <form class="flex items-center gap-1" action="/">
                    <input type="hidden" name="tag" value="{{ app('request')->tag }}">
                    <input type="hidden" name="category" value="{{ app('request')->category }}">

                    <input type="text" placeholder="Search" class="input input-bordered" name="search" />
                    <button type="submit" class="btn btn-square"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            @auth
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-square avatar">
                        <div class="w-10">
                            <img
                                src="https://api.dicebear.com/5.x/initials/svg?seed={{ auth()->user()->name }}}&backgroundColor=000000" />
                        </div>
                    </label>
                    <ul tabindex="0" class="mt-3 p-2 shadow-lg menu menu-compact dropdown-content border border-primary/20 w-52 bg-white">
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
    </div>
</header>
