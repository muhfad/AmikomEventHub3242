@extends('layouts.app')

@section('title', 'Review Event')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <div class="bg-white rounded-3xl shadow p-8">
        <h2 class="text-3xl font-black mb-2">
            Beri Review
        </h2>

        <p class="text-slate-500 mb-8">
            {{ $transaction->event->title }}
        </p>

        <form method="POST" action="{{ route('review.store', $transaction->id) }}">
            @csrf

            <div class="mb-6">
                <label class="font-bold block mb-2">
                    Rating
                </label>

                <select name="rating" class="w-full border rounded-xl p-3">
                    <option value="">Pilih Rating</option>
                    <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                    <option value="4">⭐⭐⭐⭐ (4)</option>
                    <option value="3">⭐⭐⭐ (3)</option>
                    <option value="2">⭐⭐ (2)</option>
                    <option value="1">⭐ (1)</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="font-bold block mb-2">
                    Review
                </label>

                <textarea name="review" rows="5" class="w-full border rounded-xl p-3"></textarea>
            </div>

            <button class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold">
                Kirim Review
            </button>
        </form>
    </div>
</div>
@endsection