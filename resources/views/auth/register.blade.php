<x-guest-layout>
    <x-validation-errors class="mb-4" />
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-80 rounded-lg shadow p-6 bg-white dark:bg-gray-800">
            <div class="flex flex-col justify-center items-center space-y-2">
                <h2 class="text-2xl font-medium text-gray-700 dark:text-white">Daftar</h2>
                <p class="text-gray-500 dark:text-gray-400">Masukkan detail di bawah.</p>
            </div>
            <form class="w-full mt-4 space-y-3" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-label for="name" value="{{ __('Nama') }}" />
                    <x-input id="name" class="block mt-1 w-full" name="name" :value="old('name')" required autofocus />
                </div>
                <div>
                    <x-label for="email" value="{{ __('Alamat Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" name="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                </div>
                <div>
                    <x-label for="password" value="{{ __('Kata Sandi') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>
                <div>
                    <x-label for="password_confirmation" value="{{ __('Konfirmasi Kata Sandi') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                </div>
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
                    </label>
                </div>
                <button
                    class="w-full justify-center py-1 bg-blue-500 dark:bg-blue-300 hover:bg-blue-600 dark:hover:bg-blue-400 active:bg-blue-700 dark:active:bg-blue-500 rounded-md text-white dark:text-gray-800 ring-2"
                    id="register" name="register" type="submit">
                    Daftar
                </button>
                <p class="flex justify-center space-x-1">
                    <span class="text-gray-700 dark:text-gray-400"> Sudah punya akun? </span>
                    <a class="text-blue-500 dark:text-blue-300 hover:underline" href="{{ route('login') }}">Masuk</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>

