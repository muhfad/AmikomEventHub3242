<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmikomEventHub - @yield('title', 'Temukan Event Seru!')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <!-- Navigation -->
    <nav
        class="glass sticky top-8 z-40 mx-4 mt-4 px-6 py-4 rounded-2xl border border-white/20 shadow-lg flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <div
                class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                AH</div>
            <span class="text-xl font-bold tracking-tight">AmikomEventHub</span>
        </a>
        <div class="hidden md:flex items-center gap-8 font-medium">
            <a href="{{ route('home') }}" class="hover:text-indigo-600">
                Jelajahi
            </a>

            <a href="{{ route('tickets.index') }}" class="hover:text-indigo-600">
                Tiket Saya
            </a>

            @guest
                <a href="{{ route('login') }}"
                class="px-5 py-2 rounded-xl border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                class="px-5 py-2 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition">
                    Register
                </a>
            @endguest

            @auth
                <span class="font-semibold text-slate-700">
                    {{ Auth::user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button
                        type="submit"
                        style="background:#dc2626;color:white;padding:10px 18px;border-radius:12px;">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-indigo-900 text-indigo-100 py-20 px-6 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="space-y-4 col-span-2">
                <div class="flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                        AH</div>
                    <span class="text-2xl font-bold text-white">AmikomEventHub</span>
                </div>
                <p class="max-w-xs text-indigo-300">Platform reservasi tiket event online terbaik untuk mahasiswa dan
                    penyelenggara profesional.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Navigasi</h4>
                <ul class="space-y-4">
                    <li><a href="{{ url('/') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ url('/') }}#events" class="hover:text-white transition">Semua Event</a></li>
                    <li><a href="#" class="hover:text-white transition">Cara Bayar</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Hubungi Kami</h4>
                <ul class="space-y-4">
                    <li>support@eventtiket.com</li>
                    <li>+62 812 3456 7890</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-12 mt-12 border-t border-indigo-800 text-center text-indigo-400 text-sm">
            &copy; {{ date('Y') }} AmikomEventHub. Built with Laravel & Tailwind CSS.
        </div>
    </footer>

</body>

</html>
