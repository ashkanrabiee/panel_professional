<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('panel.content.faq.index');
    }
    public function create()
    {
        return view('panel.content.faq.create');
    }
    public function edit(){

        return view('panel.content.faq.edit');

    }
}
