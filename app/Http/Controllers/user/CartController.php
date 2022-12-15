<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Detial;
use App\Models\Food;

class CartController extends Controller
{

        public function addtoCart(Food $food){
            if( session()->has('cart')){
                $cart = new Cart(session()->get('cart'));
            }else{
                $cart = new Cart();
            }
           $cart->add($food);
            //dd($cart);
            session()->put('cart',$cart);
            session()->flash('success', 'تم إضافة إلى السلة بنجاح');
            return redirect()->back();
        }//end of add cart

        public function showCart(){
            if(session()->has('cart')){
                $cart = new Cart(session()->get('cart'));
            }else{
                $cart = null;
            }
            return view('front_end.cart.show', compact('cart'));
        }//end of show cart

        public function destroy(Food $food){

            $cart = new Cart( session()->get('cart') );
            $cart->remove($food->id);
            if( $cart->totalQty <= 0 ){
                session()->forget('cart');
            }else{
                session()->put('cart', $cart);
            }
            session()->flash('success', 'تم حذف المنتج من السلة بنجاح');
            return redirect()->back();
            
        }//end of destroy

        public function update(Request $request, Food $food){

            $request->validate([
                'qty' => 'required|numeric',
            ]);

            $cart = new Cart(session()->get('cart'));
            $cart->updateQty($food->id, $request->qty);
            session()->put('cart',$cart);
            session()->flash('success', 'تم تعديل المنتج في السلة بنجاح');
            return redirect()->back();

        }

        public function checkout($amount){
            return view('front_end.cart.checkout',compact('amount'));
        }//end of chekout

        public function charge(Request $request){
        //dd($request->stripeToken);
        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'amount'   => $request->amount,
            'description' => ' Test from laravel new app'
        ]);

        $chargeId = $charge['id'];

        if ($chargeId) {
            // save order in orders table ...
            // clearn cart 

            //auth()->user()->orders()->create([
                //'cart' => serialize(session()->get('cart')),
                //'user_id' => auth()->user()->id,
            //]);

            auth()->user()->orders()->create([
                'user_id' => auth()->user()->id,
            ]);
            $orders = Order::latest()->first()->id;
            Detial::create([
                'order_id' => $orders,
                'user_id' => auth()->user()->id,
                'cart' => serialize(session()->get('cart')),
            ]);
            
            session()->forget('cart');  
            session()->flash('success', 'تم  إضافة الطلب  بنجاح');
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

   
}
