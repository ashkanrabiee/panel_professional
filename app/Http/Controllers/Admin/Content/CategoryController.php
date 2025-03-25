<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        return view('panel.content.category.index');
    }
    public function create()
    {
        return view('panel.content.category.create');
    }
    public function edit(){

        return view('panel.content.category.edit');

    }

}
