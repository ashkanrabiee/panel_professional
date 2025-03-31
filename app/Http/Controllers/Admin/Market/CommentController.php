<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    
    public function index()
    {
        $unSeenComments = Comment::where('commentable_type', 'App\Models\Market\Product')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment){
            $unSeenComment->seen = 1;
            $result = $unSeenComment->save();
        }
        $comments = Comment::orderBy('created_at', 'desc')->where('commentable_type', 'App\Models\Market\Product')->simplePaginate(15);
        return view('panel.market.comment.index', compact('comments'));
    }



}
