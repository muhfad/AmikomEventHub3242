@extends('layouts.admin')

@section('title', 'Data Jabatan')
@section('page_title', 'Data Jabatan')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-black">Daftar Jabatan</h2>

    <a href="{{ route('admin.jabatan.create') }}"
        class="px-5 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700">
        + Tambah Jabatan
    </a>
</div>

@if(session('success'))
<div class="mb-5 p-4 rounded-xl bg-green-100 text-green-700">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-3xl shadow-sm overflow-hidden border">

    <table class="w-full">

        <thead class="bg-slate-100">

            <tr>

                <th class="px-6 py-4 text-left">No</th>

                <th class="px-6 py-4 text-left">Nama Jabatan</th>

                <th class="px-6 py-4 text-left">Created By</th>

                <th class="px-6 py-4 text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($jabatan as $item)

            <tr class="border-t">

                <td class="px-6 py-4">{{ $loop->iteration }}</td>

                <td class="px-6 py-4 font-semibold">
                    {{ $item->name }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->created_by }}
                </td>

                <td class="px-8 py-6">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.jabatan.edit', $item->id) }}"
                            class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </a>

                        <form action="{{ route('admin.jabatan.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data jabatan ini?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4"
                    class="text-center py-8">

                    Belum ada data.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection