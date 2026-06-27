@extends('layouts.app')

@section('content')

<div class="text-center mb-10">
    <h1 class="text-4xl font-bold text-indigo-700">
        Katalog Event
    </h1>
    <p class="text-gray-500 mt-2">
        Daftar event yang tersedia di AmikomEventHub
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-2">
            Workshop UI/UX
        </h2>

        <p class="text-gray-600 mb-4">
            Pelajari desain antarmuka modern bersama mentor profesional.
        </p>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Lihat Detail
        </button>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-2">
            Seminar Digital Business
        </h2>

        <p class="text-gray-600 mb-4">
            Mengenal peluang bisnis digital di era modern.
        </p>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Lihat Detail
        </button>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-2">
            Konser Musik Kampus
        </h2>

        <p class="text-gray-600 mb-4">
            Nikmati hiburan musik bersama mahasiswa Amikom.
        </p>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Lihat Detail
        </button>
    </div>

</div>

@endsection