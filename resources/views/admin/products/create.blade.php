<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Katalog Produk</p>
                <h2 class="font-playfair font-bold text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Tambah Produk Baru
                </h2>
            </div>
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all">
                ← Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-10 space-y-6">
            
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                @if ($errors->any())
                    <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 text-xs space-y-1">
                        <strong class="font-bold">Gagal menyimpan produk:</strong>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Basic Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Produk <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Ryoki Luminous Serum"
                               class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-slate-50/50">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kategori (Opsional)</label>
                        <input type="text" name="category" value="{{ old('category', 'Skincare') }}" placeholder="Contoh: Serum, Facial Wash, Cream"
                               class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-slate-50/50">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Harga Produk (Rp) (Opsional)</label>
                    <input type="number" name="price" value="{{ old('price') }}" placeholder="149000"
                           class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-slate-50/50">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Deskripsi Produk</label>
                    <textarea name="description" rows="4" placeholder="Jelaskan manfaat dan keunggulan produk Ryoki..."
                              class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-slate-50/50">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Cara Pakai</label>
                        <textarea name="usage" rows="3" placeholder="Langkah pemakaian sehari-hari..."
                                  class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-slate-50/50">{{ old('usage') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Kandungan Utama (Komposisi)</label>
                        <textarea name="ingredients" rows="3" placeholder="Niacinamide, Alpha Arbutin, Collagen..."
                                  class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-slate-50/50">{{ old('ingredients') }}</textarea>
                    </div>
                </div>

                <!-- Main Image Upload -->
                <div class="p-4 rounded-2xl bg-sky-50/50 border border-sky-100 space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Gambar Utama Produk</label>
                    <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#0284C7] file:text-white hover:file:bg-[#0369A1]">
                </div>

                <!-- Multi-Image Gallery Upload -->
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3" x-data="galleryPreview()">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                        Foto Galeri Produk Tambahan
                        <span class="text-slate-400 font-normal text-[11px] ml-1">(Pilih beberapa gambar sekaligus)</span>
                    </label>
                    <input type="file" name="gallery[]" multiple accept="image/*"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-700 file:text-white hover:file:bg-slate-800"
                           @change="previewFiles($event)">

                    <!-- Preview Thumbnails -->
                    <div x-show="previews.length > 0" class="grid grid-cols-4 sm:grid-cols-6 gap-3 pt-2">
                        <template x-for="(src, i) in previews" :key="i">
                            <div class="relative group">
                                <img :src="src" class="w-full aspect-square object-cover rounded-xl border border-slate-200 shadow-xs">
                                <button type="button" @click="removePreview(i)"
                                        class="absolute -top-2 -right-2 w-5 h-5 bg-rose-500 text-white rounded-full text-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow">
                                    ×
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Marketplace Links Section -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-4">
                    <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider flex items-center gap-2 font-heading">
                        <span>🛍️</span> Link Marketplace Penjualan (Opsional)
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- TikTok Shop URL -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Link TikTok Shop Produk</label>
                            <input type="text" name="tiktok_shop_url" value="{{ old('tiktok_shop_url') }}" placeholder="https://vt.tiktok.com/..."
                                   class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-white">
                            <p class="text-[11px] text-slate-400 font-light mt-1">Jika dikosongkan, otomatis mengarah ke TikTok Shop Ryoki Official.</p>
                        </div>

                        <!-- Shopee URL -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Link Shopee Produk (Opsional)</label>
                            <input type="text" name="shopee_url" value="{{ old('shopee_url') }}" placeholder="https://shopee.co.id/..."
                                   class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#EE4D2D] bg-white">
                            <p class="text-[11px] text-slate-400 font-light mt-1">Jika dikosongkan, tombol otomatis mengarah ke Link Utama Shopee Ryoki (https://shopee.co.id/ryokiofficialstore)</p>
                        </div>
                    </div>
                </div>

                <!-- Checkboxes -->
                <div class="flex flex-wrap items-center gap-6 pt-2">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="in_stock" checked class="rounded text-[#0284C7] focus:ring-[#0284C7] w-4 h-4">
                        <span class="text-xs font-semibold text-slate-700">Stok Tersedia</span>
                    </label>

                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_best_seller" class="rounded text-[#0284C7] focus:ring-[#0284C7] w-4 h-4">
                        <span class="text-xs font-semibold text-slate-700">Tandai sebagai Best Seller</span>
                    </label>

                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" checked class="rounded text-[#0284C7] focus:ring-[#0284C7] w-4 h-4">
                        <span class="text-xs font-semibold text-slate-700">🌟 Tampilkan di Produk Skincare Unggulan (Beranda)</span>
                    </label>
                </div>

                <div class="pt-6 flex items-center gap-3 border-t border-slate-100 mt-6">
                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl bg-[#0284C7] hover:bg-[#0369A1] text-white font-medium text-sm shadow-sm hover:shadow transition-all duration-200 cursor-pointer active:scale-95">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span>Simpan Produk Baru</span>
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 hover:text-slate-800 font-medium text-sm transition-all duration-200 cursor-pointer">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>

    @push('scripts')
    <script>
        function galleryPreview() {
            return {
                previews: [],
                files: null,
                previewFiles(event) {
                    this.previews = [];
                    this.files = event.target.files;
                    for (let i = 0; i < this.files.length; i++) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previews.push(e.target.result);
                        };
                        reader.readAsDataURL(this.files[i]);
                    }
                },
                removePreview(index) {
                    this.previews.splice(index, 1);
                }
            };
        }
    </script>
    @endpush
</x-app-layout>