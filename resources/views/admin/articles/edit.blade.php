<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Ryoki Skinpedia</p>
                <h2 class="font-playfair font-bold text-2xl sm:text-3xl text-slate-900 leading-tight">
                    Edit Artikel: {{ $article->title }}
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
            
            <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf @method('PUT')

                @if ($errors->any())
                    <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 text-xs space-y-1">
                        <strong class="font-bold">Gagal memperbarui artikel:</strong>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Judul Artikel <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $article->title) }}" required
                           class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-slate-50/50">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Isi Konten Artikel (Opsional)</label>
                    <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
                    <trix-editor input="content" class="trix-content bg-slate-50/50 border border-slate-200 rounded-xl min-h-[350px] prose max-w-none focus:outline-none focus:ring-2 focus:ring-[#0284C7] p-4"></trix-editor>
                </div>

                <div class="p-4 rounded-2xl bg-sky-50/50 border border-sky-100 space-y-3">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Gambar Thumbnail Artikel</label>
                    <div class="flex items-center gap-3 mb-2">
                        <img id="thumbnail-preview" src="{{ $article->thumbnail_url }}" class="w-24 h-16 object-contain p-1 bg-white rounded-xl border border-sky-100 shadow-xs">
                        <span id="preview-label" class="text-xs text-slate-500 font-medium">
                            {{ $article->thumbnail ? 'Thumbnail saat ini' : 'Foto template default' }}
                        </span>
                    </div>

                    <input type="hidden" name="thumbnail_base64" id="thumbnail-base64">

                    <div class="space-y-2">
                        <label class="block text-[11px] font-semibold text-slate-500">Opsi 1: Upload File Gambar Baru Dari Perangkat</label>
                        <input type="file" name="thumbnail" id="thumbnail-input" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#0284C7] file:text-white hover:file:bg-[#0369A1]">
                    </div>

                    <div class="space-y-1 pt-1">
                        <label class="block text-[11px] font-semibold text-slate-500">Opsi 2: Atau Tempel URL Foto Langsung (https://...)</label>
                        <input type="url" name="thumbnail_url_input" id="thumbnail-url-input" value="{{ (str_starts_with($article->thumbnail, 'http://') || str_starts_with($article->thumbnail, 'https://')) ? $article->thumbnail : '' }}" placeholder="https://domain.com/foto-skincare.jpg"
                               class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] bg-white">
                    </div>
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_published" id="is_published" {{ $article->is_published ? 'checked' : '' }} class="rounded text-[#0284C7] focus:ring-[#0284C7] w-4 h-4">
                    <label for="is_published" class="text-xs font-semibold text-slate-700 cursor-pointer">Publikasikan Artikel</label>
                </div>

                <div class="pt-4 flex items-center gap-3">
                    <button type="submit"
                            class="bg-gradient-to-r from-[#0284C7] to-[#0369A1] text-white font-bold py-3 px-6 text-sm rounded-xl shadow-lg shadow-sky-500/25 hover:from-[#0369A1] hover:to-[#075985] transition-all cursor-pointer">
                        Perbarui Artikel
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
    <script>
        // Automatic Client-Side Image Compression & Live Preview
        document.getElementById('thumbnail-input')?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('thumbnail-preview');
            const label = document.getElementById('preview-label');
            const hiddenBase64 = document.getElementById('thumbnail-base64');

            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(event) {
                const img = new Image();
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    let width = img.width;
                    let height = img.height;
                    const maxWidth = 1000;

                    if (width > maxWidth) {
                        height = Math.round((height * maxWidth) / width);
                        width = maxWidth;
                    }

                    canvas.width = width;
                    canvas.height = height;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    const compressedBase64 = canvas.toDataURL('image/jpeg', 0.82);
                    if (hiddenBase64) hiddenBase64.value = compressedBase64;
                    if (preview) preview.src = compressedBase64;
                    if (label) label.textContent = 'Pratinjau Thumbnail Baru Siap Upload';
                };
                img.src = event.target.result;
            };
            reader.readAsDataURL(file);
        });

        // Ensure thumbnail compression finishes before form submission
        document.querySelector('form')?.addEventListener('submit', function(e) {
            const fileInput = document.getElementById('thumbnail-input');
            const hiddenBase64 = document.getElementById('thumbnail-base64');
            const urlInput = document.getElementById('thumbnail-url-input');

            if (fileInput && fileInput.files.length > 0 && (!hiddenBase64 || !hiddenBase64.value) && (!urlInput || !urlInput.value)) {
                e.preventDefault();
                const form = this;
                const file = fileInput.files[0];
                const reader = new FileReader();

                reader.onload = function(event) {
                    const img = new Image();
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        let width = img.width;
                        let height = img.height;
                        const maxWidth = 800;

                        if (width > maxWidth) {
                            height = Math.round((height * maxWidth) / width);
                            width = maxWidth;
                        }

                        canvas.width = width;
                        canvas.height = height;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, width, height);

                        const compressedBase64 = canvas.toDataURL('image/jpeg', 0.78);
                        if (hiddenBase64) hiddenBase64.value = compressedBase64;
                        form.submit();
                    };
                    img.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // URL input preview
        document.getElementById('thumbnail-url-input')?.addEventListener('input', function(e) {
            const val = e.target.value.trim();
            const preview = document.getElementById('thumbnail-preview');
            const label = document.getElementById('preview-label');
            const hiddenBase64 = document.getElementById('thumbnail-base64');

            if (val && preview) {
                if (hiddenBase64) hiddenBase64.value = '';
                preview.src = val;
                if (label) label.textContent = 'Pratinjau Thumbnail URL Baru';
            }
        });

        // Trix Editor Image Attachment AJAX Upload
        document.addEventListener('trix-attachment-add', function(event) {
            const attachment = event.attachment;
            if (attachment.file) {
                uploadTrixAttachment(attachment);
            }
        });

        function uploadTrixAttachment(attachment) {
            const formData = new FormData();
            formData.append('file', attachment.file);

            fetch('{{ route('admin.articles.upload-image') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) throw new Error('Upload gagal');
                return response.json();
            })
            .then(data => {
                if (data.url) {
                    attachment.setAttributes({
                        url: data.url,
                        href: data.url
                    });
                }
            })
            .catch(error => {
                console.error('Error uploading image to Trix:', error);
                alert('Gagal mengunggah foto ke artikel.');
            });
        }
    </script>
    @endpush
</x-app-layout>