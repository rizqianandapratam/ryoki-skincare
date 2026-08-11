<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Statistik &amp; Performa</p>
                <h2 class="font-playfair font-bold text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Marketplace Click Analytics
                </h2>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-xs font-semibold text-emerald-700">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Live Real-Time Tracking
                </span>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- ── 1. SUMMARY METRIC CARDS ── -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Shopee Clicks -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Shopee Official</span>
                    <div class="w-10 h-10 rounded-2xl bg-orange-50 text-[#EE4D2D] flex items-center justify-center font-bold border border-orange-100">
                        🛒
                    </div>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-slate-900 font-heading">{{ number_format($shopeeTotal) }}</div>
                    <div class="text-xs text-slate-500 font-light mt-1">
                        <span class="font-semibold text-emerald-600">+{{ number_format($shopeeToday) }}</span> hari ini
                    </div>
                </div>
            </div>

            <!-- TikTok Clicks -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">TikTok Shop</span>
                    <div class="w-10 h-10 rounded-2xl bg-slate-100 text-slate-900 flex items-center justify-center font-bold border border-slate-200">
                        🎵
                    </div>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-slate-900 font-heading">{{ number_format($tiktokTotal) }}</div>
                    <div class="text-xs text-slate-500 font-light mt-1">
                        <span class="font-semibold text-emerald-600">+{{ number_format($tiktokToday) }}</span> hari ini
                    </div>
                </div>
            </div>

            <!-- WhatsApp CS Clicks -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">WhatsApp CS</span>
                    <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold border border-emerald-100">
                        💬
                    </div>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-slate-900 font-heading">{{ number_format($waTotal) }}</div>
                    <div class="text-xs text-slate-500 font-light mt-1">
                        <span class="font-semibold text-emerald-600">+{{ number_format($waToday) }}</span> hari ini
                    </div>
                </div>
            </div>

            <!-- Total Overall Clicks -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-2xs space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Semua Klik</span>
                    <div class="w-10 h-10 rounded-2xl bg-sky-50 text-[#0284C7] flex items-center justify-center font-bold border border-sky-100">
                        📈
                    </div>
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-slate-900 font-heading">{{ number_format($totalClicks) }}</div>
                    <div class="text-xs text-slate-500 font-light mt-1">
                        <span class="font-semibold text-emerald-600">+{{ number_format($clicksToday) }}</span> hari ini
                    </div>
                </div>
            </div>
        </div>

        <!-- ── 2. BREAKDOWN & LEADERBOARD CARDS ── -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Platform & Location Distribution -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/90 shadow-sm space-y-6">
                <div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">Distribusi Klik per Platform</h3>
                    <p class="text-xs text-slate-400 font-light">Perbandingan jumlah trafik pengunjung ke masing-masing saluran</p>
                </div>

                <div class="space-y-4">
                    @forelse($platformBreakdown as $platform)
                        @php
                            $percentage = $totalClicks > 0 ? round(($platform->total / $totalClicks) * 100, 1) : 0;
                            $colorClass = match(strtolower($platform->platform)) {
                                'shopee' => 'bg-[#EE4D2D]',
                                'tiktok' => 'bg-slate-900',
                                'whatsapp' => 'bg-emerald-500',
                                default => 'bg-sky-500'
                            };
                            $label = match(strtolower($platform->platform)) {
                                'shopee' => 'Shopee Official Store 🛒',
                                'tiktok' => 'TikTok Shop Official 🎵',
                                'whatsapp' => 'WhatsApp CS Consultation 💬',
                                default => ucfirst($platform->platform)
                            };
                        @endphp
                        <div class="space-y-1.5">
                            <div class="flex justify-between text-xs font-semibold text-slate-700">
                                <span>{{ $label }}</span>
                                <span>{{ number_format($platform->total) }} klik ({{ $percentage }}%)</span>
                            </div>
                            <div class="w-full h-3 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full {{ $colorClass }} rounded-full transition-all duration-500" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 text-center py-6">Belum ada data klik platform.</p>
                    @endforelse
                </div>

                <div class="pt-4 border-t border-slate-100">
                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-3">Lokasi Tombol Paling Banyak Diklik</h4>
                    <div class="space-y-2">
                        @foreach($locationBreakdown as $loc)
                            <div class="flex items-center justify-between text-xs py-1.5 px-3 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="font-medium text-slate-700">{{ $loc->button_location }}</span>
                                <span class="font-bold text-[#0284C7]">{{ number_format($loc->total) }} klik</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Top Clicked Products Leaderboard -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/90 shadow-sm space-y-6">
                <div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">Produk Paling Banyak Diklik (Top Leaderboard)</h3>
                    <p class="text-xs text-slate-400 font-light">Produk yang paling banyak menarik perhatian calon pembeli</p>
                </div>

                <div class="space-y-3">
                    @forelse($topProducts as $index => $prod)
                        <div class="flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-slate-100/60 transition-colors">
                            <div class="flex items-center gap-3.5">
                                <div class="w-8 h-8 rounded-xl bg-sky-100 text-[#0284C7] font-bold text-xs flex items-center justify-center shrink-0">
                                    #{{ $index + 1 }}
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">{{ $prod->product_name }}</h4>
                                    <span class="text-[10px] text-slate-400">Total Trafik Produk</span>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-white border border-slate-200 text-xs font-extrabold text-slate-900 shadow-2xs">
                                {{ number_format($prod->total) }} Klik
                            </span>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 text-center py-10">Belum ada data produk diklik.</p>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- ── 3. LIVE RECENT CLICKS TABLE ── -->
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm overflow-hidden space-y-4 p-6 sm:p-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div>
                    <h3 class="text-base font-bold text-slate-900 font-heading">Log Riwayat Klik Terakhir</h3>
                    <p class="text-xs text-slate-400 font-light">Catatan detail aktivitas pengunjung saat mengeklik tombol toko online</p>
                </div>
            </div>

            <div class="overflow-x-auto border border-slate-100 rounded-2xl">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50/80 text-slate-500 font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="py-3.5 px-4">Waktu Klik</th>
                            <th class="py-3.5 px-4">Platform</th>
                            <th class="py-3.5 px-4">Nama Produk</th>
                            <th class="py-3.5 px-4">Lokasi Tombol</th>
                            <th class="py-3.5 px-4">Alamat IP</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentClicks as $click)
                            <tr class="hover:bg-slate-50/60 transition-colors">
                                <td class="py-3.5 px-4 font-medium text-slate-700 whitespace-nowrap">
                                    {{ $click->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i:s') }} WIB
                                </td>
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    @if(strtolower($click->platform) === 'shopee')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-orange-50 border border-orange-200 text-[#EE4D2D] font-bold text-[11px]">
                                            🛒 Shopee
                                        </span>
                                    @elseif(strtolower($click->platform) === 'tiktok')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-900 text-white font-bold text-[11px]">
                                            🎵 TikTok Shop
                                        </span>
                                    @elseif(strtolower($click->platform) === 'whatsapp')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-700 font-bold text-[11px]">
                                            💬 WhatsApp
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-bold text-[11px]">
                                            {{ ucfirst($click->platform) }}
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 font-bold text-slate-900">
                                    {{ $click->product_name ?? 'General Store' }}
                                </td>
                                <td class="py-3.5 px-4 text-slate-500 font-medium">
                                    {{ $click->button_location }}
                                </td>
                                <td class="py-3.5 px-4 text-slate-400 font-mono text-[11px]">
                                    {{ $click->ip_address ?? '127.0.0.1' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-400 text-xs">
                                    Belum ada catatan aktivitas klik dari pengunjung.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="pt-2">
                {{ $recentClicks->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
