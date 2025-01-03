<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo Section -->
            <div class="flex items-center font-bold text-2xl shrink-0">
                <h1>eLibrary | IC</h1>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex items-center gap-5">
                <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                    {{ __('Beranda') }}
                </x-nav-link>
                <x-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.index')">
                    {{ __('Katalog') }}
                </x-nav-link>

                <!-- Dropdown: Profil -->
                <x-dropdown>
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <span>{{ __('Profil') }}</span>
                            <svg class="ms-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('library_profile') }}" :active="request()->routeIs('library_profile')">
                            {{ __('Profil Perpustakaan') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('library_structure') }}" :active="request()->routeIs('library_structure')">
                            {{ __('Struktur Kepengurusan') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('library_visi_misi') }}" :active="request()->routeIs('library_visi_misi')">
                            {{ __('Visi & Misi') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('library_tata_tertib') }}" :active="request()->routeIs('library_tata_tertib')">
                            {{ __('Tata Tertib') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- User Settings -->
            <div class="hidden sm:flex items-center">
                @if (!Auth::guest())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ms-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <div class="border-t border-gray-200 dark:border-gray-600"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Masuk') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('Daftar') }}
                    </x-nav-link>
                @endif
            </div>

            <!-- Hamburger Menu -->
            <div class="sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
            @if (!Auth::guest())
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                        {{ __('Beranda') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.index')">
                        {{ __('Katalog') }}
                    </x-nav-link>

                    <!-- Dropdown: Profil -->
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                <span>{{ __('Profil') }}</span>
                                <svg class="ms-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('library_profile') }}" :active="request()->routeIs('library_profile')">
                                {{ __('Profil Perpustakaan') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('library_structure') }}" :active="request()->routeIs('library_structure')">
                                {{ __('Struktur Kepengurusan') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('library_visi_misi') }}" :active="request()->routeIs('library_visi_misi')">
                                {{ __('Visi & Misi') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('library_tata_tertib') }}" :active="request()->routeIs('library_tata_tertib')">
                                {{ __('Tata Tertib') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <x-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                    {{ __('Beranda') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.index')">
                    {{ __('Katalog') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('library_profile') }}" :active="request()->routeIs('library_profile')">
                    {{ __('Profil Perpustakaan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('library_structure') }}" :active="request()->routeIs('library_structure')">
                    {{ __('Struktur Perpustakaan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('library_visi_misi') }}" :active="request()->routeIs('library_visi_misi')">
                    {{ __('Visi & Misi') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('library_tata_tertib') }}" :active="request()->routeIs('library_tata_tertib')">
                    {{ __('Tata Tertib') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('Masuk') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    {{ __('Daftar') }}
                </x-responsive-nav-link>
            @endif
        </div>
    </div>
</nav>
