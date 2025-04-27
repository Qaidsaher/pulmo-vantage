<x-app-layout>
    <div class="px-6 py-8 mx-auto space-y-12 max-w-7xl md:px-12">

      {{-- Navigation & Actions --}}
      <div class="flex flex-col space-y-4 md:flex-row md:items-center md:justify-between md:space-y-0">
        <a href="{{ route('predict.history') }}" class="inline-flex items-center font-medium transition text-primary hover:text-secondary">
          <i class="mr-2 fas fa-arrow-left"></i>Back to History
        </a>

        @auth
          @if(auth()->id() === $post->user_id)
            <div class="flex items-center space-x-4">
              <a href="{{ route('blog.edit', $post->id) }}" class="text-xl transition text-secondary hover:text-primary" title="Edit Post">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this post?');">
                @csrf @method('DELETE')
                <button type="submit" class="text-xl text-red-500 transition hover:text-red-600" title="Delete Post">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </div>
          @endif
        @endauth
      </div>

      {{-- Post Content Card --}}
      <article class="overflow-hidden bg-white rounded-lg shadow-lg">
        {{-- Featured Image --}}
        <div class="relative overflow-hidden h-96">
          <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="object-cover w-full h-full transition transform group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
          <div class="absolute text-white bottom-6 left-6">
            <h1 class="text-3xl font-bold md:text-4xl drop-shadow-lg">{{ $post->title }}</h1>
            <div class="flex items-center mt-2 space-x-4 text-sm text-gray-200">
              <div class="flex items-center space-x-1">
                <i class="fas fa-user"></i><span>{{ $post->author->name }}</span>
              </div>
              <div class="flex items-center space-x-1">
                <i class="fas fa-calendar-alt"></i><span>{{ optional($post->published_at)->format('M d, Y') }}</span>
              </div>
            </div>
          </div>
        </div>

        {{-- Body Content --}}
        <div class="p-8 prose prose-lg text-gray-800 max-w-none">
          {!! $post->content !!}
        </div>
      </article>

      {{-- Comments Section --}}
      <section class="space-y-8">
        <h2 class="text-2xl font-bold text-primary">Comments ({{ $post->comments->count() }})</h2>
        <div class="space-y-6">
          @foreach($post->comments as $comment)
            <div class="p-6 rounded-lg shadow bg-gray-50">
              <div class="flex items-start justify-between">
                <div>
                  <div class="flex items-center mb-2 space-x-2">
                    <i class="text-xl fas fa-user-circle text-secondary"></i>
                    <span class="font-semibold text-gray-800">{{ $comment->author->name }}</span>
                    <span class="text-sm text-gray-500">• {{ $comment->created_at->diffForHumans() }}</span>
                  </div>
                  <p class="text-gray-700">{{ $comment->content }}</p>
                </div>
                @auth
                  @if(auth()->id() === $comment->user_id)
                    <form action="{{ route('blog.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Delete this comment?');">
                      @csrf @method('DELETE')
                      <button type="submit" class="text-lg text-red-500 transition hover:text-red-600" title="Delete Comment">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  @endif
                @endauth
              </div>
            </div>
          @endforeach
        </div>

        {{-- Add Comment Form --}}
        <div class="p-6 bg-white rounded-lg shadow">
          @auth
            <form action="{{ route('blog.comments.store', $post->id) }}" method="POST" class="space-y-4">
              @csrf
              <textarea name="content" rows="4" class="w-full p-4 transition border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Add your comment..." required></textarea>
              <div class="text-right">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 font-semibold text-white transition rounded-full shadow bg-primary hover:opacity-90">
                  <i class="fas fa-paper-plane"></i> Submit Comment
                </button>
              </div>
            </form>
          @else
            <p>Please <a href="{{ route('login') }}" class="text-secondary hover:underline">log in</a> to comment.</p>
          @endauth
        </div>
      </section>
    </div>
</x-app-layout>
