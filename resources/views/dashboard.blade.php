@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-100 to-purple-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-xl p-8 mb-8">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Welcome, {{ auth()->user()->name }}!</h1>
            <p class="text-gray-600 mt-2">Selamat datang di Kerajinan Lokal.</p>
        </div>

        <!-- Products Section -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-xl p-8">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-6">Daftar Produk Kerajinan Lokal</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gradient-to-r from-indigo-50 to-purple-50">
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama Produk</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tipe</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Asal Daerah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach(\App\Models\Barang::with('tipe')->get() as $product)
                        <tr class="hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $product->nama_produk }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                Rp {{ number_format($product->harga_produk, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $product->stok }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $product->tipe->nama }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $product->asal_daerah }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection