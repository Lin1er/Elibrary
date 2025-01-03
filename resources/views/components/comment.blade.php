<div class="mb-4">
    <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>

    <!-- Form Reply -->
    <form action="{{ route('comments.store') }}" method="POST" class="ml-6 mt-2">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        <textarea name="content" rows="2" class="w-full p-2 border rounded-md" placeholder="Write a reply..."></textarea>
        <button type="submit"
            class="mt-2 px-4 py-2 bg-gray-500 text-white rounded-md">Reply</button>
    </form>
</div>

<!-- Recursive Replies -->
@if ($comment->replies)
    <div class="ml-8">
        @include('comments._comment', ['comments' => $comment->replies])
    </div>
@endif