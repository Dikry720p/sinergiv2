<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 dark:bg-green-800 dark:text-green-300"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 dark:bg-red-800 dark:text-red-300"
                    role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between py-5 mb-5">
                        <div class="md:mt-0 sm:flex-none w-72">
                            <form action="{{ route('users.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Type for search then enter"
                                    class="w-full relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300" />
                            </form>
                        </div>
                        <div class="sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('users.create') }}"
                                style="background-color: green; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                                Tambah user
                            </a>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-white dark:bg-gray-800 ">
                                <tr
                                    class="bg-white border-t border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <span>NO</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <span>Name</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <span>Email</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <span>Level</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <span>Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ ++$i }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $user->role === 'admin'
                                                    ? 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300'
                                                    : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="focus:outline-none text-gray-50 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"
                                            class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            Data Belum Tersedia!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Konfirmasi Delete dengan JavaScript -->
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
                event.target.submit();
            }
        }

        // Search form submit on enter
        document.querySelector('input[name="search"]').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                this.form.submit();
            }
        });
    </script>
</x-app-layout>
