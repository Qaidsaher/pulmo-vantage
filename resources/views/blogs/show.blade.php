<x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-12 max-w-7xl md:px-12">
        <!-- Blog Post Content -->
        <div class="overflow-hidden bg-white shadow-lg rounded-xl">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="object-cover w-full h-96">
            <div class="p-8">
                <h1 class="mb-4 text-4xl font-bold text-primary">{{ $post->title }}</h1>
                <div class="flex flex-wrap items-center mb-6 space-x-4 text-gray-500">
                    <div class="flex items-center">
                        <i class="mr-2 fas fa-user"></i>
                        <span>{{ $post->author->name }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-2 fas fa-reg-calendar-alt"></i>
                        <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
                    </div>
                </div>
                <div class="prose max-w-none">
                    {!! $post->content !!}
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="p-8 bg-white shadow-lg rounded-xl">
            <h2 class="mb-6 text-3xl font-bold text-primary">Comments</h2>
            @foreach ($post->comments as $comment)
                <div class="flex items-start justify-between py-4 border-b border-gray-200">
                    <div>
                        <div class="flex items-center mb-2">
                            <i class="mr-2 fas fa-user text-secondary"></i>
                            <span class="font-semibold text-darkNeutral">{{ $comment->author->name }}</span>
                            <span class="mx-2 text-gray-500">•</span>
                            <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-700">{{ $comment->content }}</p>
                    </div>
                    @auth
                        @if (auth()->id() == $comment->user_id)
                            <form action="{{ route('blog.comments.destroy', $comment->id) }}" method="POST"
                                onsubmit="return confirm('Delete this comment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" title="Delete Comment">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach

            <!-- Comment Form -->
            @auth
                <form action="{{ route('blog.comments.store', $post->id) }}" method="POST" class="mt-8">
                    @csrf
                    <textarea name="content" rows="4"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                        placeholder="Write your comment here..." required></textarea>
                    <button type="submit"
                        class="px-6 py-3 mt-4 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
                        Submit Comment
                    </button>
                </form>
            @else
                <p class="mt-4 text-gray-700">Please <a href="{{ route('login') }}"
                        class="text-secondary hover:underline">login</a> to comment.</p>
            @endauth
        </div>

        <!-- Edit/Delete Options (Only for Owner) -->
        @if (auth()->check() && auth()->id() == $post->user_id)
            <div class="flex space-x-4">
                <a href="{{ route('blog.edit', $post->id) }}"
                    class="px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow bg-secondary hover:bg-primary">
                    Edit Post
                </a>
                <form action="{{ route('blog.destroy', $post->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-6 py-3 font-semibold text-white transition duration-300 bg-red-500 rounded-lg shadow hover:bg-red-600">
                        Delete Post
                    </button>
                </form>
            </div>
        @endif
    </div>
</x-app-layout>
