@extends('layouts.admin')

@section('title','Tambah Jabatan')
@section('page_title','Tambah Jabatan')

@section('content')

<div class="bg-white rounded-3xl shadow-sm p-8">

<form
action="{{ route('admin.jabatan.store') }}"
method="POST">

@csrf

<div class="mb-6">

<label class="font-bold">
Nama Jabatan
</label>

<input
type="text"
name="name"
class="w-full mt-2 border rounded-xl p-3"
value="{{ old('name') }}">

@error('name')

<p class="text-red-500 mt-2">
{{ $message }}
</p>

@enderror

</div>

<button
class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

Simpan

</button>

<a
href="{{ route('admin.jabatan.index') }}"
class="ml-2">

Kembali

</a>

</form>

</div>

@endsection