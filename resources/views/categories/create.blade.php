<x-app-layout>
    <x-slot name="header">Add Category</x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="glass-card rounded-2xl border border-yellow-500/20 p-8">
            <h3 class="text-xl font-semibold text-white mb-6 text-center">Tambah Kategori Baru</h3>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Name <span class="text-yellow-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white">
                    @error('name')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-3 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white">{{ old('description') }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('categories.index') }}" 
                       class="px-6 py-2.5 border border-yellow-500/30 hover:bg-yellow-500/10 text-gray-300 rounded-xl transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-black font-medium rounded-xl transition transform hover:scale-105">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>