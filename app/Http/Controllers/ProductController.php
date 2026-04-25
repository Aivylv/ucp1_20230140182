<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        //Ubah Product::all() menjadi Product::with('kategori')->get()
        //Ini berfungsi agar Laravel otomatis mengambil data nama kategori yang berelasi
        $products = Product::with('kategori')->get();

        return view('product.index', compact('products'));
    }

    public function store(StoreProductRequest $request)
    {
        // Data yang sudah divalidasi diambil melalui $request->validated()
        $validated = $request->validated();

        $product = Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        $kategoris = Kategori::all(); // (Ambil data kategori untuk dijadikan pilihan dropdown)

        return view('product.create', compact('users', 'kategoris')); // (Kirim variabel kategoris ke view)
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.view', compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        // Cek apakah user berhak mengupdate produk ini
        Gate::authorize('update', $product);

        // Ambil data yang sudah lolos validasi otomatis
        $validated = $request->validated();

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function edit(Product $product)
    {
        Gate::authorize('update', $product);

        $users = User::orderBy('name')->get();
        //Ambil data kategori untuk form edit
        $kategoris = \App\Models\Kategori::all(); 

        //Kirim variabel kategoris ke view
        return view('product.edit', compact('product', 'users', 'kategoris'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }

    public function export()
    {
        return "Berhasil!";
    }
}