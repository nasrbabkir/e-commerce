@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الاطعمة</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
                <li class="active">الاطعمة</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">الاطعمة <small>{{ $foods->total() }}</small></h3>

                    <form action="{{ route('admin.foods.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="بحث" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>بحث</button>
                                @if (auth()->user()->hasPermission('foods_create'))
                                    <a href="{{ route('admin.foods.create') }}" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>اضف</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus">أضف</i></a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($foods->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>السعر</th>
                                <th>الصورة</th>
                                <th>الوصف</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($foods as $index=>$food)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $food->title }}</td>
                                    <td>{{ $food->price }}</td>
                                    <td>{{ $food->description }}</td>
                                    <td><img src="{{ $food->image_path }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                                    <td>
                                        @if (auth()->user()->hasPermission('foods_update'))
                                            <a href="{{ route('admin.foods.edit', $food->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>تعديل</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('foods_delete'))
                                            <form action="{{ route('admin.foods.destroy', $food->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>حذف</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>حذف</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                           {{ $foods->appends(request()->query())->links() }} 
                       
                        
                    @else
                        
                        <h2>للاسف لا يوجد اي سجلات</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
