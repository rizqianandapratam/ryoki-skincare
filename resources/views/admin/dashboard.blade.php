<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Ringkasan Sistem</p>
                <h2 class="font-playfair font-bold text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Dashboard Admin
                </h2>
            </div>
            <a href="{{ route('admin.products.create') }}"
               class="btn-ryoki btn-ryoki-primary text-xs py-2.5 px-4 font-bold shadow-md shadow-sky-500/20 rounded-xl flex items-center justify-center gap-2 self-start sm:self-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Upload Produk Baru
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- ─── STATS CARDS GRID ─── -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Total Produk -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between relative overflow-hidden group hover:border-sky-200 transition-all">
                <div class="space-y-1 relative z-10">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Produk</span>
                    <h3 class="text-3xl font-extrabold text-slate-900 font-heading">
                        {{ $productsCount ?? 0 }}
                    </h3>
                    <p class="text-xs text-emerald-600 font-medium flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Katalog Aktif Ryoki
                    </p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-sky-50 text-[#0284C7] flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
            </div>

            <!-- Card 2: Total Artikel -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between relative overflow-hidden group hover:border-sky-200 transition-all">
                <div class="space-y-1 relative z-10">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Skinpedia Artikel</span>
                    <h3 class="text-3xl font-extrabold text-slate-900 font-heading">
                        {{ $articlesCount ?? 0 }}
                    </h3>
                    <p class="text-xs text-[#0284C7] font-medium flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0284C7]"></span>
                        Edukasi Skincare BPOM
                    </p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
            </div>

            <!-- Card 3: Unread Contacts -->
            <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between relative overflow-hidden group hover:border-sky-200 transition-all">
                <div class="space-y-1 relative z-10">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Pesan Belum Dibaca</span>
                    <h3 class="text-3xl font-extrabold text-slate-900 font-heading">
                        {{ $unreadContactsCount ?? 0 }}
                    </h3>
                    <p class="text-xs {{ ($unreadContactsCount ?? 0) > 0 ? 'text-rose-600 font-semibold' : 'text-slate-400 font-medium' }}">
                        {{ ($unreadContactsCount ?? 0) > 0 ? 'Perlu Respon CS' : 'Semua Pesan Terbaca' }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>

            <!-- Card 4: Marketplace Clicks Analytics -->
            <a href="{{ route('admin.analytics.index') }}" class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between relative overflow-hidden group hover:border-sky-200 hover:shadow-md transition-all">
                <div class="space-y-1 relative z-10">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Klik Marketplace</span>
                    <h3 class="text-3xl font-extrabold text-slate-900 font-heading">
                        {{ number_format($totalClicksCount ?? 0) }}
                    </h3>
                    <p class="text-xs text-[#0284C7] font-medium flex items-center gap-1">
                        <span>Lihat Analytics →</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
            </a>

        </div>

        <!-- ─── QUICK SHORTCUTS ─── -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="{{ route('admin.products.index') }}"
               class="bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-[#0284C7] hover:bg-sky-50/40 transition-all flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-sky-100 text-[#0284C7] flex items-center justify-center font-bold text-sm shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-[#0284C7]">Kelola Katalog Produk</h4>
                    <p class="text-[11px] text-slate-400">Tambah, edit, hapus & stok produk</p>
                </div>
            </a>

            <a href="{{ route('admin.articles.index') }}"
               class="bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-[#0284C7] hover:bg-sky-50/40 transition-all flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold text-sm shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-[#0284C7]">Kelola Artikel Skinpedia</h4>
                    <p class="text-[11px] text-slate-400">Tulis &amp; kelola artikel edukasi</p>
                </div>
            </a>

            <a href="{{ route('admin.contacts.index') }}"
               class="bg-white p-4 rounded-2xl border border-slate-200/80 hover:border-[#0284C7] hover:bg-sky-50/40 transition-all flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-[#0284C7]">Kotak Masuk Pesan</h4>
                    <p class="text-[11px] text-slate-400">Pertanyaan & konsultasi pengunjung</p>
                </div>
            </a>
        </div>

        <!-- ─── RECENT PRODUCTS TABLE ─── -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden space-y-4 p-6 sm:p-8">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div>
                    <h3 class="font-playfair font-bold text-xl text-slate-900">Produk Terbaru</h3>
                    <p class="text-xs text-slate-400 font-light mt-0.5">Daftar 5 produk terakhir yang ditambahkan ke sistem</p>
                </div>
                <a href="{{ route('admin.products.index') }}" class="text-xs font-bold text-[#0284C7] hover:underline">
                    Lihat Semua Produk →
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 uppercase font-semibold text-[11px] tracking-wider rounded-xl">
                        <tr>
                            <th class="py-3.5 px-4 rounded-l-xl">Gambar</th>
                            <th class="py-3.5 px-4">Nama Produk</th>
                            <th class="py-3.5 px-4">Kategori</th>
                            <th class="py-3.5 px-4">Harga</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4 text-right rounded-r-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentProducts ?? [] as $product)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-3 px-4">
                                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-slate-100 border border-slate-200/60 shrink-0">
                                        @if($product->image_url)
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-contain p-1">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-400 text-[10px]">No Img</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3 px-4 font-bold text-slate-900">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="hover:text-[#0284C7] transition-colors">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="inline-block px-2.5 py-1 rounded-full bg-sky-50 text-[#0284C7] font-semibold border border-sky-100 capitalize">
                                        {{ $product->category }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 font-bold text-slate-800">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>
                                <td class="py-3 px-4">
                                    @if($product->in_stock)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100 text-[10px]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-500 font-semibold border border-slate-200 text-[10px]">
                                            Habis
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                           class="px-3 py-1.5 rounded-lg bg-sky-50 hover:bg-sky-100 text-[#0284C7] font-bold text-xs transition-colors">
                                            Edit
                                        </a>
                                        <a href="{{ route('products.show', $product->slug) }}" target="_blank"
                                           class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-xs transition-colors">
                                            Pratinjau
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-slate-400 font-light">
                                    Belum ada data produk. Silakan <a href="{{ route('admin.products.create') }}" class="text-[#0284C7] font-semibold underline">upload produk pertama</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>