<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Kerajinan Lokal') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-100 to-purple-100">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-sm shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Kerajinan Lokal
                    </a>

                    <div class="hidden sm:ml-8 sm:flex sm:space-x-4">
                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700 hover:text-indigo-600 transition-colors">
                            Produk
                        </a>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-700">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm text-gray-700 hover:text-indigo-600 transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
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