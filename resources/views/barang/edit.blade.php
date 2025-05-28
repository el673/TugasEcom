<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Edit Barang</h2>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-800">Back to Dashboard</a>
            </div>

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
                    <label for="jumlah_produk" class="block text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" name="jumlah_produk" id="jumlah_produk" value="{{ old('jumlah_produk', $barang->jumlah_produk) }}" required
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

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>