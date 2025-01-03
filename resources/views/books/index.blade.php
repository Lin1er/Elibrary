<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="GET" action="{{ route('books.index') }}" class="mb-6 flex items-center">
                    @if (request('search'))
                        <input type="text" name="search" placeholder="Search books..."
                            class="w-full p-2 border border-gray-300 rounded-md" value="{{ request('search') }}">
                    @else
                        <input type="text" name="search" placeholder="Search books..."
                            class="w-full p-2 border border-gray-300 rounded-md">
                    @endif

                    <select name="category" class="ml-2 p-2 pr-7 border border-gray-300 rounded-md">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit"
                        class="ml-2 px-4 py-2 border border-gray-300 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-gray-700">
                        Search
                    </button>
                </form>
                <div class="flex flex-wrap gap-2 justify-center">
                    @forelse ($books as $book)
                        <a href="/books/{{ $book->id }}">
                            <x-book width="w-96" :book="$book" />
                        </a>
                    @empty
                        <p class="text-gray-600 dark:text-gray-400 text-center">No books found</p>
                    @endforelse
                </div>


                <div class="mt-4">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
