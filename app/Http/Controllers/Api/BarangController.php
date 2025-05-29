<?php

namespace App\Http\Controllers\Api;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('is_admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $barang = Barang::with('tipe:id,nama_tipe')
                ->select('id', 'nama_produk', 'jumlah_produk', 'harga_produk', 'id_tipe', 'stok', 'asal_daerah')
                ->get();

            return response()->json(['status' => 'success', 'data' => $barang]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to fetch data'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_produk' => 'required|string',
                'harga_produk' => 'required|numeric',
                'jumlah_produk' => 'required|integer',
                'stok' => 'required|integer',
                'id_tipe' => 'required|exists:tipes,id',
                'asal_daerah' => 'nullable|string'
            ]);

            $barang = Barang::create($validated);
            return response()->json(['status' => 'success', 'data' => $barang], 201);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $barang = Barang::with('tipe')->findOrFail($id);
            return response()->json(['status' => 'success', 'data' => $barang]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Data not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $validated = $request->validate([
                'nama_produk' => 'sometimes|string',
                'harga_produk' => 'sometimes|numeric',
                'jumlah_produk' => 'sometimes|integer',
                'stok' => 'sometimes|integer',
                'id_tipe' => 'sometimes|exists:tipes,id',
                'asal_daerah' => 'nullable|string'
            ]);

            $barang->update($validated);
            return response()->json(['status' => 'success', 'data' => $barang]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Barang::findOrFail($id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete'], 404);
        }
    }
}
