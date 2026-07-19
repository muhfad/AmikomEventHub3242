@extends('layouts.admin')

@section('title', 'Data Partner')
@section('page_title', 'Data Partner')
@section('page_subtitle', 'Daftar seluruh partner Amikom Event Hub')

@section('content')

<div class="flex justify-end mb-6">
    <a href="{{ route('admin.partners.create') }}"
        class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">
        + Tambah Partner
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 rounded-2xl bg-green-100 text-green-700">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">

    <table class="w-full">
        <thead class="bg-slate-50">
            <tr class="text-left">
                <th class="px-6 py-4">Logo</th>
                <th class="px-6 py-4">Nama Partner</th>
                <th class="px-6 py-4">Logo URL</th>
            </tr>
        </thead>

        <tbody>

            @forelse($partners as $partner)

            <tr class="border-t hover:bg-slate-50">

                <td class="px-6 py-4">
                    <img src="{{ $partner->logo_url }}"
                        class="w-16 h-16 rounded-xl object-cover">
                </td>

                <td class="px-6 py-4 font-semibold">
                    {{ $partner->name }}
                </td>

                <td class="px-6 py-4 text-indigo-600">
                    {{ $partner->logo_url }}
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="3" class="text-center py-8 text-slate-500">
                    Belum ada data partner.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection