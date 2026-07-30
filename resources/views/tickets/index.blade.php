@extends('layouts.app')

@section('title', 'Tiket Saya')

@section('content')
<div class="max-w-6xl mx-auto py-12">

    <h1 class="text-3xl font-black mb-8">
        Tiket Saya
    </h1>

    @forelse($transactions as $trx)
        <div class="bg-white rounded-3xl shadow p-6 mb-6">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold">
                        {{ $trx->event->title }}
                    </h2>
                    <p class="text-gray-500 mt-1">
                        {{ $trx->event->date->format('d M Y H:i') }}
                    </p>
                    <p class="text-gray-500">
                        {{ $trx->event->location }}
                    </p>
                </div>

                <div class="text-right">
                    <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-bold">
                        {{ strtoupper($trx->status) }}
                    </span>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('checkout.success', $trx->order_id) }}" 
                   class="bg-indigo-600 text-white px-5 py-2 rounded-xl">
                    Lihat E-Ticket
                </a>

                @if(!$trx->review)
                    <a href="{{ route('review.create', $trx->id) }}"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl transition">
                        Beri Review
                    </a>
                @else
                    <span class="bg-indigo-600 text-white px-5 py-2 rounded-xl">
                        Sudah Direview
                    </span>
                @endif
            </div>
        </div>
    @empty
        <div class="bg-white rounded-3xl shadow p-10 text-center">
            <h2 class="text-xl font-bold">
                Belum ada tiket.
            </h2>
        </div>
    @endforelse

</div>
@endsection