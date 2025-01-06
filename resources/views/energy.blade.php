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
                    <!-- Search dan Tombol Tambah dalam satu baris -->
                    <div class="flex justify-between mb-4">
                        <!-- Form Search -->
                        <form action="{{ route('dashboard') }}" method="GET" class="flex items-center">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari nama perangkat..."
                                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <button type="submit"
                                class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Cari
                            </button>
                        </form>

                        <!-- Tombol Tambah Perangkat -->
                        <button onclick="openModal()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Perangkat
                        </button>
                    </div>

                    <!-- Flash Message -->
                    @if (session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabel yang sudah ada -->
                    <table class="min-w-full divide-y divide-gray-200">
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
                                    Konsumsi Energi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($perangkats as $index => $perangkat)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $perangkat->nama_perangkat }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $perangkat->konsumsi_energi }} Watt</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Tambah Perangkat -->
                    <div id="modal"
                        class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
                        <div
                            class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                            <div class="mt-3">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                                    Tambah Perangkat Baru
                                </h3>
                                <form action="/perangkat" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                            Nama Perangkat
                                        </label>
                                        <input type="text" name="nama_perangkat"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                            Konsumsi Energi (Watt)
                                        </label>
                                        <input type="number" name="konsumsi_energi"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="button" onclick="closeModal()"
                                            class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Script untuk Modal -->
                    <script>
                        function openModal() {
                            document.getElementById('modal').classList.remove('hidden');
                        }

                        function closeModal() {
                            document.getElementById('modal').classList.add('hidden');
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
