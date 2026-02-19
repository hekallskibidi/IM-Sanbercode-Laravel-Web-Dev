<x-app-layout>
    <x-slot name="header">My Profile</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="glass-card rounded-xl border border-yellow-500/10 overflow-hidden">
            <!-- Header dengan avatar -->
            <div class="relative h-32 bg-gradient-to-r from-yellow-500/20 to-black"></div>
            <div class="px-8 pb-8">
                <div class="flex flex-col md:flex-row items-start md:items-end -mt-12">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full border-4 border-black bg-yellow-500/20 flex items-center justify-center">
                            @if($user->profile && $user->profile->avatar)
                                <img src="{{ asset('storage/' . $user->profile->avatar) }}" class="w-24 h-24 rounded-full object-cover">
                            @else
                                <span class="text-4xl font-bold text-yellow-400">{{ substr($user->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <div class="absolute bottom-0 right-0 w-5 h-5 bg-green-500 rounded-full border-2 border-black"></div>
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-6">
                        <h2 class="text-2xl font-bold text-white">{{ $user->name }}</h2>
                        <p class="text-yellow-400">{{ $user->email }}</p>
                        <span class="inline-block mt-1 px-3 py-1 bg-yellow-500/10 text-yellow-400 text-xs rounded-full">
                            {{ ucfirst($user->roles->first()->name ?? 'User') }}
                        </span>
                    </div>
                </div>

                <!-- Detail Profil -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <div class="glass p-4 rounded-lg">
                        <label class="text-xs font-medium text-gray-400 uppercase">Phone</label>
                        <p class="mt-1 text-white">{{ $user->profile->phone ?? '-' }}</p>
                    </div>
                    <div class="glass p-4 rounded-lg">
                        <label class="text-xs font-medium text-gray-400 uppercase">Birth Date</label>
                        <p class="mt-1 text-white">
                            {{ $user->profile && $user->profile->birth_date ? \Carbon\Carbon::parse($user->profile->birth_date)->format('d M Y') : '-' }}
                        </p>
                    </div>
                    <div class="glass p-4 rounded-lg">
                        <label class="text-xs font-medium text-gray-400 uppercase">Gender</label>
                        <p class="mt-1 text-white">{{ $user->profile && $user->profile->gender ? ucfirst($user->profile->gender) : '-' }}</p>
                    </div>
                    <div class="glass p-4 rounded-lg">
                        <label class="text-xs font-medium text-gray-400 uppercase">Member Since</label>
                        <p class="mt-1 text-white">{{ $user->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mt-6 glass p-4 rounded-lg">
                    <label class="text-xs font-medium text-gray-400 uppercase">Address</label>
                    <p class="mt-1 text-white">{{ $user->profile->address ?? '-' }}</p>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('profile.edit') }}" class="px-6 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-black font-medium rounded-lg transition transform hover:scale-105">
                        Edit Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-6 py-2.5 glass border border-yellow-500/30 hover:bg-yellow-500/10 text-yellow-400 font-medium rounded-lg transition transform hover:scale-105">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>