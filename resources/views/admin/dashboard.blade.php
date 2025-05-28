@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Summary Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Barang Statistics</h3>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-indigo-50 p-4 rounded-lg">
                <p class="text-sm text-gray-600">Total Barang</p>
                <p class="text-2xl font-bold text-indigo-600">{{ \App\Models\Barang::count() }}</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
                <p class="text-sm text-gray-600">Total Stock</p>
                <p class="text-2xl font-bold text-green-600">{{ \App\Models\Barang::sum('stok') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">User Statistics</h3>
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-purple-50 p-4 rounded-lg">
                <p class="text-sm text-gray-600">Total Users</p>
                <p class="text-2xl font-bold text-purple-600">{{ \App\Models\User::count() }}</p>
            </div>
            <div class="bg-blue-50 p-4 rounded-lg">
                <p class="text-sm text-gray-600">Total Tipe</p>
                <p class="text-2xl font-bold text-blue-600">{{ \App\Models\Tipe::count() }}</p>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-white rounded-lg shadow p-6 md:col-span-2">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('barang.create') }}" class="bg-indigo-600 text-white p-4 rounded-lg text-center hover:bg-indigo-700">
                Add New Barang
            </a>
            <a href="{{ route('tipe.create') }}" class="bg-purple-600 text-white p-4 rounded-lg text-center hover:bg-purple-700">
                Add New Tipe
            </a>
            <a href="{{ route('barang.index') }}" class="bg-blue-600 text-white p-4 rounded-lg text-center hover:bg-blue-700">
                Manage Barang
            </a>
            <a href="{{ route('admin.users') }}" class="bg-green-600 text-white p-4 rounded-lg text-center hover:bg-green-700">
                Manage Users
            </a>
        </div>
    </div>
</div>
@endsection