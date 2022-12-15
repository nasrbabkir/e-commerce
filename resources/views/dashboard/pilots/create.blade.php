@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>الطيارين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>لوحة التحكم</a></li>
                <li><a href="{{ route('admin.pilots.index') }}"> الطيارين</a></li>
                <li class="active">اضف</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">اضف</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('admin.pilots.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                        </div>

                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" >
                        </div>
                        <div class="form-group">
                            <select name="gender" class="form-control">
                                <option disabled selected>اختر النوع</option>
                                <option value="0">ذكر</option>
                                <option value="1">انثى</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" name="Address" class="form-control " value="{{ old('Address') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>اضف</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
