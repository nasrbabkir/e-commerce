<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Detial;

class ArchiveController extends Controller
{
    public function index(){
        $orders = Order::where('pilot_id','!=', NULL)->get();
        return view('dashboard.orders.archives.index',compact('orders'));
    }//end of index

    public function show($id){
        $detials  = Detial::where('order_id', '=', $id)->onlyTrashed()->get();
        $carts = $detials->transform( function($cart, $key){
            return unserialize($cart->cart);//transform data form object to json
        });
        return view('dashboard.orders.archives.show')->with('carts', $carts);
    }
}
