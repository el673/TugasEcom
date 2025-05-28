@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600">Selamat datang di Kerajinan Lokal.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Produk Kerajinan Lokal</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asal Daerah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(\App\Models\Barang::with('tipe')->get() as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->nama_produk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->stok }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->tipe->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->asal_daerah }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection