@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">

    <h1 class="text-3xl font-bold text-center text-indigo-700 mb-8">
        Pusat Bantuan
    </h1>

    <div class="space-y-6">

        <div class="border-b pb-4">
            <h2 class="font-bold text-lg">
                Bagaimana cara membeli tiket?
            </h2>

            <p class="text-gray-600 mt-2">
                Pilih event yang diinginkan, kemudian klik tombol checkout dan selesaikan pembayaran.
            </p>
        </div>

        <div class="border-b pb-4">
            <h2 class="font-bold text-lg">
                Bagaimana cara melihat tiket saya?
            </h2>

            <p class="text-gray-600 mt-2">
                Tiket dapat dilihat setelah pembayaran berhasil dilakukan.
            </p>
        </div>

        <div class="border-b pb-4">
            <h2 class="font-bold text-lg">
                Metode pembayaran apa saja yang tersedia?
            </h2>

            <p class="text-gray-600 mt-2">
                Pembayaran dilakukan melalui Midtrans dengan berbagai metode pembayaran.
            </p>
        </div>

    </div>

</div>

@endsection