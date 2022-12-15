@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الطلبات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
                <li class="active">الطلبات</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">الطلبات <small></small></h3>

                    <form action="" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="بحث" value="">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>بحث</button>
                                @if (auth()->user()->hasPermission('orders_create'))
                                    <a href="" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>اضف</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus">أضف</i></a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($orders->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الزبون</th>
                                <th>الطيار</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($orders as $index=>$order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->user->first_name  }}{{ $order->user->last_name  }}</td>
                                    @if($order->pilot_id )
                                        <td>{{ $order->pilot->name  }}</td>
                                    @else
                                        <td><span >لم يتم التسليم بعد</span></td>
                                    @endif
                                    <td>
                                        @if (auth()->user()->hasPermission('orders_update'))
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="warring-matrial btn btn-sm " id="#"><i class="fa fa-edit"></i> عرض</a>
                                        @else
                                            <a href="#" class="btn  btn-sm disabled warring-matrial"><i class="fa fa-edit"></i>تعديل</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('orders_delete'))
                                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-info btn-sm primary-matrial"><i class="fa fa-edit"></i>  تسليم الطلب</a>
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>حذف</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                       
                        
                    @else
                        
                        <h2>للاسف لا يوجد اي سجلات</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
