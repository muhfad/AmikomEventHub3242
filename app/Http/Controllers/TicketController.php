<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with([
            'event',
            'review'
        ])
        ->where('user_id', Auth::id())
        ->whereIn('status', ['success', 'settlement'])
        ->latest()
        ->get();

        return view('tickets.index', compact('transactions'));
    }
}