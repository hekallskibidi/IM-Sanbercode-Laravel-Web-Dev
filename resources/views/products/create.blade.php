<x-app-layout>
    <x-slot name="header">Tambah Produk</x-slot>

    <div class="max-w-2xl mx-auto glass-card rounded-2xl overflow-hidden">
        <div class="px-8 py-5 border-b border-gold-border/20">
            <h3 class="font-medium gold-text">Informasi Produk</h3>
        </div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf

            <!-- Nama -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Nama Produk <span class="gold-text">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl focus:ring-2 focus:ring-gold-text focus:border-transparent text-white placeholder-gray-500 @error('name') border-red-500 @enderror">
                @error('name')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <!-- Kategori -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Kategori <span class="gold-text">*</span></label>
                <select name="category_id" required
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl focus:ring-2 focus:ring-gold-text focus:border-transparent text-white">
                    <option value="" class="bg-gray-800">Pilih kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }} class="bg-gray-800">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Deskripsi</label>
                <textarea name="description" rows="3"
                          class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl focus:ring-2 focus:ring-gold-text focus:border-transparent text-white placeholder-gray-500">{{ old('description') }}</textarea>
            </div>

            <!-- Harga & Stok -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Harga (Rp) <span class="gold-text">*</span></label>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" required
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl focus:ring-2 focus:ring-gold-text focus:border-transparent text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Stok <span class="gold-text">*</span></label>
                    <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl focus:ring-2 focus:ring-gold-text focus:border-transparent text-white">
                </div>
            </div>

            <!-- Gambar -->
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-300 mb-2">Gambar Produk</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gold-bg file:text-black file:font-medium hover:file:bg-opacity-90 text-gray-300">
                <p class="mt-2 text-xs text-gray-500">Format: JPG, PNG, GIF. Maks 2MB</p>
                @error('image')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <!-- Tombol -->
            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('products.index') }}" class="px-6 py-3 border border-gold-border/30 text-gold-text rounded-xl hover:bg-gold-bg-light transition">Batal</a>
                <button type="submit" class="px-6 py-3 gold-bg text-black font-medium rounded-xl hover:bg-opacity-90 transition transform hover:scale-105">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>