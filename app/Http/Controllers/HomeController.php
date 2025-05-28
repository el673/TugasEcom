<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home',[
            //assosiative array
            //key    //value
            "judul" => "Kategori Produk",
            "satu" => "aksesoris",
            "dua" => "dekorasi rumah",
            "tiga" => "tas dan dompet",
            "empat" => "pakaian",
            "lima" => "sepatu",
            "enam" => "mainan anak",
            "tujuh" => "peralatan rumah tangga",
            "delapan" => "kain tradisonal",
            "sembilan" => "kerakmik",
            "sepuluh" => "lukisan",
            "sebelas" => "anyaman",
            "duabelas" => "batik dan tenun"
        ]);
}}