<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Wajib untuk Soft Delete

class Product extends Model
{
    use HasFactory, SoftDeletes; // Menggunakan SoftDeletes

    // Daftar kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'price',
        'stock',
    ];
}