<x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-10 max-w-7xl md:px-12">
      {{-- Page Header --}}
      <header class="flex flex-col items-center space-y-4 text-center lg:flex-row lg:justify-between lg:text-left lg:space-y-0">
        <div>
          <h1 class="text-5xl font-extrabold text-primary">Latest Blog Posts</h1>
          <p class="max-w-2xl mt-2 text-lg text-gray-600">
            Stay updated with the latest insights and news from our team.
          </p>
        </div>
        @auth
        <a href="/blog/create" class="inline-block px-6 py-3 font-semibold text-white transition rounded-full shadow-lg bg-gradient-to-r from-primary to-secondary hover:opacity-90">
          <i class="mr-2 fas fa-plus"></i>Create New Post
        </a>
        @endauth
      </header>

      {{-- Blog Posts Grid --}}
      <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
        <div class="relative overflow-hidden transition shadow-lg group rounded-3xl hover:shadow-2xl">
          <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="object-cover w-full h-64 transition transform group-hover:scale-110" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-80"></div>
          <div class="absolute bottom-0 left-0 w-full p-6 text-white">
            <h2 class="text-2xl font-bold leading-tight">
              <a href="{{ route('blog.show', $post->id) }}" class="hover:underline">
                {{ $post->title }}
              </a>
            </h2>
            <p class="mt-2 text-sm line-clamp-3">{{ $post->excerpt }}</p>
            <div class="flex items-center justify-between mt-4 text-sm text-gray-300">
              <div class="flex items-center gap-2">
                <i class="fas fa-user"></i><span>{{ $post->author->name }}</span>
              </div>
              <div class="flex items-center gap-2">
                <i class="fas fa-calendar-alt"></i><span>{{ optional($post->published_at)->format('M d, Y') }}</span>
              </div>
            </div>
          </div>
          <div class="absolute transition opacity-0 top-4 right-4 group-hover:opacity-100">
            <a href="{{ route('blog.show', $post->id) }}" class="p-2 text-white rounded-md bg-primary/80 hover:bg-primary">
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
          @auth
            @if(auth()->id() == $post->user_id)
              <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="absolute top-4 left-4">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this post?');" class="p-2 text-white transition bg-red-500 rounded-md hover:bg-red-600">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            @endif
          @endauth
        </div>
        @endforeach
      </div>
    </div>
</x-app-layout>
