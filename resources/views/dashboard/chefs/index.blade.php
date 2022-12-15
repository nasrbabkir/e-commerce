@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الطباخين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
                <li class="active">الطباخين</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">الطباخين <small>{{ $chefs->total() }}</small></h3>

                    <form action="{{ route('admin.chefs.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="بحث" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>بحث</button>
                                @if (auth()->user()->hasPermission('chefs_create'))
                                    <a href="{{ route('admin.chefs.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>اضف</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i></a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($chefs->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>التخصص</th>
                                <th>الصورة</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($chefs as $index=>$chef)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{$chef->name }}</td>
                                    <td>{{$chef->speiality }}</td>
                                    <td><img src="{{$chef->image_path }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                                    <td>
                                        @if (auth()->user()->hasPermission('chefs_update'))
                                            <a href="{{ route('admin.chefs.edit',$chef->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>تعديل</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('chefs_delete'))
                                            <form action="{{ route('admin.chefs.destroy',$chef->id) }}" method="post" style="display: inline-block">
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
                        
                       {{ $chefs->appends(request()->query())->links() }} 
                        
                    @else
                        
                        <h2>للاسف لا يوجد اي سجلات</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
