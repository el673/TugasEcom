@extends('layout.app')

@section('content')
<center>
    <h1 class="mb-5">Table Barang (dari API)</h1>
</center>

<a href="/barang/create" class="btn btn-primary mb-2">+Tambah Data</a>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Jumlah Produk</th>
            <th scope="col">Harga Produk</th>
            <th scope="col">Tipe Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="barang-table">
        <!-- Data dari API akan ditampilkan di sini -->
    </tbody>
</table>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/barangs',
            method: 'GET',
            success: function(data) {
                let rows = '';
                data.forEach(function(barang, index) {
                    rows += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${barang.nama_produk}</td>
                        <td>${barang.jumlah_produk}</td>
                        <td>${barang.harga_produk}</td>
                        <td>${barang.tipe ? barang.tipe.nama : '-'}</td>
                        <td>
                            <a href="/barang/${barang.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/barang/${barang.id}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                `;
                });
                $('#barang-table').html(rows);
            },
            error: function(xhr) {
                alert('Gagal memuat data dari API.');
                console.error(xhr.responseText);
            }
        });
    });
</script>
@endsection