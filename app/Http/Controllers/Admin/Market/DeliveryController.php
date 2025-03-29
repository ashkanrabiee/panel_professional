<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(){
        $methods = Delivery::all(); 
        return view("panel.market.delivery.index",["methods"=>$methods]);
    }
    public function create(){
        return view("panel.market.delivery.create");
    }
    public function store(Request $request){
        Delivery::create($request->all());
        return to_route("admin.market.delivery.index");

    }
}
