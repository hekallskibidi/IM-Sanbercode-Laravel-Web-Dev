<x-app-layout>
    <x-slot name="header">Transactions</x-slot>

    <div class="glass-card rounded-xl border border-yellow-500/10">
        <div class="px-6 py-4 border-b border-yellow-500/10 flex justify-between items-center">
            <h3 class="font-medium text-white">Riwayat Transaksi</h3>
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff'))
            <a href="{{ route('transactions.create') }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black text-sm font-medium rounded-lg transition transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/></svg>
                Transaksi Baru
            </a>
            @endif
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-black/30 border-b border-yellow-500/10">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Tipe</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-yellow-500/10">
                        @forelse($transactions as $transaction)
                        <tr class="hover:bg-yellow-500/5 transition">
                            <td class="px-6 py-4 text-gray-300">{{ $transaction->transaction_date->format('d M Y') }}</td>
                            <td class="px-6 py-4 font-medium text-white">{{ $transaction->product->name }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full {{ $transaction->type === 'in' ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                                    {{ strtoupper($transaction->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-300">{{ $transaction->quantity }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $transaction->user->name }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('transactions.show', $transaction) }}" class="text-gray-400 hover:text-yellow-400 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                Belum ada transaksi. 
                                <a href="{{ route('transactions.create') }}" class="text-yellow-400 hover:underline">Buat transaksi baru</a>.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>