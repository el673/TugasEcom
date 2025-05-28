@extends('layout.app')

@section('content')
<center>
    <h1 class="mb-5">Table Barang</h1>
</center>
@if (session()->has('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<a href="barang/create" class="btn btn-primary mb-2">+Tambah Data</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Jumlah Produk</th>
            <th scope="col">Harga Produk</th>
            <th scope="col">Tipe Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    @foreach ($barangs as $barang)
    <tbody>
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $barang->nama_produk }}</td>
            <td>{{ $barang->jumlah_produk }}</td>
            <td>{{ $barang->harga_produk }}</td>
            <td>{{ optional($barang->tipe)->nama }}</td>
            <td>
                <a href="/barang/{{$barang->id}}/edit" class="btn btn-warning">Edit</a>
                <form action="/barang/{{$barang->id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="sumbit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection