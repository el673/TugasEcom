@extends('layouts.admin')

@section('title', 'Edit Barang')
@section('header', 'Edit Barang')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-end mb-4">
        <a href="{{ route('barang.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
            Back
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('barang.update', $barang->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $barang->nama_produk) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="harga_produk" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga_produk" id="harga_produk" value="{{ old('harga_produk', $barang->harga_produk) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="jumlah_produk" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="jumlah_produk" id="jumlah_produk" value="{{ old('jumlah_produk', $barang->jumlah_produk) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" id="stok" value="{{ old('stok', $barang->stok) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="asal_daerah" class="block text-sm font-medium text-gray-700">Asal Daerah</label>
                <input type="text" name="asal_daerah" id="asal_daerah" value="{{ old('asal_daerah', $barang->asal_daerah) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="id_tipe" class="block text-sm font-medium text-gray-700">Tipe</label>
                <select name="id_tipe" id="id_tipe" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select Tipe</option>
                    @foreach(\App\Models\Tipe::all() as $tipe)
                    <option value="{{ $tipe->id }}" {{ (old('id_tipe', $barang->id_tipe) == $tipe->id) ? 'selected' : '' }}>
                        {{ $tipe->nama_tipe }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('barang.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    Back
                </a>
                <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    Update Barang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection