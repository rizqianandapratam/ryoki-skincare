<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Kotak Masuk</p>
                <h2 class="font-playfair font-bold text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Detail Pesan Masuk
                </h2>
            </div>
            <a href="{{ route('admin.contacts.index') }}"
               class="px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all">
                ← Kembali ke Kotak Masuk
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-10 space-y-6">
            
            <!-- Sender Header Card -->
            <div class="p-6 rounded-2xl bg-sky-50/50 border border-sky-100 space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#0284C7]">Pengirim Pesan</span>
                        <h3 class="text-2xl font-bold font-playfair text-slate-900">{{ $contact->name }}</h3>
                    </div>
                    <span class="text-xs font-medium text-slate-400 self-start sm:self-auto bg-white px-3 py-1.5 rounded-full border border-slate-200">
                        {{ $contact->created_at->format('d F Y H:i') }} WIB
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs pt-2 border-t border-sky-100">
                    <div>
                        <span class="text-slate-400 font-medium">Alamat Email:</span>
                        <a href="mailto:{{ $contact->email }}" class="block font-bold text-[#0284C7] hover:underline">
                            {{ $contact->email }}
                        </a>
                    </div>
                    <div>
                        <span class="text-slate-400 font-medium">Nomor WhatsApp / HP:</span>
                        @if($contact->phone)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank" class="block font-bold text-emerald-600 hover:underline">
                                {{ $contact->phone }} (Hubungi via WA)
                            </a>
                        @else
                            <p class="font-semibold text-slate-600">-</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Message Body -->
            <div class="space-y-2 pt-2">
                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Isi Pesan</h4>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 text-slate-700 text-sm leading-relaxed whitespace-pre-line font-light">
                    {{ $contact->message }}
                </div>
            </div>

            <!-- Actions -->
            <div class="pt-4 flex flex-wrap items-center justify-between gap-3">
                <a href="{{ route('admin.contacts.index') }}"
                   class="px-5 py-2.5 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-all">
                    ← Kembali
                </a>

                <div class="flex items-center gap-2.5">
                    @if($contact->email)
                        <a href="mailto:{{ $contact->email }}?subject={{ rawurlencode('Respon Pesan Ryoki Skincare') }}&body={{ rawurlencode("Halo " . $contact->name . ",\n\nTerima kasih telah menghubungi Ryoki Skincare.\n\n") }}"
                           class="flex items-center gap-2 bg-[#0284C7] hover:bg-[#0369A1] text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-md shadow-sky-500/20 transition-all">
                            ✉️ Balas via Email
                        </a>
                    @endif

                    @if($contact->phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}?text={{ urlencode('Halo ' . $contact->name . ', saya dari tim CS Ryoki Skincare ingin merespon pesan Anda.') }}"
                           target="_blank"
                           class="flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-md shadow-emerald-500/20 transition-all">
                            💬 Balas via WhatsApp
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>