@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الطيارين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
                <li class="active">الطيارين</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">الطيارين <small>{{ $pilots->total() }}</small></h3>

                    <form action="{{ route('admin.pilots.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="بحث" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>بحث</button>
                                @if (auth()->user()->hasPermission('pilots_create'))
                                    <a href="{{ route('admin.pilots.create') }}" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>اضف</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus">أضف</i></a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($pilots->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>رقم الهاتف</th>
                                <th>النوع</th>
                                <th>العنوان</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($pilots as $index=>$pilot)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pilot->name }}</td>
                                        <td>{{ $pilot->phone }}</td>
                                        @if($pilot->gender == '0')
                                            <td>ذكر</td>
                                        @else
                                            <td>انثى</td>
                                        @endif
                                        <td>{{ $pilot->Address }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('pilots_update'))
                                                <a href="{{ route('admin.pilots.edit', $pilot->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>تعديل</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('pilots_delete'))
                                                <form action="{{ route('admin.pilots.destroy', $pilot->id) }}" method="post" style="display: inline-block">
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
                       {{ $pilots->appends(request()->query())->links() }} 
                        
                    @else
                        
                        <h2>للاسف لا يوجد اي سجلات</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
