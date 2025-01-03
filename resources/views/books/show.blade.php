<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row">
                    @if ($book->thumbnail_url)
                        <img src="{{ asset('storage/' . $book->thumbnail_url) }}" class="w-64 rounded-md object-cover"
                            alt="Gambar Sampul Buku">
                    @else
                        <img src="https://picsum.photos/200" class="w-64 rounded-md object-cover"
                            alt="Gambar Sampul Buku">
                    @endif

                    <div class="ml-4">
                        <h1 class="text-2xl font-bold leading-tight mt-4 mb-2">
                            {{ $book->title ?? 'Judul tidak ditemukan' }}
                        </h1>

                        <p>Pengarang: {{ $book->author ?? 'Pengarang tidak ditemukan' }}</p>

                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $book->synopsis ?? 'Sinopsis tidak ditemukan' }}
                        </p>

                        

                        <form action="{{ route('waitlists.store') }}" method="POST">
                            @csrf
                            <hr>
                            <input type="hidden" name="book_id" value="{{ $book->id ?? '' }}">
                            <div class="flex sm:flex-row flex-col sm:items-center gap-3 sm:gap-0 mt-2 justify-start">
                                <div class="sm:w-1/4 flex flex-row sm:flex-col justify-between items-center">
                                    <label for="loan_date">Tanggal Peminjaman:</label>
                                    <input type="date" name="loan_date" class="rounded-lg"
                                        value="{{ now()->format('Y-m-d') ?? '' }}">
                                </div>
                                <div class="sm:w-1/4 flex flex-row sm:flex-col justify-between items-center">
                                    <label for="return_date">Tanggal Pengembalian:</label>
                                    <input type="date" name="return_date" class="rounded-lg">
                                </div>
                                <button type="submit"
                                    class="w-1/2 px-4 py-2 bg-blue-500 text-white rounded-md sm:self-end self-center">Pinjam atau Tunggu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex sm:flex-row flex-col-reverse w-full justify-between gap-3 bg-white p-3 mt-2 rounded-lg">
                <div class="sm:w-1/2 w-full border-slate-950 border p-2 rounded-md">
                    <p class="text-center">Komentar</p>
                    <hr>
                    @if ($book->comments)
                        @foreach ($book->comments as $comment)
                            <x-comment :comment="$comment" />
                        @endforeach
                    @else
                        <p class="text-center text-gray-500 dark:text-gray-400">Tidak ada komentar</p>
                    @endif

                    <form action="{{ route('comments.store') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id ?? '' }}">
                        <textarea name="content" rows="3" class="w-full p-2 border rounded-md"
                            placeholder="Tulis komentar..."></textarea>
                        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Posting Komentar</button>
                    </form>
                </div>
                <div class="sm:w-1/2 w-full border-slate-950 border p-2 rounded-md">
                    <p class="text-center">Daftar Tunggu</p>
                    <hr>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        No.
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Nama
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Tanggal Peminjaman
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Tanggal Pengembalian
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                @if ($book->waitLists)
                                    @foreach ($book->waitLists as $waitList)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $waitList->user->name ?? 'User tidak ditemukan' }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $waitList->loan_date->format('d-m-Y') ?? 'Tanggal tidak ditemukan' }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $waitList->return_date->format('d-m-Y') ?? 'Tanggal tidak ditemukan' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4"
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white text-center">
                                            Tidak ada daftar tunggu
                                        </td>
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

