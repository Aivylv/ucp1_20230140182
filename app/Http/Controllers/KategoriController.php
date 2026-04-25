<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KategoriController extends Controller
{
    public function index()
    {
        //Menghitung total produk per kategori secara otomatis (kolom TOTAL PRODUCT)
        $kategoris = Kategori::withCount('products')->get();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        //Membuka halaman form tambah kategori
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        //Validasi: nama harus diisi, berupa string, dan tidak boleh sama (unique)
        $request->validate([
            'name' => 'required|string|max:255|unique:kategoris,name',
        ]);

        //Menyimpan data ke database
        Kategori::create([
            'name' => $request->name
        ]);

        return redirect()->route('kategori.index')->with('success', 'Category created successfully.');
    }

    public function edit(Kategori $kategori)
    {
        //Membuka halaman form edit kategori dengan membawa data kategori yang dipilih
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        //Validasi: nama harus unik, KECUALI untuk kategori yang sedang diedit ini sendiri
        $request->validate([
            'name' => 'required|string|max:255|unique:kategoris,name,' . $kategori->id,
        ]);

        //Mengupdate data di database
        $kategori->update([
            'name' => $request->name
        ]);

        return redirect()->route('kategori.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Kategori $kategori)
    {
        //Menghapus data dari database
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Category deleted successfully.');
    }
}