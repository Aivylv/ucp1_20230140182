<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                <h2 class="text-2xl font-bold mb-6">Add Category</h2>
                <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium">Category</label>
                        <input type="text" name="name" id="name" placeholder="e.g. Electronics, Food, Fashion.. " class="w-full mt-1 rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('kategori.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>