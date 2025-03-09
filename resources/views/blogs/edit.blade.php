<x-app-layout>
    <div class="max-w-5xl px-6 py-16 mx-auto space-y-10 md:px-12">
        <header class="text-center">
            <h1 class="text-5xl font-bold text-primary">Edit Blog Post</h1>
            <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">
                Update your blog post details below.
            </p>
        </header>
        <div class="p-8 bg-white shadow-lg rounded-xl">
            <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="title" class="block text-lg font-semibold text-darkNeutral">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                        placeholder="Enter post title"
                        class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                        required>
                    @error('title')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block text-lg font-semibold text-darkNeutral">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="2" placeholder="Enter a short excerpt"
                        class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                        required>{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-lg font-semibold text-darkNeutral">Content</label>
                    <textarea name="content" id="content" rows="8" placeholder="Write your blog post content here"
                        class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                        required>{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="image" class="block text-lg font-semibold text-darkNeutral">Featured Image</label>
                    <input type="file" name="image" id="image"
                        class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary">
                    @error('image')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    @if ($post->image)
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Current Image:</p>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image"
                                class="object-cover w-32 h-20 rounded">
                        </div>
                    @endif
                </div>
                <button type="submit"
                    class="w-full px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
                    Update Post
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
