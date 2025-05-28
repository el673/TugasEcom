@extends('layout.app')

@section('content')
<center><h1 class="mb-5">Table Tipe</h1></center>
<a href="" class="btn btn-primary mb-2">+Tambah Data</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama Tipe</th>
            <th>Aksi</th>
        </tr>
    </thead>
    @foreach ($tipes as $tipe)
    <tbody>
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{ $tipe->nama}}</td>
            <td>
                <a href="" class="btn btn-warning">Edit</a>
                <form action="" class="d-inline">
                    <button type="sumbit" class= "btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection