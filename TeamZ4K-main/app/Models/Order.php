<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Wajib untuk Soft Delete

class Order extends Model
{
    use HasFactory, SoftDeletes; // Menggunakan SoftDeletes

    // Karena tabel orders sederhana, kita bebaskan semua kolom (kecuali id dan timestamps)
    // Jika ada kolom lain, sebaiknya gunakan $fillable.
    protected $guarded = []; 
}