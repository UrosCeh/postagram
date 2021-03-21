<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // Post::create([
        //     'user_id' => auth()->id(),
        //     'body' => $request->body
        // ]);

        auth()->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post) {
        if(!$post->ownedBy(auth()->user())){
            return response(null, 403);
        }

        $post->delete();

        return back();
    }
}
