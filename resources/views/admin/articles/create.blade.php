<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Ryoki Skinpedia</p>
                <h2 class="font-playfair font-bold text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Tambah Artikel Baru
                </h2>
            </div>
            <a href="{{ route('admin.articles.index') }}"
               class="px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all">
                ← Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-10 space-y-6">
            
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Judul Artikel <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" required placeholder="Contoh: 5 Cara Memperbaiki Skin Barrier yang Rusak"
                           class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-slate-50/50">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Isi Konten Artikel <span class="text-rose-500">*</span></label>
                    <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                    <trix-editor input="content" class="trix-content bg-slate-50/50 border border-slate-200 rounded-xl min-h-[350px] prose max-w-none focus:outline-none focus:ring-2 focus:ring-[#0284C7] p-4"></trix-editor>
                    @error('content')
                        <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-4 rounded-2xl bg-sky-50/50 border border-sky-100 space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Gambar Thumbnail Artikel</label>
                    <input type="file" name="thumbnail" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#0284C7] file:text-white hover:file:bg-[#0369A1]">
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_published" id="is_published" checked class="rounded text-[#0284C7] focus:ring-[#0284C7] w-4 h-4">
                    <label for="is_published" class="text-xs font-semibold text-slate-700 cursor-pointer">Publikasikan Artikel Langsung</label>
                </div>

                <div class="pt-4 flex items-center gap-3">
                    <button type="submit"
                            class="btn-ryoki btn-ryoki-primary py-3 px-6 text-sm font-bold rounded-xl shadow-lg shadow-sky-500/20">
                        Simpan Artikel
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="px-4 py-3 text-xs font-semibold text-slate-500 hover:text-slate-700">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/trix@2.1.12/dist/trix.css">
    @endpush

    @push('scripts')
    <script src="https://unpkg.com/trix@2.1.12/dist/trix.umd.min.js"></script>
    @endpush
</x-app-layout>