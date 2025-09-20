<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading ?? 'My Cozy Site' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Segoe UI"', 'Roboto', 'sans-serif'],
                    },
                    colors: {
                        cozy: {
                            bg: '#fdf6f0',
                            card: '#fffaf5',
                            accent: '#d97706',
                            text: '#3f3f46',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-cozy-bg min-h-screen font-sans text-cozy-text flex flex-col">

    <!-- Navbar -->
    <nav class="bg-cozy-card border-b border-orange-100 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <span class="text-2xl">☕</span>
                    <span class="font-bold text-lg text-cozy-accent">MY FIRST</span>
                </div>

                <!-- Links -->
                <div class="flex space-x-4">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="text-center py-10 bg-gradient-to-r from-orange-100 via-cozy-card to-orange-50 shadow-inner">
        <h1 class="text-4xl font-extrabold text-cozy-accent tracking-tight">
            {{ $heading }}
        </h1>
        <p class="mt-2 text-gray-600 italic">Take it slow. Stay cozy. 🌿</p>
    </header>

    <!-- Page Content -->
    <main class="flex-grow">
        <div class="max-w-3xl mx-auto px-6 py-8 bg-cozy-card rounded-2xl shadow-lg">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-cozy-card py-6 mt-10 text-center text-sm text-gray-500 border-t border-orange-100">
        © {{ date('Y') }} Cozy Corner · Built with ❤️ and Laravel
    </footer>

</body>
</html>
