<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin')->except(['index', 'show']);
    }

    public function index()
    {
        $barangs = Barang::with('tipe')->orderBy('nama_produk')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $tipes = Tipe::orderBy('nama_tipe')->get();
        return view('barang.create', compact('tipes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric|min:0',
            'jumlah_produk' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'id_tipe' => 'required|exists:tipes,id',
            'asal_daerah' => 'required|string|max:255'
        ]);

        Barang::create($validatedData);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = Barang::with('tipe')->findOrFail($id);

        if (request()->expectsJson()) {
            return response()->json($barang);
        }

        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $tipes = Tipe::orderBy('nama_tipe')->get();
        return view('barang.edit', compact('barang', 'tipes'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric|min:0',
            'jumlah_produk' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'id_tipe' => 'required|exists:tipes,id',
            'asal_daerah' => 'required|string|max:255'
        ]);

        $barang->update($validatedData);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
