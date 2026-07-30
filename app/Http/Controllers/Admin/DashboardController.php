<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();

        $totalTransactions = Transaction::count();

        $totalUsers = User::count();

        $totalReviews = Review::count();

        $totalRevenue = Transaction::whereIn('status', [
            'success',
            'settlement'
        ])->sum('total_price');

        $topEvents = Event::withCount('transactions')
            ->orderByDesc('transactions_count')
            ->take(5)
            ->get();

        $monthlyTransactions = Transaction::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month');

        $chartData = [];

        $latestTransactions = Transaction::with('event')
            ->latest()
            ->take(5)
            ->get();

        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlyTransactions[$i] ?? 0;
        }
        
            return view('admin.dashboard', compact(
            'totalEvents',
            'totalTransactions',
            'totalUsers',
            'totalReviews',
            'totalRevenue',
            'topEvents',
            'chartData',
            'latestTransactions'
        ));
    }
}