<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased" x-data="themeSwitcher()" :class="{ 'dark': switchOn }">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <x-navbar />

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>

    <script>
        window.themeSwitcher = function () {
            return {
                switchOn: JSON.parse(localStorage.getItem('isDark')) || false,
                switchTheme() {
                    try {
                        this.switchOn = !this.switchOn;
                        if (this.switchOn) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                        localStorage.setItem('isDark', JSON.stringify(this.switchOn));
                    } catch (error) {
                        console.error('Error switching theme:', error);
                    }
                }
            }
        }
    </script>
</html>

