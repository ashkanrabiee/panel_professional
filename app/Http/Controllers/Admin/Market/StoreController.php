<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index(){
        return view("panel.market.store.index");
    }
    public function edit(Product $product){
        return view("panel.market.store.edit");
    }
    public function create(Product $product,Request $request){
        
        return view("panel.market.store.create",["product"=>$product]);
    }
    public function store(Product $product,Request $request){
    $product->update(["marketable"=>$product->marketable + $request->get('marketable_number')]);
    return to_route("admin.market.store.index")->with(["success"=>"با موفقیت به محصول {$product->name} اضافه شد."]);
}
}
