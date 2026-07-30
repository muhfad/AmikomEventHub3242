<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AmikomEventHub</title>

    @vite(['resources/css/app.css'])

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white rounded-3xl shadow-xl p-10 w-full max-w-md">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-black text-indigo-600">
                AmikomEventHub
            </h1>

            <p class="text-slate-500 mt-2">
                Masuk untuk melanjutkan pemesanan tiket event
            </p>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 rounded-xl p-3">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 rounded-xl p-3">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- LOGIN EMAIL --}}
        <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-2 font-semibold">
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Masukkan email"
                       required>
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Masukkan password"
                       required>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="remember">
                    Ingat saya
                </label>
            </div>

            <button class="w-full bg-indigo-600 hover:bg-indigo-700 transition text-white py-3 rounded-xl font-bold">
                Login
            </button>
        </form>

        <div class="flex items-center my-8">
            <div class="flex-1 border-t"></div>
            <span class="mx-4 text-slate-400 text-sm">
                ATAU
            </span>
            <div class="flex-1 border-t"></div>
        </div>

        {{-- LOGIN GOOGLE --}}
        <a href="{{ route('google.login') }}"
           class="flex items-center justify-center gap-3 border rounded-xl py-3 hover:bg-slate-100 transition">
            <img src="https://developers.google.com/identity/images/g-logo.png"
                 class="w-6 h-6">

            <span class="font-semibold">
                Login dengan Google
            </span>
        </a>

        <div class="text-center mt-8">
            <p class="text-slate-500">
                Belum punya akun?
                <a href="{{ route('register') }}"
                   class="text-indigo-600 font-semibold hover:underline">
                    Daftar
                </a>
            </p>

            <a href="{{ route('home') }}"
               class="inline-block mt-4 text-indigo-600 hover:underline">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>

</body>
</html>