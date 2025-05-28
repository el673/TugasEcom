<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        return view('checkout', [
            "judul" => "Checkout",
            "pembeli" => "Budi Santoso",
            "alamat" => "Jl. Merdeka No. 123, Jakarta",
            "pengiriman" => "JNE - Reguler",
            "pembayaran" => "Transfer Bank - BCA",
            "produk1" => "Tas Rotan Bali",
            "produk2" => "Lukisan Batik Motif Wayang",
            "produk3" => "Patung Kayu Ukiran Bali",
            "produk4" => "Anyaman Bambu Serbaguna",
            "produk5" => "Sarung Batik Klasik",
            "produk6" => "Topeng Kayu Tradisional",
            "produk7" => "Dompet Tenun Handmade",
            "produk8" => "Gelang Manik-Manik Khas Dayak",
            "produk9" => "Keramik Motif Klasik",
            "produk10" => "Kain Tenun Ikat Flores"
        ]);
    }
}