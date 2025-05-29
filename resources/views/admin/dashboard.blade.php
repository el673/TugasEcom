@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Barang Statistics -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-xl p-6">
            <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-4">Barang Statistics</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-6 rounded-xl border border-indigo-100">
                    <p class="text-sm font-medium text-gray-600">Total Barang</p>
                    <p class="text-3xl font-bold text-indigo-600">{{ \App\Models\Barang::count() }}</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-emerald-100 p-6 rounded-xl border border-green-100">
                    <p class="text-sm font-medium text-gray-600">Total Stock</p>
                    <p class="text-3xl font-bold text-green-600">{{ \App\Models\Barang::sum('stok') }}</p>
                </div>
            </div>
        </div>

        <!-- User Statistics -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-xl p-6">
            <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-4">User Statistics</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-100">
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-3xl font-bold text-purple-600">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-indigo-100 p-6 rounded-xl border border-blue-100">
                    <p class="text-sm font-medium text-gray-600">Total Tipe</p>
                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Tipe::count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-xl p-6">
        <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('barang.create') }}"
                class="block p-4 rounded-lg text-center text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all shadow-md hover:shadow-lg">
                Tambah Barang Baru
            </a>
            <a href="{{ route('tipe.create') }}"
                class="block p-4 rounded-lg text-center text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 transition-all shadow-md hover:shadow-lg">
                Tambah Tipe Baru
            </a>
            <a href="{{ route('barang.index') }}"
                class="block p-4 rounded-lg text-center text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 transition-all shadow-md hover:shadow-lg">
                Kelola Barang
            </a>
            <a href="{{ route('admin.users') }}"
                class="block p-4 rounded-lg text-center text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 transition-all shadow-md hover:shadow-lg">
                Kelola Users
            </a>
        </div>
    </div>
</div>
@endsection