<?php

namespace App\Http\Controllers;

use App\Models\Order; // Import Model Order
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    // 1. READ (Menampilkan daftar data)
    public function index(): View
    {
        // Mengambil semua pesanan yang TIDAK di soft-delete
        $orders = Order::all(); 
        return view('orders.index', compact('orders')); 
    }

    // 2. CREATE (Menyimpan data baru)
    public function store(Request $request): RedirectResponse
    {
        // Menggunakan Eloquent untuk menyimpan data
        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    // 3. DELETE (Menghapus data / Soft Delete)
    public function destroy(Order $order): RedirectResponse
    {
        // Memanggil metode delete() yang akan mengisi kolom deleted_at
        $order->delete(); 
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus (soft-deleted).');
    }
    
    // Karena tabel Order saat ini tidak memiliki kolom "update" selain timestamps,
    // kita hanya fokus pada index, store, dan destroy.
}