<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::with('jabatan')
            ->latest()
            ->get();

        return view('admin.pengurus.index', compact('pengurus'));
    }

    public function create()
    {
        $jabatan = Jabatan::all();

        return view('admin.pengurus.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan_id' => 'required|exists:jabatan,id',
            'name' => 'required|max:100',
            'description' => 'nullable|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        Pengurus::create([
            'jabatan_id' => $request->jabatan_id,
            'name' => $request->name,
            'description' => $request->description,
            'salary' => $request->salary,
            'created_by' => 'Admin',
            'updated_by' => 'Admin',
        ]);

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Pengurus $pengurus)
    {
        $jabatan = Jabatan::all();

        return view('admin.pengurus.edit', compact('pengurus', 'jabatan'));
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $request->validate([
            'jabatan_id' => 'required|exists:jabatan,id',
            'name' => 'required|max:100',
            'description' => 'nullable|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        $pengurus->update([
            'jabatan_id' => $request->jabatan_id,
            'name' => $request->name,
            'description' => $request->description,
            'salary' => $request->salary,
            'updated_by' => 'Admin',
        ]);

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil diperbarui.');
    }

    public function destroy(Pengurus $pengurus)
    {
        $pengurus->delete();

        return redirect()
            ->route('admin.pengurus.index')
            ->with('success', 'Data pengurus berhasil dihapus.');
    }
}