<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Energy Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Overview dengan Shadow dan Hover Effect -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <!-- Total Perangkat -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="p-2 rounded-full bg-blue-100 dark:bg-blue-900">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Perangkat</p>
                            <p class="text-lg font-semibold text-blue-600 dark:text-blue-400">{{ $totalDevices ?? '0' }}</p>
                        </div>
                    </div>
                </div>
                <!-- Perangkat Aktif -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="p-2 rounded-full bg-yellow-100 dark:bg-yellow-900">
                            <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Perangkat Aktif</p>
                            <p class="text-lg font-semibold text-yellow-600 dark:text-yellow-400">{{ $activeDevices ?? '0' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Konsumsi -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="p-2 rounded-full bg-green-100 dark:bg-green-900">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Konsumsi</p>
                            <p class="text-lg font-semibold text-green-600 dark:text-green-400">{{ number_format($kilowatt ?? 0) }} kWh</p>
                        </div>
                    </div>
                </div>

                <!-- Estimasi Biaya -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="p-2 rounded-full bg-red-100 dark:bg-red-900">
                            <svg class="w-5 h-5 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Estimasi Biaya/Bulan</p>
                            <p class="text-lg font-semibold text-red-600 dark:text-red-400">Rp {{ number_format($estimatedCost ?? 0, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Perangkat dengan Design Modern -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Daftar Perangkat</h2>

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div class="relative w-full md:w-64 mb-4 md:mb-0">
                            <input type="text" id="searchPerangkat" placeholder="Cari perangkat..."
                                class="pl-10 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-300 ease-in-out">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel dengan Hover dan Transisi -->
            <div class="overflow-x-auto shadow-md rounded-lg">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Perangkat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Daya (Watt)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @forelse($perangkats as $index => $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $item->nama }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->kategori === 'Lampu' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' : ($item->kategori === 'AC' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' : 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300') }}">
                                        {{ $item->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ number_format($item->daya) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->status === 'aktif' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">Tidak ada perangkat yang tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
    