<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('panel.content.menu.index');
    }
    public function create()
    {
        return view('panel.content.menu.create');
    }
    public function edit(){

        return view('panel.content.menu.edit');

    }
}
