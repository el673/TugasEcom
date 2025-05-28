<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('barang.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }
        return view('barang.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('barang.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }

        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            // Add other validation rules as needed
        ]);

        Barang::create($validatedData);

        return redirect()->route('barang.index')
            ->with('success', 'Barang created successfully.');
    }

    public function edit($id)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('barang.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }

        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('barang.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }

        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            // Add other validation rules as needed
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($validatedData);

        return redirect()->route('barang.index')
            ->with('success', 'Barang updated successfully.');
    }

    public function destroy($id)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('barang.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }

        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang deleted successfully.');
    }
}
