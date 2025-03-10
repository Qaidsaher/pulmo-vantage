<x-app-layout>
    <div class="px-6 py-8 mx-auto space-y-12 max-w-7xl md:px-12">
        <!-- Header Section -->
        <header class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ route('predict.history') }}"
                    class="flex items-center font-medium transition text-md text-primary hover:text-secondary">
                    <i class="mx-1 fas fa-arrow-left"></i>
                    <span>Back to History</span>
                </a>
            </div>
            @if (auth()->check() && auth()->id() == $post->user_id)
                <div class="flex mt-4 space-x-4 md:mt-0">
                    <a href="{{ route('blog.edit', $post->id) }}"
                        class="text-xl transition text-secondary hover:text-primary" title="Edit Post">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xl text-red-500 transition hover:text-red-600"
                            title="Delete Post">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            @endif
        </header>

        <!-- Post Content Card -->
        <article class="overflow-hidden bg-white rounded-md shadow-md">
            <a href="{{ asset('storage/' . $post->image) }}" target="_blank">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                    class="object-cover w-full transition duration-300 h-96 hover:opacity-90">
            </a>
            <div class="p-8">
                <h1 class="mb-4 text-4xl font-bold text-primary">{{ $post->title }}</h1>
                <div class="flex items-center mb-6 space-x-4 text-gray-500">
                    <div class="flex items-center">
                        <i class="mr-2 fas fa-user"></i>
                        <span>{{ $post->author->name }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-2 fas fa-calendar-alt"></i>
                        <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
                    </div>
                </div>
                <div class="prose text-gray-800 max-w-none">
                    {!! $post->content !!}
                </div>
            </div>
        </article>

        <!-- Comments Section -->
        <section class="p-8 bg-white rounded-md shadow-md">
            <h2 class="mb-6 text-3xl font-bold text-primary">Comments</h2>
            <div class="space-y-6">
                @foreach ($post->comments as $comment)
                    <div class="flex items-start justify-between pb-4 border-b border-gray-200">
                        <div>
                            <div class="flex items-center mb-2">
                                <i class="mr-2 fas fa-user text-secondary"></i>
                                <span class="font-semibold text-darkAccent">{{ $comment->author->name }}</span>
                                <span class="mx-2 text-gray-500">&bull;</span>
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
                                    <button type="submit" class="text-xl text-red-500 transition hover:text-red-600"
                                        title="Delete Comment">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>

            <!-- Comment Form -->
            <div class="mt-8">
                @auth
                    <form action="{{ route('blog.comments.store', $post->id) }}" method="POST">
                        @csrf
                        <textarea name="content" rows="4"
                            class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-secondary"
                            placeholder="Write your comment here..." required></textarea>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 mt-4 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
                                <i class="mr-2 fas fa-paper-plane"></i> Submit Comment
                            </button>
                        </div>

                    </form>
                @else
                    <p class="mt-4 text-gray-700">Please <a href="{{ route('login') }}"
                            class="text-secondary hover:underline">login</a> to comment.</p>
                @endauth
            </div>
        </section>
    </div>
</x-app-layout>
