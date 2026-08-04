<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Ryoki Skinpedia</p>
                <h2 class="font-playfair font-bold text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Kelola Artikel
                </h2>
            </div>
            <a href="{{ route('admin.articles.create') }}"
               class="btn-ryoki btn-ryoki-primary text-xs py-2.5 px-4 font-bold shadow-md shadow-sky-500/20 rounded-xl flex items-center justify-center gap-2 self-start sm:self-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Artikel Baru
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs flex items-center gap-2 font-medium">
                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden p-6 sm:p-8 space-y-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <h3 class="font-playfair font-bold text-xl text-slate-900">Daftar Artikel Skinpedia</h3>
                    <p class="text-xs text-slate-400 font-light mt-0.5">Total {{ $articles->total() }} artikel terdaftar</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 uppercase font-semibold text-[11px] tracking-wider rounded-xl">
                        <tr>
                            <th class="py-3.5 px-4 rounded-l-xl">Thumbnail</th>
                            <th class="py-3.5 px-4">Judul Artikel</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4">Tanggal Buat</th>
                            <th class="py-3.5 px-4 text-right rounded-r-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($articles as $article)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-3 px-4">
                                    <div class="w-14 h-10 rounded-lg overflow-hidden bg-slate-100 border border-slate-200/60 shrink-0">
                                        @if($article->thumbnail_url)
                                            <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-400 text-[9px]">No Img</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3 px-4 font-bold text-slate-900 max-w-xs">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="hover:text-[#0284C7] transition-colors line-clamp-1">
                                        {{ $article->title }}
                                    </a>
                                </td>
                                <td class="py-3 px-4">
                                    @if($article->is_published)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100 text-[10px]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Published
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 font-semibold border border-amber-100 text-[10px]">
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-slate-400">
                                    {{ $article->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.articles.edit', $article) }}"
                                           class="px-3 py-1.5 rounded-lg bg-sky-50 hover:bg-sky-100 text-[#0284C7] font-bold text-xs transition-colors">
                                            Edit
                                        </a>
                                        @if($article->is_published)
                                            <a href="{{ route('articles.show', $article->slug) }}" target="_blank"
                                               class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-xs transition-colors">
                                                Lihat
                                            </a>
                                        @endif
                                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus artikel ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 font-semibold text-xs transition-colors">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-8 text-slate-400 font-light">
                                    Belum ada artikel. Silakan tambah artikel baru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pt-4 border-t border-slate-100">
                {{ $articles->links() }}
            </div>
        </div>

    </div>
</x-app-layout>