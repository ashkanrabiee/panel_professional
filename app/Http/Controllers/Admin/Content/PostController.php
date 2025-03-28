<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('panel.content.post.index');
    }

    public function create()
    {
        return view('panel.content.post.create');
    }
    public function store(Request $request)
    {
        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'summary' =>"ghkl",
            'image' => $imagePath,
            'status' => $request->has('status') ? 1 : 0,
            'commentable' => $request->has('commentable') ? 1 : 0,
            'tags' => "oj",
            'published_at' => now(),
            'author_id' => 1,
            'category_id' => $request->category_id,
        ]);
        return response()->json(Post::latest());
    }
    public function edit()
    {
        return view('panel.content.post.edit');
    }



}
