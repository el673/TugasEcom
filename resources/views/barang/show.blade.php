@extends('layouts.admin')

@section('title', 'Detail Barang')
@section('header', 'Detail Barang')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-end mb-4">
        <a href="{{ route('barang.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
            Back
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="space-y-4">
            <div>
                <h3 class="text-lg font-medium text-gray-700">Nama Produk</h3>
                <p class="mt-1">{{ $barang->nama_produk }}</p>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-700">Harga</h3>
                <p class="mt-1">Rp {{ number_format($barang->harga_produk, 0, ',', '.') }}</p>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-700">Jumlah</h3>
                <p class="mt-1">{{ $barang->jumlah_produk }}</p>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-700">Stok</h3>
                <p class="mt-1">{{ $barang->stok }}</p>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-700">Asal Daerah</h3>
                <p class="mt-1">{{ $barang->asal_daerah ?? 'Tidak ada' }}</p>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-700">Tipe</h3>
                <p class="mt-1">{{ $barang->tipe->nama_tipe ?? 'Tidak ada' }}</p>
            </div>
        </div>

        @if(auth()->user() && auth()->user()->role === 'admin')
        <div class="mt-6 flex space-x-3">
            <a href="{{ route('barang.edit', $barang->id) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Edit
            </a>
            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                    onclick="return confirm('Are you sure you want to delete this item?')">
                    Delete
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection