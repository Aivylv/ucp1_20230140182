<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-2">Welcome, {{ Auth::user()->name }}!</h3>
                    <p class="mb-5 text-gray-600 dark:text-gray-400">{{ __("You're logged in!") }}</p>
                    
                    {{-- Menampilkan Role Pengguna --}}
                    <div class="inline-flex items-center px-4 py-2 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-800 dark:text-indigo-300 rounded-lg border border-indigo-200 dark:border-indigo-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="font-semibold text-sm">Role: {{ ucfirst(Auth::user()->role) }}</span>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>