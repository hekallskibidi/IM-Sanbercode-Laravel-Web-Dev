<x-app-layout>
    <x-slot name="header">Create Transaction</x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="glass-card rounded-2xl border border-yellow-500/20 p-8">
            <h3 class="text-xl font-semibold text-white mb-6 text-center">Tambah Transaksi Baru</h3>

            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf

                <!-- Product -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Product <span class="text-yellow-500">*</span></label>
                    <select name="product_id" required
                            class="w-full px-4 py-3 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white">
                        <option value="" class="bg-gray-900">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" class="bg-gray-900" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} (Stock: {{ $product->stock }})
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>

                <!-- Transaction Type -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Transaction Type <span class="text-yellow-500">*</span></label>
                    <select name="type" required
                            class="w-full px-4 py-3 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white">
                        <option value="in" class="bg-gray-900">Stock In (Masuk)</option>
                        <option value="out" class="bg-gray-900">Stock Out (Keluar)</option>
                    </select>
                </div>

                <!-- Quantity -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Quantity <span class="text-yellow-500">*</span></label>
                    <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}" required
                           class="w-full px-4 py-3 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white">
                    @error('quantity')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>

                <!-- Transaction Date -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Transaction Date <span class="text-yellow-500">*</span></label>
                    <input type="date" name="transaction_date" value="{{ old('transaction_date', date('Y-m-d')) }}" required
                           class="w-full px-4 py-3 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white">
                </div>

                <!-- Notes -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Notes</label>
                    <textarea name="notes" rows="3"
                              class="w-full px-4 py-3 bg-black/50 border border-yellow-500/30 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-white">{{ old('notes') }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('transactions.index') }}" 
                       class="px-6 py-2.5 border border-yellow-500/30 hover:bg-yellow-500/10 text-gray-300 rounded-xl transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-black font-medium rounded-xl transition transform hover:scale-105">
                        Create Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>