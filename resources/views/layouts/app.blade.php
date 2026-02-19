<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'InvestoryApp') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0A0A0A; }
        /* Glassmorphism */
        .glass {
            background: rgba(20, 20, 20, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(212, 175, 55, 0.15); /* emas lebih kalem */
        }
        .glass-card {
            background: rgba(20, 20, 20, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(212, 175, 55, 0.1);
        }
        /* Animations */
        .fade-in { animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        .slide-in { animation: slideIn 0.3s ease-out; }
        @keyframes slideIn { from { transform: translateX(-100%); } to { transform: translateX(0); } }
    </style>
</head>
<body class="text-gray-200 antialiased">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass border-b border-yellow-500/10">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Left: logo & menu toggle -->
                <div class="flex items-center">
                    <button id="sidebarToggle" class="p-2 rounded-lg hover:bg-yellow-500/10 transition">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="ml-4 flex items-center space-x-2">
                        <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <span class="text-black font-bold">I</span>
                        </div>
                        <span class="font-semibold text-lg text-white">Investory</span>
                    </div>
                </div>

                <!-- Right: user menu -->
                <div class="flex items-center space-x-4">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-yellow-500/10 transition">
                            <div class="w-8 h-8 rounded-full bg-yellow-500/20 flex items-center justify-center">
                                @if(Auth::user()->profile && Auth::user()->profile->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->profile->avatar) }}" class="w-8 h-8 rounded-full object-cover">
                                @else
                                    <span class="text-yellow-400 font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                @endif
                            </div>
                            <span class="hidden md:block text-sm text-gray-300">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-cloak class="absolute right-0 mt-2 w-48 glass rounded-lg shadow-lg py-1 border border-yellow-500/20 z-50">
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-yellow-500/10">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-yellow-500/10">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar (collapsible) -->
    <aside id="sidebar" class="fixed left-0 top-16 bottom-0 w-64 glass border-r border-yellow-500/10 transform -translate-x-full transition-transform duration-300 ease-in-out z-40">
        <div class="flex flex-col h-full p-4">
            <nav class="flex-1 space-y-1">
                <div class="text-xs font-medium text-gray-500 uppercase tracking-wider px-3 mb-2">Menu</div>
                <a href="{{ route('dashboard') }}" class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-yellow-500/10 text-yellow-400' : 'text-gray-400 hover:bg-yellow-500/10 hover:text-yellow-400' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('products.index') }}" class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('products.*') ? 'bg-yellow-500/10 text-yellow-400' : 'text-gray-400 hover:bg-yellow-500/10 hover:text-yellow-400' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Products
                </a>
                <a href="{{ route('categories.index') }}" class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('categories.*') ? 'bg-yellow-500/10 text-yellow-400' : 'text-gray-400 hover:bg-yellow-500/10 hover:text-yellow-400' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    Categories
                </a>
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff'))
                <a href="{{ route('transactions.index') }}" class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('transactions.*') ? 'bg-yellow-500/10 text-yellow-400' : 'text-gray-400 hover:bg-yellow-500/10 hover:text-yellow-400' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    Transactions
                </a>
                @endif
                <a href="{{ route('profile.show') }}" class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('profile.*') ? 'bg-yellow-500/10 text-yellow-400' : 'text-gray-400 hover:bg-yellow-500/10 hover:text-yellow-400' }} transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Profile
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main id="mainContent" class="pt-16 min-h-screen transition-all duration-300">
        <div class="p-6 lg:p-8">
            <!-- Header dengan jam real-time -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-white">{{ $header ?? 'Dashboard' }}</h1>
                <div class="text-sm text-gray-400" id="real-time-clock"></div>
            </div>

            <!-- Notifikasi -->
            @if(session('success'))
                <div class="mb-6 p-4 glass-card border border-yellow-500/30 text-yellow-400 rounded-lg fade-in">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 p-4 glass-card border border-red-500/30 text-red-400 rounded-lg fade-in">
                    {{ session('error') }}
                </div>
            @endif

            {{ $slot }}
        </div>
    </main>

    <script>
        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('mainContent');
        const toggle = document.getElementById('sidebarToggle');
        let sidebarOpen = false;

        toggle.addEventListener('click', () => {
            sidebarOpen = !sidebarOpen;
            if (sidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                main.classList.add('lg:ml-64');
            } else {
                sidebar.classList.add('-translate-x-full');
                main.classList.remove('lg:ml-64');
            }
        });

        // Real-time clock
        function updateClock() {
            const now = new Date();
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const dayName = days[now.getDay()];
            const day = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('real-time-clock').innerText = `${dayName}, ${day} ${month} ${year} ${hours}:${minutes}:${seconds}`;
        }
        updateClock();
        setInterval(updateClock, 1000);
    </script>
    <!-- Alpine.js untuk dropdown -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>