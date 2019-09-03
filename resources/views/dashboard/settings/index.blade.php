@section('style')
@endsection
@extends('dashboard.index')

@section('title')
    الإعدادات
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box card-tabs">
                <ul class="nav nav-pills pull-right">
                    <li class="active">
                        <a href="#site" data-toggle="tab" aria-expanded="true">إعدادات الموقع</a>
                    </li>
                    <li class="">
                        <a href="#appSection" data-toggle="tab" aria-expanded="true">سيكشن التطبيق</a>
                    </li>
                    <li class="">
                        <a href="#social" data-toggle="tab" aria-expanded="true">مواقع التواصل</a>
                    </li>
                    <li class="">
                        <a href="#aboutUs" data-toggle="tab" aria-expanded="true">من نحن</a>
                    </li>
                    <li class="">
                        <a href="#roles" data-toggle="tab" aria-expanded="true">الشروط و الاحكام</a>
                    </li>
                </ul>
                <h4 class="header-title m-b-30">الاعدادات</h4>

                <div class="tab-content">
                    <div id="site" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-custom panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">اعدادت عامة</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{route('sitesetting')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">اسم الموقع بالعربية</label>
                                                <div class="col-md-10">
                                                    <input required type="text" id="example-email" value="{{settings('site_name_ar')}}" name="site_name_ar" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="name_en">اسم الموقع بالانجليزية</label>
                                                <div class="col-md-10">
                                                    <input required type="text" id="name_en" value="{{settings('site_name_en')}}" name="site_name_en" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="address_ar">العنوان بالعربية</label>
                                                <div class="col-md-10">
                                                    <input required type="text" id="address_ar" value="{{settings('address_ar')}}" name="address_ar" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="address_en">العنوان بالانجليزية</label>
                                                <div class="col-md-10">
                                                    <input required type="text" id="address_en" value="{{settings('address_en')}}" name="address_en" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="email">البريد الاكتروني</label>
                                                <div class="col-md-10">
                                                    <input required type="email" id="email" value="{{settings('email')}}" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="phone">رقم الهاتف</label>
                                                <div class="col-md-10">
                                                    <input required type="tel" id="phone" value="{{settings('phone')}}" name="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">لوجو الموقع</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="site_logo" data-default-file="{{appPath()}}/images/site/logo.png" class="dropify photo" data-max-file-size="1M" />
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">حفظ</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="social" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-custom panel-border">
                                            <div class="panel-heading">
                                                <h3 style="display: inline-block;" class="panel-title">مواقع التواصل</h3>
                                                <button type="button" class="btn btn-custom btn-rounded waves-effect waves-light w-md m-b-5 pull-right" id="openSocialForm">اضافة</button>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-striped m-0">
                                                                <thead>
                                                                <tr>
                                                                    <th>الشعار</th>
                                                                    <th>اسم الموقع</th>
                                                                    <th>الرابط</th>
                                                                    <th>التحكم</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr id="addSocial" class="hidden">
                                                                    <form action="{{route('add-social')}}" method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <td>
                                                                            <input required type="file" name="icon" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="text" name="site_name" placeholder="Facebook" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="text" name="url" placeholder="www.facebook.com" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <button type="submit" style="color: #3fb614;background-color: transparent;border: none;"><i class="fa fa-save"></i></button>
                                                                                <button type="button" id="cancel" style="color: #b62626;background-color: transparent;border: none;"><i class="fa fa-close"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                <tr id="editSocial" class="hidden">
                                                                    <form action="{{route('update-social')}}" method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="id" value="">
                                                                        <td>
                                                                            <input required type="file" name="edit_icon" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="text" name="edit_name" placeholder="Facebook" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="text" name="edit_url" placeholder="www.facebook.com" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <button type="submit" style="color: #3fb614;background-color: transparent;border: none;"><i class="fa fa-save"></i></button>
                                                                                <button type="button" id="cancelEdit" style="color: #b62626;background-color: transparent;border: none;"><i class="fa fa-close"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                @foreach($socials as $social)
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <a target="_blank" href="{{$social->url}}" class="btn-{{$social->icon}} btn-small">
                                                                                <img src="{{ Request::root() }}/images/socials/{{ $social->icon }}" alt="" style="width: 30px; border-radius: 50%;">
                                                                            </a>
                                                                        </th>
                                                                        <td>{{$social->site_name}}</td>
                                                                        <td>{{$social->url}}</td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <button type="button" class="editSocialForm" style="color: #3fb614;background-color: transparent;border: none;"
                                                                                        data-id     = "{{$social->id}}"
                                                                                        data-name   = "{{$social->site_name}}"
                                                                                        data-ics    = "{{$social->icon}}"
                                                                                        data-url    = "{{$social->url}}"
                                                                                ><i class="fa fa-edit"></i></button>
                                                                                <a href="{{route('delete-social', $social->id )}}" style="color: #b62626;background-color: transparent;border: none;"><i class="fa fa-trash"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="aboutUs" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-custom panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">من نحن</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{route('aboutUs')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">عن التطبيق بالعربي</label>
                                                <div class="col-md-10">
                                                    <textarea name="about_ar" id="" required cols="30" rows="10" class="form-control">{{settings('about_us_ar')}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">عن التطبيق بالانجليزية</label>
                                                <div class="col-md-10">
                                                    <textarea name="about_en" id="" required cols="30" rows="10" class="form-control">{{settings('about_us_en')}}</textarea>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">حفظ</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="roles" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-custom panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">الشروط و الاحكام</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{route('roles')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">الشروط و الاحكام بالعربي</label>
                                                <div class="col-md-10">
                                                    <textarea name="roles_ar" id="" required cols="30" rows="10" class="form-control">{{settings('roles_ar')}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">الشروط و الاحكام بالانجليزية</label>
                                                <div class="col-md-10">
                                                    <textarea name="roles_en" id="" required cols="30" rows="10" class="form-control">{{settings('roles_en')}}</textarea>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">حفظ</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="appSection" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-custom panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">اعدادت سيكشن التطبيق</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{route('appSection')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">العنوان بالعربية</label>
                                                <div class="col-md-10">
                                                    <input required type="text" value="{{ $app_section->title_ar }}" name="title_ar" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">العنوان بالانجليزية</label>
                                                <div class="col-md-10">
                                                    <input required type="text" value="{{ $app_section->title_en }}" name="title_en" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">رابط الاندرويد</label>
                                                <div class="col-md-10">
                                                    <input required type="url" value="{{ $app_section->android }}" name="android" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">رابط الايفون</label>
                                                <div class="col-md-10">
                                                    <input required type="url" value="{{ $app_section->ios }}" name="ios" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">الوصف بالعربية</label>
                                                <div class="col-md-10">
                                                    <textarea name="desc_ar" required class="form-control" id="" cols="30" rows="10">{{ $app_section->desc_ar }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">الوصف بالانجليزية</label>
                                                <div class="col-md-10">
                                                    <textarea name="desc_en" required class="form-control" id="" cols="30" rows="10">{{ $app_section->title_en }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">صورة التطبيق بالعربية</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="img_ar" data-default-file="{{appPath()}}/images/appSection/{{ $app_section->img_ar }}" class="dropify photo" data-max-file-size="1M" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">صورة التطبيق بالانجليزية</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="img_en" data-default-file="{{appPath()}}/images/appSection/{{ $app_section->img_en }}" class="dropify photo" data-max-file-size="1M" />
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">حفظ</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('script')

@endsection