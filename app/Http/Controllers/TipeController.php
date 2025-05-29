<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $tipes = Tipe::orderBy('nama_tipe')->get();
        return view('tipe.index', compact('tipes'));
    }

    public function create()
    {
        return view('tipe.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tipe' => 'required|string|max:255|unique:tipes,nama_tipe'
        ]);

        Tipe::create($validatedData);

        return redirect()->route('tipe.index')
            ->with('success', 'Tipe berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tipe = Tipe::findOrFail($id);
        return view('tipe.edit', compact('tipe'));
    }

    public function update(Request $request, $id)
    {
        $tipe = Tipe::findOrFail($id);

        $validatedData = $request->validate([
            'nama_tipe' => 'required|string|max:255|unique:tipes,nama_tipe,' . $id
        ]);

        $tipe->update($validatedData);

        return redirect()->route('tipe.index')
            ->with('success', 'Tipe berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tipe = Tipe::findOrFail($id);

        // Check if tipe is being used by any barang
        if ($tipe->barangs()->exists()) {
            return redirect()->route('tipe.index')
                ->with('error', 'Tipe tidak dapat dihapus karena sedang digunakan.');
        }

        $tipe->delete();

        return redirect()->route('tipe.index')
            ->with('success', 'Tipe berhasil dihapus.');
    }
}
