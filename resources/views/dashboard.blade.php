<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Products -->
        <div class="glass-card rounded-xl p-6 hover:border-yellow-500/30 transition fade-in">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400 mb-1">Total Products</p>
                    <p class="text-3xl font-semibold text-white">{{ \App\Models\Product::count() }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-500/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
            </div>
            <a href="{{ route('products.index') }}" class="inline-block mt-4 text-sm text-yellow-400 hover:text-yellow-300 transition">View all →</a>
        </div>

        <!-- Categories -->
        <div class="glass-card rounded-xl p-6 hover:border-yellow-500/30 transition fade-in">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400 mb-1">Total Categories</p>
                    <p class="text-3xl font-semibold text-white">{{ \App\Models\Category::count() }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-500/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
            </div>
            <a href="{{ route('categories.index') }}" class="inline-block mt-4 text-sm text-yellow-400 hover:text-yellow-300 transition">View all →</a>
        </div>

        <!-- Transactions -->
        <div class="glass-card rounded-xl p-6 hover:border-yellow-500/30 transition fade-in">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400 mb-1">Total Transactions</p>
                    <p class="text-3xl font-semibold text-white">{{ \App\Models\Transaction::count() }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-500/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                </div>
            </div>
            <a href="{{ route('transactions.index') }}" class="inline-block mt-4 text-sm text-yellow-400 hover:text-yellow-300 transition">View all →</a>
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="glass-card rounded-xl p-8 fade-in">
        <h2 class="text-2xl font-semibold text-white mb-2">Selamat datang, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-400 mb-6">Kelola inventaris Anda dengan mudah dan efisien.</p>
        <div class="flex flex-wrap gap-4">
            @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('products.create') }}" class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-black font-medium rounded-lg transition transform hover:scale-105">
                + Tambah Produk
            </a>
            <a href="{{ route('categories.create') }}" class="px-5 py-2.5 glass border border-yellow-500/30 hover:bg-yellow-500/10 text-yellow-400 font-medium rounded-lg transition transform hover:scale-105">
                + Tambah Kategori
            </a>
            @endif
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff'))
            <a href="{{ route('transactions.create') }}" class="px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-black font-medium rounded-lg transition transform hover:scale-105">
                + Transaksi Baru
            </a>
            @endif
        </div>
    </div>
</x-app-layout>