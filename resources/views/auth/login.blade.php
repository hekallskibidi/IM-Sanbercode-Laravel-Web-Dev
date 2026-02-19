<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'InvestoryApp') }} - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0A0A0A; }
        .glass {
            background: rgba(30, 30, 30, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 215, 0, 0.2);
        }
        .glass-card {
            background: rgba(30, 30, 30, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 215, 0, 0.15);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Animated background pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_top_right,_#FFD700_0%,_transparent_50%)]"></div>
        <div class="absolute bottom-0 right-0 w-full h-full bg-[radial-gradient(ellipse_at_bottom_left,_#FFD700_0%,_transparent_50%)]"></div>
    </div>

    <div class="relative z-10 w-full max-w-lg">
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-3xl mb-4 shadow-xl">
                <span class="text-black text-4xl font-bold">I</span>
            </div>
            <h2 class="text-4xl font-bold text-white">InvestoryApp</h2>
            <p class="text-gray-400 mt-2 text-lg">Masuk ke akun Anda</p>
        </div>

        <!-- Card Login (lebih panjang/lebar) -->
        <div class="glass rounded-3xl p-8 shadow-2xl">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-5 py-4 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white placeholder-gray-500 text-base"
                           placeholder="admin@investory.com">
                    @error('email')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-5 py-4 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white placeholder-gray-500 text-base"
                           placeholder="••••••••">
                    @error('password')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between mb-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-600 bg-black/50 text-yellow-500 focus:ring-yellow-500 w-4 h-4">
                        <span class="ml-2 text-sm text-gray-300">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-yellow-400 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-black font-semibold py-4 px-4 rounded-xl transition transform hover:scale-105 text-lg">
                    LOG IN
                </button>
            </form>

            <!-- Register Link -->
            <div class="text-center mt-8 pt-6 border-t border-yellow-500/20">
                <p class="text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-yellow-400 hover:underline font-medium">
                        Daftar sekarang
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-gray-500 text-sm mt-8">
            &copy; {{ date('Y') }} InvestoryApp. All rights reserved.
        </p>
    </div>
</body>
</html>