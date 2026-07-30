@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6 mb-8">
    <div class="bg-white rounded-3xl p-6 shadow-sm border">
        <p class="text-slate-500 font-medium">Total Event</p>
        <h2 class="text-4xl font-black mt-3">
            {{ $totalEvents }}
        </h2>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border">
        <p class="text-slate-500 font-medium">Transaksi</p>
        <h2 class="text-4xl font-black mt-3">
            {{ $totalTransactions }}
        </h2>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border">
        <p class="text-slate-500 font-medium">User</p>
        <h2 class="text-4xl font-black mt-3">
            {{ $totalUsers }}
        </h2>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm border">
        <p class="text-slate-500 font-medium">Review</p>
        <h2 class="text-4xl font-black mt-3">
            {{ $totalReviews }}
        </h2>
    </div>

    <div class="bg-indigo-600 rounded-3xl p-6 text-white shadow-lg">
        <p class="text-indigo-100 font-medium">
            Pendapatan
        </p>

        <h2 class="text-3xl font-black mt-3">
            Rp {{ number_format($totalRevenue, 0, ',', '.') }}
        </h2>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    <div class="xl:col-span-2 bg-white rounded-3xl p-8 shadow-sm border">
        <h2 class="text-2xl font-black mb-6">
            Grafik Transaksi
        </h2>

        <canvas id="transactionChart"></canvas>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border p-8 mt-8">
        <h2 class="text-2xl font-black mb-6">
            Transaksi Terbaru
        </h2>

        <div class="space-y-4">
            @forelse($latestTransactions as $trx)
                <div class="flex justify-between items-center border-b pb-3">
                    <div>
                        <h3 class="font-bold">
                            {{ $trx->customer_name }}
                        </h3>

                        <p class="text-slate-500">
                            {{ $trx->event->title }}
                        </p>
                    </div>

                    <div class="text-right">
                        <span class="font-bold text-indigo-600">
                            Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                        </span>

                        <p class="text-sm text-slate-400">
                            {{ $trx->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-slate-500">
                    Belum ada transaksi.
                </p>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-3xl p-8 shadow-sm border">
        <h2 class="text-2xl font-black mb-6">
            Event Terlaris
        </h2>

        @forelse($topEvents as $event)
            <div class="flex justify-between py-4 border-b">
                <div>
                    <h3 class="font-bold">
                        {{ $event->title }}
                    </h3>

                    <p class="text-slate-500">
                        {{ $event->transactions_count }} transaksi
                    </p>
                </div>
            </div>
        @empty
            <p class="text-slate-500">
                Belum ada transaksi.
            </p>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('transactionChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
            ],
            datasets: [{
                label: 'Transaksi',
                data: @json($chartData),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@endpush