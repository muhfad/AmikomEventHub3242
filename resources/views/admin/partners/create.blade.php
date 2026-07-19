@extends('layouts.admin')

@section('title','Tambah Partner')
@section('page_title','Tambah Partner')
@section('page_subtitle','Masukkan data partner baru')

@section('content')

<div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8 max-w-2xl">

    <form action="{{ route('admin.partners.store') }}" method="POST">

        @csrf

        <div class="mb-6">

            <label class="block font-bold mb-2">
                Nama Partner
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="w-full rounded-2xl border border-slate-300 px-5 py-3">

            @error('name')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-6">

            <label class="block font-bold mb-2">
                URL Logo
            </label>

            <input
                type="url"
                name="logo_url"
                value="{{ old('logo_url','https://placehold.co/200x200') }}"
                class="w-full rounded-2xl border border-slate-300 px-5 py-3">

            @error('logo_url')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror

        </div>

        <div class="flex justify-end gap-4">

            <a href="{{ route('admin.partners.index') }}"
                class="px-6 py-3 rounded-2xl border">
                Batal
            </a>

            <button
                class="px-6 py-3 rounded-2xl bg-indigo-600 text-white font-bold">

                Simpan Partner

            </button>

        </div>

    </form>

</div>

@endsection