@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-body">
        <center>
            <h1>Ubah Data Barang</h1>
        </center>
        <form action="/barang/{{$barang->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_produk">Nama Produk</label>
                <input class="form-control" type="text" name="nama_produk" id="nama_produk" value="{{$barang->nama_produk}}">
            </div>
            <div class="mb-3">
                <label for="jumlah_produk">Jumlah Produk</label>
                <input class="form-control" type="text" name="jumlah_produk" id="jumlah_produk" value="{{$barang->jumlah_produk}}">
            </div>
            <div class="mb-3">
                <label for="harga_produk">Harga Produk</label>
                <input class="form-control" type="text" name="harga_produk" id="harga_produk" value="{{$barang->harga_produk}}">
            </div>
            <div class="mb-3">
                <label for="id_tipe">Tipe Produk</label>
                <select class="form-control" name="id_tipe" id="id_tipe">
                    @foreach ($tipes as $tipe)
                    <option value="{{ $tipe->id }}" {{$barang->id_tipe == $tipe->id ? 'selected' : ''}}>{{ $tipe->nama}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">+ UBAH DATA</button>
        </form>
    </div>
</div>
@endsection