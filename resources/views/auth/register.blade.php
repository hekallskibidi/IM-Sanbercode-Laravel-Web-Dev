<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'InvestoryApp') }} - Register</title>
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
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 right-0 w-full h-full bg-[radial-gradient(ellipse_at_top_left,_#FFD700_0%,_transparent_50%)]"></div>
        <div class="absolute bottom-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_bottom_right,_#FFD700_0%,_transparent_50%)]"></div>
    </div>

    <div class="relative z-10 w-full max-w-lg">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-3xl mb-4 shadow-xl">
                <span class="text-black text-4xl font-bold">I</span>
            </div>
            <h2 class="text-4xl font-bold text-white">InvestoryApp</h2>
            <p class="text-gray-400 mt-2 text-lg">Buat akun baru</p>
        </div>

        <div class="glass rounded-3xl p-8 shadow-2xl">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nama Depan</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required
                               class="w-full px-5 py-4 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white placeholder-gray-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nama Belakang</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required
                               class="w-full px-5 py-4 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white placeholder-gray-500">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-5 py-4 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white placeholder-gray-500 @error('email') border-red-500 @enderror"
                           placeholder="nama@investory.com">
                    @error('email')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-5 py-4 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white placeholder-gray-500 @error('password') border-red-500 @enderror"
                           placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full px-5 py-4 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white placeholder-gray-500"
                           placeholder="Ketik ulang password">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-black font-semibold py-4 px-4 rounded-xl transition transform hover:scale-105 text-lg">
                    DAFTAR
                </button>
            </form>

            <div class="text-center mt-8 pt-6 border-t border-yellow-500/20">
                <p class="text-gray-400">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-yellow-400 hover:underline font-medium">
                        Login di sini
                    </a>
                </p>
            </div>
        </div>

        <p class="text-center text-gray-500 text-sm mt-8">
            &copy; {{ date('Y') }} InvestoryApp. All rights reserved.
        </p>
    </div>
</body>
</html>