<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Detial;
use App\Models\User;
use App\Models\Pilot;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function __construct()
    {
        //create read update delete
       $this->middleware(['permission:orders_read'])->only('index');
        $this->middleware(['permission:orders_create'])->only('create');
       $this->middleware(['permission:orders_update'])->only('edit');
       $this->middleware(['permission:orders_delete'])->only('destroy');

    }//end of constructor
   
    public function index()
    {
        $orders = Order::where('pilot_id','=', NULL)->get();
        return view('dashboard.orders.orders',compact('orders'));
        
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        
        $detials  = Detial::where('order_id', '=', $id)->get();
        $carts = $detials->transform( function($cart, $key){
            return unserialize($cart->cart);//transform data form object to json
        });
        return view('dashboard.orders.detials.show')->with('carts', $carts);
    }



    
    public function edit($id)
    {
        $id = Order::findOrFail($id);
        $pilots = Pilot::all();
        return view('dashboard.orders.delivery.delivery', compact('pilots','id'));
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy(Request $request, $id)
    {
        Detial::findOrFail($id)->delete();
        $order = Order::findOrFail($id);
        $order->update([
            'pilot_id' => $request->pilot_id,
        ]);
        if($order){
            session()->flash('success', 'تم التسليم بنجاح');
            return redirect()->route('admin.orders.index');
        }
    }
}
