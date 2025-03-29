<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all(){
        $order = Order::all();
        return view("panel.market.order.index",["order"=>$order]);
    }
}
