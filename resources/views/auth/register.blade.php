<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - AmikomEventHub</title>

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
                Buat akun baru untuk mulai memesan event
            </p>
        </div>

        @if($errors->any())
            <div class="mb-5 bg-red-100 text-red-700 rounded-xl p-3">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-2 font-semibold">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Masukkan nama lengkap"
                       required>
            </div>

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
                       placeholder="Minimal 8 karakter"
                       required>
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Konfirmasi Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Ulangi password"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 transition text-white py-3 rounded-xl font-bold">
                Daftar
            </button>
        </form>

        <div class="text-center mt-8">
            <p class="text-slate-500">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                   class="text-indigo-600 font-semibold hover:underline">
                    Login
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