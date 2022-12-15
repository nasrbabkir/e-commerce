@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>تفاصيل الطلب</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
                <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-dashboard"></i>الطلبات</a></li>
                <li class="active">تفاصيل الطلب</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">الطلبات <small></small></h3>

                    <form action="" method="get">

                        <div class="row">

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">
                    @foreach($carts as $cart)
                        <table class="table table-striped mt-2 mb-2">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">اسم الطلب</th>
                                        <th scope="col">السعر</th>
                                        <th scope="col">الكمية</th>
                                        <th scope="col">الحالة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cart->items as $item)
                                    <tr>
                                        
                                        <td>{{$item['title'] }}</td>
                                        <td>${{$item['price'] }}</td>
                                        <td>{{$item['qty'] }}</td>
                                        <td> <span class="badge badge-pill success-metrial">تم الدفع</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p class="badge badge-pill primary-matrial mb-3 p-3 text-white">Total Price : ${{$cart->totalPrice}}</p>
                    @endforeach
                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
