<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Kotak Masuk</p>
                <h2 class="font-playfair font-bold text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Pesan Masuk & Konsultasi
                </h2>
            </div>
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
                    <h3 class="font-playfair font-bold text-xl text-slate-900">Pesan Pengunjung Website</h3>
                    <p class="text-xs text-slate-400 font-light mt-0.5">Total {{ $contacts->total() }} pesan masuk melalui formulir kontak</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 uppercase font-semibold text-[11px] tracking-wider rounded-xl">
                        <tr>
                            <th class="py-3.5 px-4 rounded-l-xl">Tanggal</th>
                            <th class="py-3.5 px-4">Pengirim</th>
                            <th class="py-3.5 px-4">Kontak</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4 text-right rounded-r-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($contacts as $contact)
                            <tr class="hover:bg-slate-50/80 transition-colors {{ $contact->is_read ? '' : 'bg-sky-50/30 font-semibold' }}">
                                <td class="py-3 px-4 text-slate-400">
                                    {{ $contact->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="py-3 px-4 font-bold text-slate-900">
                                    {{ $contact->name }}
                                </td>
                                <td class="py-3 px-4 text-slate-600">
                                    <p>{{ $contact->email }}</p>
                                    @if($contact->phone)
                                        <p class="text-[11px] text-slate-400">{{ $contact->phone }}</p>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    @if($contact->is_read)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-500 font-semibold text-[10px]">
                                            Dibaca
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-rose-50 text-rose-700 font-bold border border-rose-100 text-[10px] animate-pulse">
                                            Baru
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.contacts.show', $contact) }}"
                                           class="px-3.5 py-1.5 rounded-lg bg-[#0284C7] hover:bg-[#0369A1] text-white font-bold text-xs transition-colors shadow-xs">
                                            Buka Pesan
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesan ini?');">
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
                                    Belum ada pesan masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pt-4 border-t border-slate-100">
                {{ $contacts->links() }}
            </div>
        </div>

    </div>
</x-app-layout>