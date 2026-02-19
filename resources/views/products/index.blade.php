<x-app-layout>
    <x-slot name="header">Products</x-slot>

    <div class="glass-card rounded-xl border border-yellow-500/10">
        <div class="px-6 py-4 border-b border-yellow-500/10 flex justify-between items-center">
            <h3 class="font-medium text-white">Semua Produk</h3>
            @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black text-sm font-medium rounded-lg transition transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/></svg>
                Tambah Produk
            </a>
            @endif
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-black/30 border-b border-yellow-500/10">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Gambar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Stok</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-yellow-500/10">
                        @foreach($products as $product)
                        <tr class="hover:bg-yellow-500/5 transition">
                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="h-10 w-10 object-cover rounded-lg">
                                @else
                                    <div class="h-10 w-10 bg-yellow-500/10 rounded-lg flex items-center justify-center text-yellow-400">—</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-white">{{ $product->name }}</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-500/10 text-yellow-400 rounded-full text-xs">{{ $product->category->name }}</span></td>
                            <td class="px-6 py-4 text-gray-300">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 {{ $product->stock > 10 ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }} rounded-full text-xs">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('products.show', $product) }}" class="text-gray-400 hover:text-yellow-400 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    @if(auth()->user()->hasRole('admin'))
                                    <a href="{{ route('products.edit', $product) }}" class="text-gray-400 hover:text-yellow-400 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-400 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>