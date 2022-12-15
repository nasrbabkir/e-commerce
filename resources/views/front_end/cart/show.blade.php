@extends('front_layout.app')
    @section('content')
        <div class="container" >
            <div class="row" style="padding-top:200px">
                @if($cart)
                    <div class="col-md-8">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                                <div class="card-body">
                                    @foreach ($cart->items as $food)
                                        <h5 class="card-title">{{$food['title']}}</h5>
                                        <div class="card-text">
                                            {{$food['price']}}
                                            <form action="{{ route('food.update', $food['id']) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="text" name="qty" id="qty" value="{{ $food['qty'] }}">
                                                <button type="submit" class="btn btn-secondary btn-sm ">Change</button>
                                            </form>
                                            <form action="{{ route('food.remove', $food['id']) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm ml-4 float-right" style="margin-top:-30px">Remove</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        <p><strong>Total:{{$cart->totalPrice}}</strong></p>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h3 class="card-title">cart title</h3>
                                <hr>
                                <div class="card-text">
                                    <p class="text-white">Total Amount is {{$cart->totalPrice}}</p>
                                    <p class="text-white">Total Quantities is {{$cart->totalQty}}</p>
                                    <a href="{{ route('cart.checkout', $cart->totalPrice) }}" class="btn btn-info">Checkout</a>
                                </div>
                            </div>                         
                        </div>
                    </div>
                @else
                    <div class="alert alert-success" style="width:90%;text-align:right">The are No item In the cart</div>
                @endif
            </div>
        </div>
    @endsection