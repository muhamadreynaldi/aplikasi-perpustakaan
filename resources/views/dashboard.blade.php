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
                    @if (auth()->user()->role === 'anggota')
                        <p class="font-semibold text-xl">Welcome, Anggota!</p>
                        <div class="mt-6">
                            <a href="{{ route('peminjaman.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Manage Peminjaman
                            </a>
                            <a href="{{ route('sanksi.index') }}" class="inline-block ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                Manage Sanksi
                            </a>
                        </div>
                        <div><h1>-</h1></div>
                        <p class="font-semibold text-xl">Welcome, Pustakawan!</p>
                        <div class="mt-6">
                            <a href="{{ route('buku.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Manage Buku
                            </a>
                            <a href="{{ route('rak.index') }}" class="inline-block ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                Manage Rak
                            </a>
                            <a href="{{ route('penulis.index') }}" class="inline-block ml-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Manage Penulis
                            </a>
                        </div>
                    @else
                        <p class="font-semibold text-xl">Welcome to the Dashboard!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
