<div class="rounded-lg shadow-lg p-4 bg-white">
    <section class="flex flex-col">
        <div class="w-64 bg-gradient-to-b from-blue-500 to-blue-800 rounded-t-lg">
            <img src="{{ asset('storage/'.($book->thumbnail_url ?? 'default.jpg')) }}" alt="Book" class="w-full h-full object-cover rounded-t-lg">
        </div>
        <div class="flex flex-col mt-2 w-72">
            <p class="font-bold">Title: {{ \Illuminate\Support\Str::limit($book->title ?? 'N/A', 38) }}</p>
            <p>Author: {{ $book->author ?? 'Unknown' }}</p>
            <p>Category: {{ optional($book->categories->first())->name ?? 'Uncategorized' }}</p>
            <p>Synopsis: {{ \Illuminate\Support\Str::limit($book->synopsis ?? 'No synopsis available.', 100) }}</p>
        </div>
    </section>
</div>