@extends('layouts.admin')

@section('title', 'Kelola Barang')
@section('header', 'Kelola Barang')

@section('content')
<div class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Barang</h2>
        <a href="{{ route('barang.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Tambah Barang Baru
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asal Daerah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($barangs as $barang)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $barang->nama_produk }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($barang->harga_produk, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $barang->stok }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $barang->tipe->nama_tipe ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $barang->asal_daerah }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('barang.edit', $barang->id) }}" class="text-indigo-600 hover:text-indigo-900">Ubah</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                        Tidak ada data barang
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection