<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            {{-- Tambahkan text-gray-900 dark:text-gray-100 agar warna dasar teks langsung menyesuaikan tema --}}
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg text-gray-900 dark:text-gray-100">
                
                {{-- Update heading color --}}
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Edit Category</h2>
                
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="space-y-4">
                    @csrf @method('PUT')
                    
                    <div>
                        {{-- Update label color --}}
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $kategori->name) }}" class="w-full mt-1 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                        @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex justify-end gap-3 mt-6">
                        {{-- Update tombol Cancel agar menyesuaikan dark mode --}}
                        <a href="{{ route('kategori.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-800 dark:text-white rounded-md transition duration-150">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition duration-150">Update Category</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>