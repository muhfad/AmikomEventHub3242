<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::latest()->get();

        return view('admin.jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        return view('admin.jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        Jabatan::create([
            'name' => $request->name,
            'created_by' => 'Admin',
            'updated_by' => 'Admin',
        ]);

        return redirect()
            ->route('admin.jabatan.index')
            ->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Jabatan $jabatan)
    {
        return view('admin.jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $jabatan->update([
            'name' => $request->name,
            'updated_by' => 'Admin',
        ]);

        return redirect()
            ->route('admin.jabatan.index')
            ->with('success', 'Data jabatan berhasil diperbarui.');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()
            ->route('admin.jabatan.index')
            ->with('success', 'Data jabatan berhasil dihapus.');
    }
}