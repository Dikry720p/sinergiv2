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
                <div
                    class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="p-2 rounded-full bg-blue-100 dark:bg-blue-900">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Perangkat</p>
                            <p class="text-lg font-semibold text-blue-600 dark:text-blue-400">{{ $totalDevices ?? '0' }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Perangkat Aktif -->
                <div
                    class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="p-2 rounded-full bg-yellow-100 dark:bg-yellow-900">
                            <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Perangkat Aktif</p>
                            <p class="text-lg font-semibold text-yellow-600 dark:text-yellow-400">
                                {{ $activeDevices ?? '0' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Konsumsi -->
                <div
                    class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="p-2 rounded-full bg-green-100 dark:bg-green-900">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Konsumsi</p>
                            <p class="text-lg font-semibold text-green-600 dark:text-green-400">
                                {{ number_format($kilowatt ?? 0) }} kWh</p>
                        </div>
                    </div>
                </div>


                <!-- Estimasi Biaya -->
                <div
                    class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="p-2 rounded-full bg-red-100 dark:bg-red-900">
                            <svg class="w-5 h-5 text-red-600 dark:text-red-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Estimasi Biaya/Bulan</p>
                            <p class="text-lg font-semibold text-red-600 dark:text-red-400">
                                Rp {{ number_format($estimatedCost ?? 0, 0, ',', '.') }}
                                <button onclick="bukaModalTarif()"
                                    class="ml-2 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                    <svg class="w-4 h-4 inline" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Perangkat dengan Design Modern -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 md:mb-0">
                            Daftar Perangkat
                        </h2>
                        <div class="flex space-x-3">
                            <button onclick="bukaModal()"
                                class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors duration-200"
                                style="background-color:green">
                                Tambah Perangkat
                            </button>
                            <button onclick="bukaModalLaporan()"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-200"
                                style="background-color:  blue">
                                Download Laporan
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div class="relative w-full md:w-64 mb-4 md:mb-0">
                            <input type="text" id="searchPerangkat" placeholder="Cari perangkat..."
                                class="pl-10 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-300 ease-in-out">
                        </div>
                        <div class="flex gap-4">
                            <select id="filterKategori"
                                class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-300 ease-in-out">
                                <option value="">Semua Kategori</option>
                                <option value="lampu">Lampu</option>
                                <option value="ac">AC</option>
                                <option value="game">Game</option>
                                <option value="komputer">Komputer</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                            <select id="filterStatus"
                                class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-300 ease-in-out">
                                <option value="">Semua Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tabel dengan Hover dan Transisi -->
            <div class="overflow-x-auto shadow-md rounded-lg">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                No</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Nama Perangkat</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Kategori</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Daya (Watt)</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Status</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @forelse($perangkats as $index => $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $item->nama }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $item->kategori === 'Lampu'
                                                    ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
                                                    : ($item->kategori === 'AC'
                                                        ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300'
                                                        : 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300') }}">
                                        {{ $item->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ number_format($item->daya) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $item->status === 'aktif'
                                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
                                                    : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <button onclick="ubahStatus({{ $item->id }})"
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors duration-200">
                                            <span class="sr-only">Toggle Status</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                            </svg>
                                        </button>
                                        <button onclick="editPerangkat({{ $item->id }})"
                                            class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300 transition-colors duration-200">
                                            <span class="sr-only">Edit</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <button onclick="hapusPerangkat({{ $item->id }})"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors duration-200">
                                            <span class="sr-only">Delete</span>
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                                    Tidak ada perangkat yang tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Script untuk filter dan search -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchDevice');
            const statusFilter = document.getElementById('statusFilter');
            const categoryFilter = document.getElementById('categoryFilter');

            function filterDevices() {
                const searchTerm = searchInput.value.toLowerCase();
                const status = statusFilter.value;
                const category = categoryFilter.value;

                // Implementasi logika filter
                const rows = document.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    const deviceName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const deviceStatus = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    const deviceCategory = row.querySelector('td:nth-child(5)').textContent.toLowerCase();

                    const matchesSearch = deviceName.includes(searchTerm);
                    const matchesStatus = status === '' || deviceStatus === status;
                    const matchesCategory = category === '' || deviceCategory === category;

                    row.style.display = matchesSearch && matchesStatus && matchesCategory ? '' : 'none';
                });
            }

            searchInput.addEventListener('input', filterDevices);
            statusFilter.addEventListener('change', filterDevices);
            categoryFilter.addEventListener('change', filterDevices);
        });
    </script>

    <!-- Modal Tambah Perangkat -->
    <div id="modalTambahPerangkat" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black opacity-50"></div>

            <!-- Modal Content -->
            <div class="relative bg-white dark:bg-gray-800 rounded-lg w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Tambah Perangkat Baru
                    </h3>
                    <button onclick="tutupModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form id="formTambahPerangkat" method="POST" action="{{ route('perangkat.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nama Perangkat
                            </label>
                            <input type="text" name="nama" id="nama" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Kategori
                            </label>
                            <select name="kategori" id="kategori" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Kategori</option>
                                <option value="Lampu">Lampu</option>
                                <option value="AC">AC</option>
                                <option value="Komputer">Komputer</option>
                                <option value="game">Game</option>
                            </select>
                        </div>

                        <div>
                            <label for="daya" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Daya (Watt)
                            </label>
                            <input type="number" name="daya" id="daya" required min="0"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Status
                            </label>
                            <select name="status" id="status" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="tutupModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script untuk modal -->
    <script>
        function bukaModal() {
            document.getElementById('modalTambahPerangkat').classList.remove('hidden');
        }

        function tutupModal() {
            document.getElementById('modalTambahPerangkat').classList.add('hidden');
            document.getElementById('formTambahPerangkat').reset();
        }

        // Event listener untuk form submit
        document.getElementById('formTambahPerangkat').addEventListener('submit', async function(e) {
            e.preventDefault();

            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Tutup modal dan refresh halaman
                    tutupModal();
                    window.location.reload();
                } else {
                    alert('Terjadi kesalahan: ' + data.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan saat menyimpan data');
                console.error('Error:', error);
            }
        });

        // Fungsi untuk filter dan pencarian
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchPerangkat');
            const kategoriFilter = document.getElementById('filterKategori');
            const statusFilter = document.getElementById('filterStatus');

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const kategori = kategoriFilter.value.toLowerCase();
                const status = statusFilter.value.toLowerCase();

                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    // Skip baris "Tidak ada perangkat yang tersedia"
                    if (row.cells.length === 1) return;

                    const nama = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const rowKategori = row.querySelector('td:nth-child(3)').textContent.trim()
                        .toLowerCase();
                    const rowStatus = row.querySelector('td:nth-child(5)').textContent.trim().toLowerCase();

                    const matchSearch = nama.includes(searchTerm);
                    const matchKategori = kategori === '' || rowKategori === kategori;
                    const matchStatus = status === '' || rowStatus === status;

                    if (matchSearch && matchKategori && matchStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Tambahkan event listeners
            if (searchInput) searchInput.addEventListener('input', filterTable);
            if (kategoriFilter) kategoriFilter.addEventListener('change', filterTable);
            if (statusFilter) statusFilter.addEventListener('change', filterTable);
        });

        // Fungsi untuk mengubah status
        async function ubahStatus(id) {
            if (!confirm('Apakah Anda yakin ingin mengubah status perangkat ini?')) return;

            try {
                const response = await fetch(`/perangkat/${id}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Gagal mengubah status: ' + data.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan saat mengubah status');
                console.error('Error:', error);
            }
        }

        // Fungsi untuk menghapus perangkat
        async function hapusPerangkat(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus perangkat ini?')) return;

            try {
                const response = await fetch(`/perangkat/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Gagal menghapus perangkat: ' + data.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan saat menghapus perangkat');
                console.error('Error:', error);
            }
        }

        // Fungsi untuk mengedit perangkat
        async function editPerangkat(id) {
            try {
                const response = await fetch(`/perangkat/${id}`);
                const data = await response.json();

                if (data.success) {
                    const perangkat = data.data;
                    document.getElementById('nama').value = perangkat.nama;
                    document.getElementById('kategori').value = perangkat.kategori;
                    document.getElementById('daya').value = perangkat.daya;
                    document.getElementById('status').value = perangkat.status;

                    // Ubah form untuk update
                    const form = document.getElementById('formTambahPerangkat');
                    form.action = `/perangkat/${id}`;
                    form.insertAdjacentHTML('beforeend', `<input type="hidden" name="_method" value="PUT">`);

                    bukaModal();
                } else {
                    alert('Gagal mengambil data perangkat: ' + data.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan saat mengambil data perangkat');
                console.error('Error:', error);
            }
        }
    </script>

    <!-- Modal Edit Tarif -->
    <div id="modalEditTarif" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black opacity-50"></div>

            <!-- Modal Content -->
            <div class="relative bg-white dark:bg-gray-800 rounded-lg w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Edit Tarif Listrik
                    </h3>
                    <button onclick="tutupModalTarif()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form id="formEditTarif" method="POST" action="{{ route('tarif.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="harga_per_kwh"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Harga per kWh (Rp)
                            </label>
                            <input type="number" name="harga_per_kwh" id="harga_per_kwh" required min="0"
                                step="0.01"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="keterangan"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Keterangan
                            </label>
                            <textarea name="keterangan" id="keterangan" rows="2"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="tutupModalTarif()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script untuk modal tarif -->
    <script>
        function bukaModalTarif() {
            document.getElementById('modalEditTarif').classList.remove('hidden');
            ambilDataTarif();
        }

        function tutupModalTarif() {
            document.getElementById('modalEditTarif').classList.add('hidden');
            document.getElementById('formEditTarif').reset();
        }

        async function ambilDataTarif() {
            try {
                const response = await fetch('/tarif');
                const data = await response.json();

                if (data) {
                    document.getElementById('harga_per_kwh').value = data.harga_per_kwh;
                    document.getElementById('keterangan').value = data.keterangan || '';
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal mengambil data tarif');
            }
        }

        // Event listener untuk form submit
        document.getElementById('formEditTarif').addEventListener('submit', async function(e) {
            e.preventDefault();

            try {
                const formData = new FormData(this);

                const response = await fetch('/tarif', {
                    method: 'POST', // Ubah ke POST karena akan dihandle oleh middleware
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    }
                });

                const data = await response.json();

                if (data.success) {
                    tutupModalTarif();
                    window.location.reload();
                } else {
                    alert('Gagal memperbarui tarif: ' + data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memperbarui tarif');
            }
        });
    </script>

    <!-- Modal Laporan -->
    <div id="modalLaporan" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black opacity-50"></div>

            <!-- Modal Content -->
            <div class="relative bg-white dark:bg-gray-800 rounded-lg w-full max-w-4xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Laporan Penggunaan Energi - {{ date('F Y') }}
                    </h3>
                    <button onclick="tutupModalLaporan()" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                    Tanggal</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                    Total Perangkat Aktif</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                    Konsumsi (kWh)</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                    Biaya (Rp)</th>
                            </tr>
                        </thead>
                        <tbody id="laporanTableBody"
                            class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            <!-- Data akan diisi melalui JavaScript -->
                        </tbody>
                        <tfoot class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <td colspan="2"
                                    class="px-6 py-3 text-right text-sm font-medium text-gray-500 dark:text-gray-300">
                                    Total:</td>
                                <td class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100"
                                    id="totalKonsumsi"></td>
                                <td class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100"
                                    id="totalBiaya"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button onclick="tutupModalLaporan()"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        Tutup
                    </button>
                    <button onclick="downloadLaporan()"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700">
                        Download PDF
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan Script untuk Modal Laporan -->
    <script>
        function bukaModalLaporan() {
            document.getElementById('modalLaporan').classList.remove('hidden');
            generateLaporanData();
        }

        function tutupModalLaporan() {
            document.getElementById('modalLaporan').classList.add('hidden');
        }

        function generateLaporanData() {
            const tableBody = document.getElementById('laporanTableBody');
            tableBody.innerHTML = '';

            let totalKonsumsi = 0;
            let totalBiaya = 0;

            // Simulasi data untuk satu bulan
            const currentDate = new Date();
            const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

            for (let i = 1; i <= daysInMonth; i++) {
                const date = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);
                const perangkatAktif = Math.floor(Math.random() * 5) + 1; // Random 1-5 perangkat
                const konsumsi = (Math.random() * 10).toFixed(2); // Random 0-10 kWh
                const biaya = (konsumsi * 1445).toFixed(0); // Asumsi tarif Rp 1.445/kWh

                totalKonsumsi += parseFloat(konsumsi);
                totalBiaya += parseFloat(biaya);

                const row = `
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            ${date.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            ${perangkatAktif}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            ${konsumsi}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            ${new Intl.NumberFormat('id-ID').format(biaya)}
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            }

            document.getElementById('totalKonsumsi').textContent = totalKonsumsi.toFixed(2) + ' kWh';
            document.getElementById('totalBiaya').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(totalBiaya);
        }

        function downloadLaporan() {
            // Simulasi download - dalam implementasi nyata, ini akan memanggil endpoint backend
            alert(
                'Laporan sedang diunduh...\n\nDalam implementasi nyata, ini akan menghasilkan file PDF dengan data yang ditampilkan dalam tabel.');
        }
    </script>
</x-app-layout>
