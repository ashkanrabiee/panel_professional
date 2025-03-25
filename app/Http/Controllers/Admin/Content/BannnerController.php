<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannnerController extends Controller
{
    public function index()
    {
        return view('panel.content.banner.index');
    }
    public function create()
    {
        return view('panel.content.banner.create');
    }
    public function edit(){

        return view('panel.content.banner.edit');

    }
}
