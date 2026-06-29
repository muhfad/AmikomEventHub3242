@extends('layouts.admin')

@section('title', 'Kategori - Admin')
@section('page_title', 'Manajemen Kategori')
@section('page_subtitle', 'Kelola kategori event Anda.')

@section('content')

<div class="mb-4 text-right">
    <a href="{{ route('admin.categories.create') }}"
       class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
        + Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
            <tr>
                <th class="px-8 py-4">No</th>
                <th class="px-8 py-4">Nama Kategori</th>
                <th class="px-8 py-4">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y border-t">
            @foreach($categories as $category)
            <tr class="hover:bg-slate-50/50">
                <td class="px-8 py-6">{{ $loop->iteration }}</td>

                <td class="px-8 py-6 font-bold">
                    {{ $category->name }}
                </td>

                <td class="px-8 py-6">
                    <div class="flex gap-2">

                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl">
                            Edit
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin hapus kategori?')"
                                    class="px-4 py-2 bg-rose-50 text-rose-600 rounded-xl">
                                Hapus
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection