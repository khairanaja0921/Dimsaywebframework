<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import Model Product
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    // 1. READ (Menampilkan daftar data)
    public function index(): View
    {
        // Mengambil semua produk yang TIDAK di soft-delete
        $products = Product::all(); 
        return view('products.index', compact('products')); 
    }

    // 2. CREATE (Menyimpan data baru)
    public function store(Request $request): RedirectResponse
    {
        // Menggunakan Eloquent untuk menyimpan data
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // 3. UPDATE (Memperbarui data)
    public function update(Request $request, Product $product): RedirectResponse
    {
        // Menggunakan Eloquent untuk memperbarui data
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // 4. DELETE (Menghapus data / Soft Delete)
    public function destroy(Product $product): RedirectResponse
    {
        // Memanggil metode delete() yang akan mengisi kolom deleted_at
        $product->delete(); 
        
        // Catatan: Jika ingin menghapus permanen, gunakan $product->forceDelete();
        
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus (soft-deleted).');
    }
}