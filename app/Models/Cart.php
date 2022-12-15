<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;//i add this line

class Cart 
{
    use HasFactory;
    
    public $items = [];
    public $totalQty ;
    public $totalPrice;

    public function __construct($cart = null){
        if($cart){
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        }else{
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }//end of construct function

    public function add($food){
        $item = [
            'id' => $food->id,
            'title' => $food->title,
            'price' => $food->price,
            'qty' => 0,
            'image' => $food->image,
        ];

        if( !array_key_exists($food->id, $this->items) ){
            $this->items[$food->id] = $item;
            $this->totalQty +=1;
            $this->totalPrice += $food->price;
        }else{
            $this->totalQty += 1;
            $this->totalPrice += $food->price;
        }//end of else

        $this->items[$food->id]['qty'] += 1 ;
    }//end of add function

    public function remove($id){

        if(array_key_exists($id, $this->items)){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        }

    }//end of remove

    public function updateQty($id, $qty){

        //reset qty and price in the cart
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'] * $this->items[$id]['qty'];

        //add the item with the new qty
        $this->items[$id]['qty'] = $qty;

        //total price and total qty in the cart
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['price'] * $qty;


    }//end of update

    
}
