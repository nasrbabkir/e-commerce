<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = auth()->user()->detials;
        $carts = $orders->transform( function($cart, $key){
            return unserialize($cart->cart);//transform data form object to json
        });
        //dd($carts);

        return view('front_end.order.index')->with('carts', $carts);
    }//end of index

  
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
        //
    }

  
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
