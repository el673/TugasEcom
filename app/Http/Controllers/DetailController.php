<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        return view('detail', [
            "judul" => "Detail Produk",
            "produk" => [
                "nama" => "Tas Rotan Bali",
                "deskripsi1" => "Tas anyaman rotan asli dari Bali, dibuat dengan tangan oleh pengrajin lokal.",
                "deskripsi2" => "Desain unik dan elegan, cocok untuk acara santai atau formal.",
                "deskripsi3" => "Dilengkapi dengan tali kulit sintetis yang nyaman digunakan.",
                "deskripsi4" => "Material rotan berkualitas tinggi, kuat dan tahan lama.",
                "deskripsi5" => "Proses pembuatan ramah lingkungan, tanpa bahan kimia berbahaya.",
                "deskripsi6" => "Tersedia dalam berbagai ukuran dan warna natural.",
                "deskripsi7" => "Bagian dalam dilapisi kain lembut untuk melindungi barang bawaan.",
                "deskripsi8" => "Mudah dibersihkan dan perawatannya tidak memerlukan bahan khusus.",
                "deskripsi9" => "Cocok untuk hadiah atau koleksi pribadi yang bernilai seni tinggi.",
                "deskripsi10" => "Produk handmade 100% asli dari Bali, mendukung UMKM lokal.",
                "kategori" => "Aksesoris",
                "berat" => "500 gram",
                "bahan" => "Rotan alami",
                "asal" => "Bali, Indonesia"
            ]
        ]);
    }
}