@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>تسليم الطلب</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
                <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-dashboard"></i>الطلبات</a></li>
                <li class="active">تسليم الطلب</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">تسليم الطلب</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('admin.orders.destroy', $id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('delete') }}

                       <div class="form-group">
                            <label for="exampleFormControlSelect1">إختر الطيار</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="pilot_id">
                                @foreach ($pilots as $pilot)
                                    <option value="{{$pilot->id}}">{{ $pilot->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-ok"></i> تسليم</button>
                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
