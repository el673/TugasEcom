<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-indigo-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <div class="flex items-center space-x-2 px-4">
                <span class="text-2xl font-extrabold">Admin Panel</span>
            </div>

            <nav class="text-white text-base font-semibold pt-3">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-white py-4 pl-6 nav-item hover:bg-indigo-700 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700' : '' }}">
                    <span class="ml-2">Dashboard</span>
                </a>

                <a href="{{ route('barang.index') }}" class="flex items-center text-white py-4 pl-6 nav-item hover:bg-indigo-700 rounded {{ request()->routeIs('barang.*') ? 'bg-indigo-700' : '' }}">
                    <span class="ml-2">Kelola Barang</span>
                </a>

                <a href="{{ route('tipe.index') }}" class="flex items-center text-white py-4 pl-6 nav-item hover:bg-indigo-700 rounded {{ request()->routeIs('tipe.*') ? 'bg-indigo-700' : '' }}">
                    <span class="ml-2">Kelola Tipe</span>
                </a>

                <a href="{{ route('admin.users') }}" class="flex items-center text-white py-4 pl-6 nav-item hover:bg-indigo-700 rounded {{ request()->routeIs('admin.users') ? 'bg-indigo-700' : '' }}">
                    <span class="ml-2">Kelola Users</span>
                </a>
            </nav>

            <div class="px-6 pt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-900">@yield('header', 'Dashboard')</h1>
                    <button class="md:hidden" onclick="toggleSidebar()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-8">
                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.bg-indigo-800');
            sidebar.classList.toggle('-translate-x-full');
        }

        // Add smooth scrolling to anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const element = document.querySelector(this.getAttribute('href'));
                if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>