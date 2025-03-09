<x-app-layout>
    <div class="max-w-5xl px-6 py-16 mx-auto space-y-10 md:px-12">
      <header class="text-center">
        <h1 class="text-5xl font-bold text-primary">Create New Blog Post</h1>
        <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">
          Share your insights with our community by creating a new blog post.
        </p>
      </header>
      <div class="p-8 bg-white shadow-lg rounded-xl">
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-6">
            <label for="title" class="block text-lg font-semibold text-darkNeutral">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter post title" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
            @error('title')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="excerpt" class="block text-lg font-semibold text-darkNeutral">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="2" placeholder="Enter a short excerpt" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required></textarea>
            @error('excerpt')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="content" class="block text-lg font-semibold text-darkNeutral">Content</label>
            <textarea name="content" id="content" rows="8" placeholder="Write your blog post content here" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required></textarea>
            @error('content')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="image" class="block text-lg font-semibold text-darkNeutral">Featured Image</label>
            <input type="file" name="image" id="image" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
            @error('image')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="w-full px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
            Publish Post
          </button>
        </form>
      </div>
    </div>
  </x-app-layout>

