@extends('layouts.admin')

@section('title', 'Edit Tipe')
@section('header', 'Edit Tipe')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex justify-end mb-4">
        <a href="{{ route('tipe.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
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

        <form method="POST" action="{{ route('tipe.update', $tipe->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_tipe" class="block text-sm font-medium text-gray-700">Nama Tipe</label>
                <input type="text" name="nama_tipe" id="nama_tipe" value="{{ old('nama_tipe', $tipe->nama_tipe) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    Update Tipe
                </button>
            </div>
        </form>
    </div>
</div>
@endsection