<x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-10 max-w-7xl md:px-12">
        <!-- Page Header -->
        <header class="flex flex-col items-center justify-between text-center">
            <div>
                <h1 class="text-5xl font-bold text-primary">Latest Blog Posts</h1>
                <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">
                    Stay updated with the latest insights and news from our team.
                </p>
            </div>
            @auth
                <a href="/blog/create"
                    class="inline-flex items-center px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
                    <i class="mr-2 fas fa-plus"></i> Create New Post
                </a>

            @endauth
        </header>

        <!-- Blog Posts Grid -->
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <div
                    class="relative overflow-hidden transition duration-300 transform bg-white shadow-lg rounded-xl hover:scale-105 hover:shadow-2xl">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                        class="object-cover w-full h-56">
                    <div class="p-6">
                        <h2 class="mb-2 text-2xl font-bold text-primary">
                            <a href="{{ route('blog.show', $post->id) }}" class="hover:underline">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p class="text-lg text-gray-700">{{ $post->excerpt }}</p>
                        <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="mr-2 fas fa-user"></i>
                                <span>{{ $post->author->name }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="mr-2 fas fa-reg-calendar-alt"></i>
                                <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <a href="{{ route('blog.show', $post->id) }}"
                                class="font-semibold transition text-secondary hover:text-primary">
                                Read More &rarr;
                            </a>
                            @auth
                                @if (auth()->id() == $post->user_id)
                                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" title="Delete Post">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
