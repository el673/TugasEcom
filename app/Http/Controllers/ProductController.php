<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Barang::with('tipe')->get();
        return view('user.products', compact('products'));
    }
}
