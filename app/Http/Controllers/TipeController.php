<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TipeController extends Controller
{
    public function index()
    {
        $tipe = Tipe::all();
        return view('tipe.index', compact('tipe'));
    }

    public function create()
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('tipe.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }
        return view('tipe.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('tipe.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }

        $validatedData = $request->validate([
            'nama_tipe' => 'required|max:255',
            // Add other validation rules as needed
        ]);

        Tipe::create($validatedData);

        return redirect()->route('tipe.index')
            ->with('success', 'Tipe created successfully.');
    }

    public function edit($id)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('tipe.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }

        $tipe = Tipe::findOrFail($id);
        return view('tipe.edit', compact('tipe'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('tipe.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }

        $validatedData = $request->validate([
            'nama_tipe' => 'required|max:255',
            // Add other validation rules as needed
        ]);

        $tipe = Tipe::findOrFail($id);
        $tipe->update($validatedData);

        return redirect()->route('tipe.index')
            ->with('success', 'Tipe updated successfully.');
    }

    public function destroy($id)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->route('tipe.index')
                ->with('error', 'Unauthorized access. Admin privileges required.');
        }

        $tipe = Tipe::findOrFail($id);
        $tipe->delete();

        return redirect()->route('tipe.index')
            ->with('success', 'Tipe deleted successfully.');
    }
}
