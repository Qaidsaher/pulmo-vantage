<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Request;
class BlogPostController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        $posts = BlogPost::with('author')->orderBy('published_at', 'desc')->paginate(10);
        return view('blogs.index', compact('posts'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        // dd('create');
        return view('blogs.create');
    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Store the image in the "public/blog_images" folder.
            $data['image'] = $request->file('image')->store('blog_images', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['published_at'] = now();

        BlogPost::create($data);

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified blog post along with its comments.
     */
    public function show($id)
    {
        $post = BlogPost::with(['comments.author', 'author'])->findOrFail($id);
        return view('blogs.show', compact('post'));
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);

        // Only allow the owner to edit
        if ($post->user_id !== auth()->id()) {
            return redirect()->route('blog.index')->with('error', 'You are not authorized to edit this post.');
        }

        return view('blogs.edit', compact('post'));
    }

    /**
     * Update the specified blog post.
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            return redirect()->route('blog.index')->with('error', 'You are not authorized to update this post.');
        }

        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog_images', 'public');
        }

        $post->update($data);

        return redirect()->route('blog.show', $post->id)->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified blog post.
     */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            return redirect()->route('blog.index')->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Store a comment on a blog post.
     */
    public function storeComment(Request $request, $blogPostId)
    {
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $data['user_id'] = auth()->id();
        $data['blog_post_id'] = $blogPostId;

        Comment::create($data);

        return redirect()->route('blog.show', $blogPostId)->with('success', 'Comment added successfully.');
    }
}
