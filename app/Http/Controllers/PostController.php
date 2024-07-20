<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Trait\common;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    use common;

    public function search(Request $request)
    {

        $query = $request->input('query');
        $posts = Post::where('title', 'like', "%{$query}%")
            ->OrWhere('content', 'like', "%{$query}%")
            ->get();
        return view('searchPost', compact('posts'));
    }

    /**
     * Displaying posts related the authenticated user
     */

    public function index()
    {

        $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->get();
        if ($posts->count() > 0) {
            return view('posts.myPosts', compact('posts'));
        }
        return redirect()->route('home')->with('status', 'warning')->with('message', 'No posts yet');
    }

    /**
     * Show the form for creating a new post
     */
    public function create()
    {
        $tags = Tag::get();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created post in storage.
     */

    public function store(Request $request)
    {
        $message = $this->messages();
        $data = $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required',
                'tag_id' => 'required|exists:tags,id',
                'thumbnail' => 'required|image|mimes:png, jpg,jpeg|max:2048'
            ],
            $message
        );

        $data['user_id'] = Auth::user()->id;
        $data['thumbnail'] = $this->uploadFile($request->thumbnail, 'assets/images');
        $post = Post::create($data);
        $post->tags()->sync($data['tag_id']);
        return redirect()->route('home')->with('status', 'success')->with('message', 'Post added successfully');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {

        $posts = Post::with('tags', 'comments')->findOrFail($id);
        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {

        $tags = Tag::all();
        $post = Post::with('tags')->findOrFail($id);
        // dd($post);
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = $this->messages();
        $data = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'tag_id' => 'required|exists:tags,id',
            'thumbnail' => 'sometimes|image|mimes:png, jpg,jpeg|max:2048',
        ], $message);

        $data['published'] = $request->has('published');
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->uploadFile($request->thumbnail, 'assets/images');
        }
        $post = Post::findOrFail($id);
        $post->update($data);

        if ($data['tag_id']) {
            $post->tags()->sync([$data['tag_id']]);
        }
        return redirect()->route('myPosts')->with('status', 'success')->with('message', 'post updated successfully');
    }

    /**
     * Remove the specified user post from storage.
     */
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();
        return back()->with('status', 'success')->with('message', 'post deleted successfully');
    }
}
