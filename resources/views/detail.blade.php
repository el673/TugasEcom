<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>
</head>
<body>
    <h1>{{ $judul }}</h1>
    <h2>{{ $produk['nama'] }}</h2>
    <ul>
        <li>{{ $produk['deskripsi1'] }}</li>
        <li>{{ $produk['deskripsi2'] }}</li>
        <li>{{ $produk['deskripsi3'] }}</li>
        <li>{{ $produk['deskripsi4'] }}</li>
        <li>{{ $produk['deskripsi5'] }}</li>
        <li>{{ $produk['deskripsi6'] }}</li>
        <li>{{ $produk['deskripsi7'] }}</li>
        <li>{{ $produk['deskripsi8'] }}</li>
        <li>{{ $produk['deskripsi9'] }}</li>
        <li>{{ $produk['deskripsi10'] }}</li>
    </ul>
    <p>Kategori: {{ $produk['kategori'] }}</p>
    <p>Bahan: {{ $produk['bahan'] }}</p>
    <p>Berat: {{ $produk['berat'] }}</p>
    <p>Asal Produk: {{ $produk['asal'] }}</p>
    <p>Stok: Tersedia</p>
</body>
</html>