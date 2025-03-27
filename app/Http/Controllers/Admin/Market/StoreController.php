<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class StoreController extends Controller
{
    public function index(){
        return view("panel.market.store.index");
    }
    public function addToStore(Product $product){
        return view("panel.market.store.create");
    }
}
