<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function edit()
    {
        return view('panel.content.post.edit');
    }



}
