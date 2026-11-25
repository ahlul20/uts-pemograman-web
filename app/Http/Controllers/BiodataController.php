<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    /**
     * Menampilkan daftar seluruh biodata mahasiswa.
     */
    public function index()
    {
        $biodatas = Biodata::latest()->get();

        return view('biodata.index', compact('biodatas'));
    }

    /**
     * Menampilkan form untuk menambahkan biodata baru.
     */
    public function create()
    {
        return view('biodata.create');
    }

    /**
     * Menyimpan biodata baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama.required' => 'Nama mahasiswa wajib diisi.',
            'nim.required' => 'NIM mahasiswa wajib diisi.',
            'deskripsi.required' => 'Deskripsi atau keterangan wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau webp.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('biodata', 'public');
            $validated['foto'] = $path;
        }

        Biodata::create($validated);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit biodata.
     */
    public function edit(Biodata $biodata)
    {
        return view('biodata.edit', compact('biodata'));
    }

    /**
     * Memperbarui biodata di database.
     */
    public function update(Request $request, Biodata $biodata)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama.required' => 'Nama mahasiswa wajib diisi.',
            'nim.required' => 'NIM mahasiswa wajib diisi.',
            'deskripsi.required' => 'Deskripsi atau keterangan wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau webp.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika tersimpan di disk public
            if ($biodata->foto && Storage::disk('public')->exists($biodata->foto)) {
                Storage::disk('public')->delete($biodata->foto);
            }

            $path = $request->file('foto')->store('biodata', 'public');
            $validated['foto'] = $path;
        }

        $biodata->update($validated);

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil diperbarui.');
    }

    /**
     * Menghapus biodata dari database.
     */
    public function destroy(Biodata $biodata)
    {
        if ($biodata->foto && Storage::disk('public')->exists($biodata->foto)) {
            Storage::disk('public')->delete($biodata->foto);
        }

        $biodata->delete();

        return redirect()->route('biodata.index')->with('success', 'Biodata berhasil dihapus.');
    }
}
