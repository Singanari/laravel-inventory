<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Inventaris Gudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-blue-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-white text-xl font-bold">Sistem Inventaris Gudang</h1>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('welcome') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    <a href="{{ route('kategori.index') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium">Kategori</a>
                    <a href="{{ route('supplier.index') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium">Supplier</a>
                    <a href="{{ route('barang.index') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium">Barang</a>
                    <a href="{{ route('transaksi.index') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium">Transaksi</a>
                    
                    @auth
                        <div class="relative">
                            <span class="text-white text-sm">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline ml-4">
                                @csrf
                                <button type="submit" class="text-white hover:text-blue-200 text-sm">Logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="{{ route('register') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Sistem Inventaris Gudang. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 