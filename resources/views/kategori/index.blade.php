<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Bagian Header dan Tombol Add Category --}}
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">Category List</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Manage your category</p>
                        </div>
                        <a href="{{ route('kategori.create') }}" class="px-4 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">
                            + Add Category
                        </a>
                    </div>

                    {{-- Tabel Data --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50 text-sm">
                                    <th class="py-3 px-4 font-semibold">NAME</th>
                                    <th class="py-3 px-4 font-semibold">TOTAL PRODUCT</th>
                                    <th class="py-3 px-4 font-semibold">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategoris as $kategori)
                                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/25 transition">
                                    {{-- Menampilkan Nama Kategori --}}
                                    <td class="py-3 px-4">{{ $kategori->name }}</td>
                                    
                                    {{-- Menampilkan Total Produk dari withCount() --}}
                                    <td class="py-3 px-4">{{ $kategori->products_count }}</td>
                                    
                                    {{-- Tombol Aksi (Edit & Delete) --}}
                                    <td class="py-3 px-4 flex items-center gap-3">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="text-blue-500 hover:text-blue-700">
                                            Edit
                                        </a>

                                        {{-- Tombol Delete --}}
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                @if($kategoris->isEmpty())
                                <tr>
                                    <td colspan="3" class="py-4 text-center text-gray-500">Belum ada data kategori.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>