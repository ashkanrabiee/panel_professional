<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('panel.content.comment.index');
    }
    public function create()
    {
        return view('panel.content.comment.create');
    }
    public function edit(){

        return view('panel.content.comment.edit');

    }
}
