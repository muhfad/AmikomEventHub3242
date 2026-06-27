@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold">
            Manajemen Kategori
        </h1>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Kategori
        </button>

    </div>

    <table class="w-full border">

        <thead class="bg-slate-200">
            <tr>
                <th class="border p-2">No</th>
                <th class="border p-2">Nama Kategori</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="border p-2">1</td>
                <td class="border p-2">Seminar</td>
                <td class="border p-2">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </button>

                    <button class="bg-red-500 text-white px-3 py-1 rounded">
                        Hapus
                    </button>
                </td>
            </tr>

            <tr>
                <td class="border p-2">2</td>
                <td class="border p-2">Workshop</td>
                <td class="border p-2">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </button>

                    <button class="bg-red-500 text-white px-3 py-1 rounded">
                        Hapus
                    </button>
                </td>
            </tr>
        </tbody>

    </table>

</div>

@endsection