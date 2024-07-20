<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Trait\common;

class CommentController extends Controller
{
    use common;

    public function store(Request $request, $postId)
    {

        $message = $this->messages();
        $post = Post::findOrFail($postId);
        $data = $request->validate(
            [
                'content' => 'required',
            ],
            $message
        );
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $post->id;
        // dd($data);
        Comment::create($data);

        return redirect()->route('showPost', $post->id)->with('status', 'success')->with('message', 'Comment added successfully!');
    }
}
