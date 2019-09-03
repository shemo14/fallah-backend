@extends('dashboard.index')
@section('title')
    الرئيسية
@endsection
@section('content')

    <div class="row">

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$users}}</h3>
                    <p> عدد المستخدمين</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="{{route('users')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$admins}}</h3>
                    <p> عدد المشرفين</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-secret"></i>
                </div>
                <a href="{{route('admins')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$ads}}</h3>
                    <p> عدد الاعلانات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-map-signs"></i>
                </div>
                <a href="{{route('ads')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$events}}</h3>
                    <p> عدد المناسبات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-th"></i>
                </div>
                <a href="{{route('events')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$categories}}</h3>
                    <p> عدد الاقسام</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bars"></i>
                </div>
                <a href="{{route('categories')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$roles}}</h3>
                    <p> عدد الصلاحيات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
                <a href="{{route('permissionslist')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$reports}}</h3>
                    <p> عدد التقارير</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <a href="{{route('allreports')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$cities}}</h3>
                    <p> عدد المدن</p>
                </div>
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <a href="{{route('countries')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box smallBoxCustom bg-aqua">
                <div class="inner">
                    <h3>{{$organizations}}</h3>
                    <p> الهيئات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shield"></i>
                </div>
                <a href="{{route('organizations')}}" class="small-box-footer"> الذهاب <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>


    </div>

@endsection