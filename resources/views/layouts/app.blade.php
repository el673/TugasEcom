<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Kerajinan Lokal') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">
                            Kerajinan Lokal
                        </a>
                    </div>

                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('products.index') }}"
                            class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Produk
                        </a>
                    </div>
                </div>

                <div class="flex items-center">
                    @auth
                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Admin Panel
                    </a>
                    @endif
                    <div class="ml-3 relative">
                        <span class="text-gray-600 mr-4">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                                Logout
                            </button>
                        </form>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Login
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mb-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        </div>
        @endif

        @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div>
        @endif

        @yield('content')
    </main>
</body>

</html>