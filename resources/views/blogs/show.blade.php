<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-16 md:px-12 space-y-12">
      <!-- Blog Post Content -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="object-cover w-full h-96">
        <div class="p-8">
          <h1 class="text-4xl font-bold text-primary mb-4">{{ $post->title }}</h1>
          <div class="flex flex-wrap items-center mb-6 space-x-4 text-gray-500">
            <div class="flex items-center">
              <i class="fas fa-user mr-2"></i>
              <span>{{ $post->author->name }}</span>
            </div>
            <div class="flex items-center">
              <i class="fas fa-reg-calendar-alt mr-2"></i>
              <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
            </div>
          </div>
          <div class="prose max-w-none">
            {!! $post->content !!}
          </div>
        </div>
      </div>

      <!-- Comments Section -->
      <div class="bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-3xl font-bold text-primary mb-6">Comments</h2>
        @foreach($post->comments as $comment)
          <div class="border-b border-gray-200 py-4">
            <div class="flex items-center mb-2">
              <i class="fas fa-user text-secondary mr-2"></i>
              <span class="font-semibold text-darkNeutral">{{ $comment->author->name }}</span>
              <span class="mx-2 text-gray-500">•</span>
              <span class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-700">{{ $comment->content }}</p>
          </div>
        @endforeach

        <!-- Comment Form -->
        @auth
          <form action="{{ route('blog.comments.store', $post->id) }}" method="POST" class="mt-8">
            @csrf
            <textarea name="content" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Write your comment here..." required></textarea>
            <button type="submit" class="mt-4 px-6 py-3 bg-primary text-white font-semibold rounded-lg shadow hover:bg-secondary transition duration-300">
              Submit Comment
            </button>
          </form>
        @else
          <p class="mt-4 text-gray-700">Please <a href="{{ route('login') }}" class="text-secondary hover:underline">login</a> to comment.</p>
        @endauth
      </div>

      <!-- Edit/Delete Options (Only for Owner) -->
      @if(auth()->check() && auth()->id() == $post->user_id)
        <div class="flex space-x-4">
          <a href="{{ route('blog.edit', $post->id) }}" class="px-6 py-3 bg-secondary text-white font-semibold rounded-lg shadow hover:bg-primary transition duration-300">
            Edit Post
          </a>
          <form action="{{ route('blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-6 py-3 bg-red-500 text-white font-semibold rounded-lg shadow hover:bg-red-600 transition duration-300">
              Delete Post
            </button>
          </form>
        </div>
      @endif
    </div>
  </x-app-layout>
