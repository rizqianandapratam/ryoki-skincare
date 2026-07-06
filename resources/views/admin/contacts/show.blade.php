<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Pesan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold">Dari: {{ $contact->name }}</h3>
                        <p class="text-gray-600">Email: {{ $contact->email }}</p>
                        <p class="text-gray-600">No. HP: {{ $contact->phone ?? '-' }}</p>
                        <p class="text-gray-500 text-sm mt-1">Dikirim pada: {{ $contact->created_at->format('d F Y H:i') }}</p>
                    </div>
                    <div class="border-t border-gray-200 py-4">
                        <h4 class="font-bold mb-2">Pesan:</h4>
                        <p class="text-gray-800 whitespace-pre-line">{{ $contact->message }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('admin.contacts.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>