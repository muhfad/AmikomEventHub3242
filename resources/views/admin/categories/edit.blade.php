@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.categories.update', $category->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>Nama Kategori</label>

        <input type="text"
            name="name"
            value="{{ $category->name }}"
            class="border w-full p-2 rounded">
    </div>

    <button class="bg-indigo-600 text-white px-4 py-2 rounded mt-3">
        Update
    </button>

</form>

@endsection