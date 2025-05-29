<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Kerajinan Lokal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-indigo-100 to-purple-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white/80 backdrop-blur-sm rounded-xl shadow-xl p-8">
            <h2 class="text-3xl font-bold text-center bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">Masuk</h2>
            <p class="text-center text-gray-500 mb-8">Silakan masuk untuk melanjutkan</p>

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="mt-1 block w-full rounded-lg bg-gray-100/80 border-transparent focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400"
                            placeholder="Masukkan email Anda">
                    </div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full rounded-lg bg-gray-100/80 border-transparent focus:border-purple-500 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400"
                            placeholder="Masukkan password Anda">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all shadow-md hover:shadow-lg">
                        Masuk Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-medium text-purple-600 hover:text-purple-500 transition-colors">
                        Daftar di sini
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>