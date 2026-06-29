@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.categories.store') }}" method="POST">

    @csrf

    <div>
        <label>Nama Kategori</label>

        <input type="text"
            name="name"
            class="border w-full p-2 rounded">
    </div>

    <button class="bg-indigo-600 text-white px-4 py-2 rounded mt-3">
        Simpan
    </button>

</form>

@endsection