<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>
</head>
<body>
    <h1>{{ $judul }}</h1>
    
    <h2>Informasi Pembeli</h2>
    <p>Nama: {{ $pembeli }}</p>
    <p>Alamat: {{ $alamat }}</p>

    <h2>Metode Pengiriman</h2>
    <p>{{ $pengiriman }}</p>

    <h2>Metode Pembayaran</h2>
    <p>{{ $pembayaran }}</p>

    <h2>Produk yang Dibeli</h2>
    <ul>
        <li>{{ $produk1 }}</li>
        <li>{{ $produk2 }}</li>
        <li>{{ $produk3 }}</li>
        <li>{{ $produk4 }}</li>
        <li>{{ $produk5 }}</li>
        <li>{{ $produk6 }}</li>
        <li>{{ $produk7 }}</li>
        <li>{{ $produk8 }}</li>
        <li>{{ $produk9 }}</li>
        <li>{{ $produk10 }}</li>
    </ul>
</body>
</html>