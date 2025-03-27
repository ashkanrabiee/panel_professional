<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() {
        return view("panel.market.product.create");
    }
    public function index(){
        return view("panel.market.product.index");
    }
}
