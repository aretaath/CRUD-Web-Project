<!-- Navbar Blade Template -->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Dekstop menu -->
    <div class="hidden md:flex navbar bg-base-100 drawer lg:drawer-open">
        <div class="flex-1">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-white" />
            </a>
        </div>
        <!-- Search -->
        <div class="flex items-center justify-center w-screen">
            <div class="form-control w-full max-w-md">
                <input type="text" placeholder="Search" class="input input-bordered w-full" />
            </div>
        </div>
        <div class="flex-none gap-2">
            <!-- Icon notification -->
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V4a2 2 0 10-4 0v1.083A6.002 6.002 0 004 11v3.159c0 .538-.214 1.055-.595 1.437L2 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9" />
                </svg>
            </button>
            <!-- Profile Dropdown -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" alt="Profile Avatar">
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>View Profile / {{ Auth::user()->name }}</a></li>
                    <li><a>Edit Avatar</a></li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="justify-between">
                            {{ __('Account Settings') }}
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="justify-between">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="flex md:hidden navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <label for="my-drawer-2" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </label>
            </div>
        </div>
        <div class="navbar-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-white" />
            </a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <!-- Profile Dropdown -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" alt="Profile Avatar">
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>View Profile / {{ Auth::user()->name }}</a></li>
                    <li><a>Edit Avatar</a></li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="justify-between">
                            {{ __('Account Settings') }}
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="justify-between">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
