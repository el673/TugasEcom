<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        return view('produk', [
            "judul" => "Daftar Produk Kerajinan Lokal",
            "produk1" => "Tas Rotan Bali",
            "produk2" => "Gelang Manik-Manik Khas Dayak",
            "produk3" => "Lukisan Batik Motif Wayang",
            "produk4" => "Dompet Tenun Handmade",
            "produk5" => "Keramik Motif Klasik",
            "produk6" => "Topeng Kayu Tradisional",
            "produk7" => "Kain Tenun Ikat Flores",
            "produk8" => "Patung Kayu Ukiran Bali",
            "produk9" => "Anyaman Bambu Serbaguna",
            "produk10" => "Sarung Batik Klasik"
        ]);
    }
}