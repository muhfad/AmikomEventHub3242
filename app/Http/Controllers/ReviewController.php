<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Transaction $transaction)
    {
        // Pastikan transaksi milik user yang login
        if ($transaction->user_id != Auth::id()) {
            abort(403);
        }

        // Pastikan transaksi sudah sukses
        if (!in_array($transaction->status, ['success', 'settlement'])) {
            return back()->with('error', 'Transaksi belum selesai.');
        }

        // Cek apakah sudah pernah review
        if ($transaction->review) {
            return back()->with('error', 'Anda sudah memberikan review.');
        }

        return view('reviews.create', compact('transaction'));
    }

    public function store(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:500',
        ]);

        Review::create([
            'event_id'       => $transaction->event_id,
            'transaction_id' => $transaction->id,
            'user_id'        => Auth::id(),
            'rating'         => $request->rating,
            'review'         => $request->review,
        ]);

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Terima kasih atas review Anda.');
    }
}