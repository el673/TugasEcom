<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index(){
        return view('keranjang', [
            "judul" => "Keranjang Belanja",
            "produk1" => "Tas Rotan Bali 150000 jumlah 2",
            "produk2" => "Lukisan Batik Motif Wayang 250000 jumlah 1",
            "produk3" => "Patung Kayu Ukiran Bali 400000 jumlah 1",
            "produk4" => "Anyaman Bambu Serbaguna 120000 jumlah 3",
            "produk5" => "Gelang Manik-Manik Khas Dayak 75000 jumlah 4",
            "produk6" => "Dompet Tenun Handmade 100000 jumlah 2",
            "produk7" => "Topeng Kayu Tradisional 180000 jumlah 1",
            "produk8" => "Kain Tenun Ikat Flores 300000 jumlah 2",
            "produk9" => "Keramik Motif Klasik 200000 jumlah 1",
            "produk10" => "Sarung Batik Klasik 220000 jumlah 2",
        ]);
    }
}