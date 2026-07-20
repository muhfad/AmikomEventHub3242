@extends('layouts.admin')

@section('title','Tambah Pengurus')
@section('page_title','Tambah Pengurus')

@section('content')

<div class="bg-white rounded-3xl p-8 shadow-sm">

<form
action="{{ route('admin.pengurus.store') }}"
method="POST">

@csrf

<div class="mb-5">

<label>Jabatan</label>

<select
name="jabatan_id"
class="w-full border rounded-xl p-3 mt-2">

<option value="">Pilih Jabatan</option>

@foreach($jabatan as $j)

<option
value="{{ $j->id }}">

{{ $j->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-5">

<label>Nama</label>

<input
type="text"
name="name"
class="w-full border rounded-xl p-3 mt-2">

</div>

<div class="mb-5">

<label>Deskripsi</label>

<textarea
name="description"
class="w-full border rounded-xl p-3 mt-2"></textarea>

</div>

<div class="mb-5">

<label>Gaji</label>

<input
type="number"
name="salary"
class="w-full border rounded-xl p-3 mt-2">

</div>

<button
class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

Simpan

</button>

<a
href="{{ route('admin.pengurus.index') }}"
class="ml-2">

Kembali

</a>

</form>

</div>

@endsection