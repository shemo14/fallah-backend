@section('styles')
@endsection

@extends('dashboard.index')
@section('title')
    المناسبات
@endsection
@section('content')

    <div class="btn-group btn-group-justified m-b-10">
        <a href="#add" class="btn btn-success waves-effect btn-lg waves-light" data-animation="fadein" data-plugin="custommodal"
            data-overlaySpeed="100" data-overlayColor="#36404a">اضافة مناسبة جديد <i class="fa fa-plus"></i> </a>
        <a href="#deleteAll" class="btn btn-danger waves-effect btn-lg waves-light delete-all" data-animation="blur" data-plugin="custommodal"
            data-overlaySpeed="100" data-overlayColor="#36404a">حذف المحدد <i class="fa fa-trash"></i> </a>
        <a class="btn btn-primary waves-effect btn-lg waves-light" onclick="window.location.reload()" role="button">تحديث الصفحة <i class="fa fa-refresh"></i> </a>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <div class="card-box table-responsive boxes">

                <table id="datatable" class="table table-bordered table-responsives">
                    <thead>
                    <tr>
                        <th>
                            <label class="custom-control material-checkbox" style="margin: auto">
                                <input type="checkbox" class="material-control-input" id="checkedAll">
                                <span class="material-control-indicator"></span>
                            </label>
                        </th>
                        <th>الرقم</th>
                        <th>الاسم</th>
                        <th>المدينة</th>
                        <th>القسم</th>
                        <th>الهيئة</th>
                        <th>العدد</th>
                        <th>الموعد</th>
                        <th>اضافة من</th>
                        <th>الحالة</th>
                        <th>المراجعة</th>
                        <th>تاريخ الاضافة</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($events as $event)
                        <tr>
                            <td>
                                <label class="custom-control material-checkbox" style="margin: auto">
                                    <input type="checkbox" class="material-control-input checkSingle" id="{{$event->id}}">
                                    <span class="material-control-indicator"></span>
                                </label>
                            </td>
                            <td>{{$event->id}}</td>
                            <td>{{$event->title_ar}}</td>
                            <td>{{$event->city->name_ar}}</td>
                            <td>{{$event->category->name_ar}}</td>
                            <td>{{isset( $event->organization->name_ar) ? $event->organization->name_ar : '-' }}</td>
                            <td>{{$event->count}}</td>
                            <td>{{$event->date . ' - ' . $event->time}}</td>
                            <td>{{$event->review()->first()->user->name }}</td>
                            <td>
                                @if(Carbon\Carbon::parse($event->date)->isPast())
                                    <span class="label label-danger">انتهت</span>
                                @else
                                    <span class="label label-success">-</span>
                                @endif
                            </td>
                            <td>
                                @if($event->review()->first()->status == 0)
                                    <span class="label label-warning">معلق</span>
                                @elseif($event->review()->first()->status == 1)
                                    <span class="label label-danger">مرفوض</span>
                                @elseif($event->review()->first()->status == 2)
                                    <span class="label label-success">مقبول من المشرف</span>
                                @else
                                    <span class="label label-success">مقبول من المدير</span>
                                @endif
                            </td>
                            <td>{{$event->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#edit" class="edit btn btn-success" data-animation="fadein" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a"
                                        data-id                 = "{{$event->id}}"
                                        data-name_ar            = "{{$event->title_ar}}"
                                        data-name_en            = "{{$event->title_en}}"
                                        data-desc_ar            = "{{$event->desc_ar}}"
                                        data-desc_en            = "{{$event->desc_en}}"
                                        data-category_id        = "{{$event->category_id}}"
                                        data-country_id         = "{{$event->country_id}}"
                                        data-organization_id    = "{{$event->organization_id}}"
                                        data-normal             = "{{$event->normal}}"
                                        data-gold               = "{{$event->gold}}"
                                        data-vip                = "{{$event->vip}}"
                                        data-lat                = "{{$event->lat}}"
                                        data-lng                = "{{$event->lng}}"
                                        data-count              = "{{$event->count}}"
                                        data-date               = "{{$event->date}}"
                                        data-time               = "{{$event->time}}"
                                        data-max_order          = "{{$event->max_order}}"
                                        data-normal_num         = "{{$event->normal_num}}"
                                        data-gold_num           = "{{$event->gold_num}}"
                                        data-vip_num            = "{{$event->vip_num}}"
                                    >
                                        <i class="fa fa-cogs"></i>
                                    </a>
                                    <a href="#" class=" btn btn-primary" data-toggle="modal" data-target="#event_{{ $event->id }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#delete" class="delete btn btn-danger" data-animation="blur" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a"
                                        data-id = "{{$event->id}}"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <div id="event_{{ $event->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="width: 800px">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{{ $event->title_ar . ' - ' . $event->title_en }}</h4>
                                    </div>
                                    <div class="modal-body model_item">
                                        <div class="container">
                                            <div class="slider owl-carousel">
                                                @foreach($event->images()->get() as $image)
                                                    <div class="item">
                                                        <a href="{{ route('deleteImg', $image->id) }}" class="btn btn-danger remove_Item">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </a>
                                                        @if(strtolower(explode(".", $image->name )[1]) == "mp4" ||
                                                            strtolower(explode(".", $image->name )[1]) == "avi" ||
                                                            strtolower(explode(".", $image->name )[1]) == "quicktime")
                                                            <video controls src="{{ Request::root() }}/images/events/{{ $image->name }}" style="height: 300px; width: 100%;" ></video>
                                                        @else
                                                            <img src="{{ Request::root() }}/images/events/{{ $image->name }}" style="height: 300px; width: 100%;" />
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>

                                            <h4>الوصف بالعربية</h4>
                                            <p>{{ $event->desc_ar }}</p>
                                            <h4>الوصف بالانجليزية</h4>
                                            <p>{{ $event->desc_en }}</p>

                                            <h4>بيانات</h4>
                                            <ul class="ul_list">
                                                <li> التذكرة العادية :  <span>{{ $event->normal }} ريال </span></li>
                                                <li>التذكرة الvip :
                                                    <span>{{ $event->vip }} ريال </span>
                                                </li>
                                                <li>التذكرة الذهبية :
                                                    <span>{{ $event->gold }} ريال </span>
                                                </li>
                                                <li>القسم :
                                                    <span>{{ $event->category->name_ar }}</span>
                                                </li>
                                                <li>المدينة :
                                                    <span>{{ $event->city->name_ar }} </span>
                                                </li>
                                                <li>الحد الاقصي للطلب :
                                                    {{ $event->max_order }}
                                                </li>
                                                <li>الهيئه :
                                                    <span>{{ isset( $event->organization->name_ar) ? $event->organization->name_ar : '-'  }} </span>
                                                </li>
                                                <li>عدد التذاكر العادية :
                                                    <span>{{ $event->normal_num }} </span>
                                                </li>
                                                <li>عدد التذاكر الvip :
                                                    <span>{{ $event->vip_num }} </span>
                                                </li>
                                                <li>عدد التذاكر الذهبية :
                                                    <span>{{ $event->gold_num }} </span>
                                                </li>
                                                <li>اضافة من قبل :
                                                    <span>{{ $event->review()->first()->user->name }}</span>
                                                </li>
                                                <li>حالة المراجعة :
                                                    @if($event->review()->first()->status == 0)
                                                        <span class="label label-warning">معلق</span>
                                                    @elseif($event->review()->first()->status == 1)
                                                        <span class="label label-danger">مرفوض</span>
                                                    @elseif($event->review()->first()->status == 2)
                                                        <span class="label label-success">مقبول من المشرف</span>
                                                    @else
                                                        <span class="label label-success">مقبول من المدير</span>
                                                    @endif
                                                </li>
                                            </ul>
                                            <a href="https://www.google.com/maps/?q={{ $event->lat }},{{ $event->lng }}" target="_blank" class="map_item">موقع المناسبة</a>
                                        </div>
                                        <form action="{{ route('reviewEvents') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" value="{{ $event->review()->first()->id }}" name="id">
                                                    <textarea placeholder="ملاحظات المشرف ..." name="notes" required id="" cols="30" rows="10" {{ $event->review()->first()->created_by == Auth::user()->id ? 'readonly' : '' }} class="form-control">{{ $event->review()->first()->notes }}</textarea>
                                                    @if($event->review()->first()->created_by != Auth::user()->id)
                                                        <button class="btn btn-danger" type="submit" style="margin-top: 10px">رفض مع اضافة ملاحظة</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                                        @if($event->review()->first()->created_by != Auth::user()->id && $event->review()->first()->status != 4)
                                            <a href="{{ route('acceptEvents', $event->id) }}" type="button" class="btn btn-success">قبول</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>

    <!-- add user modal -->
    <div id="add" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title" style="background-color: #36404a">
            مناسبة جديدة
        </h4>
        <form action="{{route('addEvent')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">الاسم بالعربية</label>
                            <input type="text" autocomplete="nope" name="name_ar" required class="form-control" placeholder="الاسم بالعربية ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الاسم بالانجليزية</label>
                            <input type="text" autocomplete="nope" name="name_en" required class="form-control" placeholder="الاسم بالانجليزية ...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الاسم بالعربية</label>
                            <textarea name="desc_ar" required class="form-control" placeholder="الوصف بالعربية..." id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الوصف بالانجليزية</label>
                            <textarea name="desc_en" required class="form-control" placeholder="الوصف بالانجليزية..." id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="category_id" class="form-control" id="" required>
                                <option value="">--اختر القسم--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_ar . ' - ' . $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="city_id" class="form-control" id="" required>
                                <option value="">--اختر المدينة--</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name_ar . ' - ' . $city->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="organization_id" class="form-control" id="">
                                <option value="">--اختر الهيئة--</option>
                                @foreach($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->name_ar . ' - ' . $organization->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">السعر العادي</label>
                            <input type="number" min="0" name="normal" required class="form-control" placeholder="السعر العادي ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">عدد التذاكر العادية</label>
                            <input type="number" min="0" name="normal_num" required class="form-control" placeholder="عدد التذاكر العادية ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">السعر vip</label>
                            <input type="number" min="0" name="vip" required class="form-control" placeholder="السعر vip ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">عدد تذاكر الvip</label>
                            <input type="number" min="0" name="vip_num" required class="form-control" placeholder="عدد تذاكر الvip ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">السعر الذهبية</label>
                            <input type="number" min="0" name="gold" required class="form-control" placeholder="السعر الذهبية ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">عدد التذاكر الذهبية</label>
                            <input type="number" min="0" name="gold_num" required class="form-control" placeholder="عدد التذاكر الذهبية ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label"> العدد الكلي</label>
                            <input type="number" min="0" name="count" required class="form-control" placeholder="العدد الكلي ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الحد الاقصي للطلب</label>
                            <input type="number" min="0" name="max_order" required class="form-control" placeholder="الحد الاقصي للطلب ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">التاريخ</label>
                            <input type="date" name="date" required class="form-control" placeholder="التاريخ ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الوقت</label>
                            <input type="time" name="time" required class="form-control" placeholder="الوقت ...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">موقع المناسبة</label>
                            <div class="us2" style="width: 100%; height: 400px;"></div>
                            <input type="hidden" value="24.705898344057807" name="lat" class="lat"/>
                            <input type="hidden" value="46.681396484375" name="lng" class="lng"/>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="col-sm-4 control-label">فيديو - صور للمناسبة</label>
                                <input type="file" name="images[]" multiple class="dropify" data-max-file-size="5M">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect waves-light">اضافة</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="Custombox.close();">رجوع</button>
            </div>
        </form>
    </div>

    <!-- edit user modal -->
    <div id="edit" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title" style="background-color: #36404a">
            تعديل <span id="category"></span>
        </h4>
        <form id="edit" action="{{route('updateEvent')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">الاسم بالعربية</label>
                            <input type="text" autocomplete="nope" name="name_ar" required class="form-control" placeholder="الاسم بالعربية ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الاسم بالانجليزية</label>
                            <input type="text" autocomplete="nope" name="name_en" required class="form-control" placeholder="الاسم بالانجليزية ...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الاسم بالعربية</label>
                            <textarea name="desc_ar" required class="form-control" placeholder="الوصف بالعربية..." id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الوصف بالانجليزية</label>
                            <textarea name="desc_en" required class="form-control" placeholder="الوصف بالانجليزية..." id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="category_id" class="form-control" id="" required>
                                <option value="">--اختر القسم--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_ar . ' - ' . $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="city_id" class="form-control" id="" required>
                                <option value="">--اختر المدينة--</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name_ar . ' - ' . $city->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="organization_id" class="form-control" id="">
                                <option value="">--اختر الهيئة--</option>
                                @foreach($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->name_ar . ' - ' . $organization->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">السعر العادي</label>
                            <input type="number" min="0" name="normal" required class="form-control" placeholder="السعر العادي ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">عدد التذاكر العادية</label>
                            <input type="number" min="0" name="normal_num" required class="form-control" placeholder="عدد التذاكر العادية ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">السعر vip</label>
                            <input type="number" min="0" name="vip" required class="form-control" placeholder="السعر vip ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">عدد تذاكر الvip</label>
                            <input type="number" min="0" name="vip_num" required class="form-control" placeholder="عدد تذاكر الvip ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">السعر الذهبية</label>
                            <input type="number" min="0" name="gold" required class="form-control" placeholder="السعر الذهبية ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">عدد التذاكر الذهبية</label>
                            <input type="number" min="0" name="gold_num" required class="form-control" placeholder="عدد التذاكر الذهبية ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label"> العدد الكلي</label>
                            <input type="number" min="0" name="count" required class="form-control" placeholder="العدد الكلي ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الحد الاقصي للطلب</label>
                            <input type="number" min="0" name="max_order" required class="form-control" placeholder="الحد الاقصي للطلب ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">التاريخ</label>
                            <input type="date" name="date" required class="form-control" placeholder="التاريخ ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">الوقت</label>
                            <input type="time" name="time" required class="form-control" placeholder="الوقت ...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">موقع المناسبة</label>
                            <div class="us3" style="width: 100%; height: 400px;"></div>
                            <input type="hidden" name="lat" class="lat"/>
                            <input type="hidden" name="lng" class="lng"/>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="col-sm-4 control-label">فيديو - صور للمناسبة</label>
                                <input type="file" name="images[]" multiple class="dropify" data-max-file-size="5M">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect waves-light">تعديل</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="Custombox.close();">رجوع</button>
            </div>
        </form>
    </div>


    <div id="delete" class="modal-demo" style="position:relative; right: 32%">
        <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title">حذف المناسبة</h4>
        <div class="custombox-modal-container" style="width: 400px !important; height: 160px;">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="margin-top: 35px">
                        هل تريد مواصلة عملية الحذف ؟
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{route('deleteEvent')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="delete_id" value="">
                        <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" style="margin-top: 19px">حـذف</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>

    <div id="deleteAll" class="modal-demo" style="position:relative; right: 32%">
        <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title">حذف المحدد</h4>
        <div class="custombox-modal-container" style="width: 400px !important; height: 160px;">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="margin-top: 35px">
                        هل تريد مواصلة عملية الحذف ؟
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all" style="margin-top: 19px">حـذف</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>

@endsection

@section('script')
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCaaFfmZRLjFiB-mtlNl5aeZ44UAkdJWIw&sensor=false&libraries=places&language=ar'></script>
    <script src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
    <script>
        $('.edit').on('click',function() {
			let id              = $(this).data('id');
			let name_ar         = $(this).data('name_ar');
			let name_en         = $(this).data('name_en');
            let desc_ar         = $(this).data('desc_ar');
            let desc_en         = $(this).data('desc_en');
            let category_id     = $(this).data('category_id');
            let country_id      = $(this).data('country_id');
            let organization_id = $(this).data('organization_id');
            let normal          = $(this).data('normal');
            let gold            = $(this).data('gold');
            let vip             = $(this).data('vip');
            let lat             = $(this).data('lat');
            let lng             = $(this).data('lng');
            let count           = $(this).data('count');
            let date            = $(this).data('date');
            let time            = $(this).data('time');
            let image           = $(this).data('images');
            let normal_num      = $(this).data('normal_num');
            let gold_num        = $(this).data('gold_num');
            let vip_num         = $(this).data('vip_num');

            $('#edit').find("input[name='id']").val(id);
            $('#edit').find("input[name='name_ar']").val(name_ar);
            $('#edit').find("input[name='name_en']").val(name_en);
            $('#edit').find("textarea[name='desc_ar']").val(desc_ar);
            $('#edit').find("textarea[name='desc_en']").val(desc_en);
            $('#edit').find("select[name='category_id']").val(category_id);
            $('#edit').find("select[name='city_id']").val(country_id);
            $('#edit').find("select[name='organization_id']").val(organization_id);
            $('#edit').find("input[name='normal']").val(normal);
            $('#edit').find("input[name='gold']").val(gold);
            $('#edit').find("input[name='vip']").val(vip);
            $('#edit').find("input[name='date']").val(date);
            $('#edit').find("input[name='time']").val(time);
            $('#edit').find("input[name='lat']").val(lat);
            $('#edit').find("input[name='lng']").val(lng);
            $('#edit').find("input[name='count']").val(count);
            $('#edit').find("input[name='normal_num']").val(normal_num);
            $('#edit').find("input[name='gold_num']").val(gold_num);
            $('#edit').find("input[name='vip_num']").val(vip_num);

			let link = "{{asset('images/categories/')}}" + '/' + image;
			$('.photo').attr('data-default-file', link);
			$("#category").html(name_ar);

            $('.us3').locationpicker({
                location: {
                    latitude: lat,
                    longitude: lng
                },
                radius: 300,
                zoom: 10,
                inputBinding: {
                    latitudeInput: $('#edit').find("input[name='lat']"),
                    longitudeInput: $('#edit').find("input[name='lng']"),
                },
                enableAutocomplete: true
            });
		});

		$('.delete').on('click',function(){
			let id         = $(this).data('id');
			$("input[name='delete_id']").val(id);

		});

		$("#checkedAll").change(function(){
			if(this.checked){
				$(".checkSingle").each(function(){
					this.checked=true;
				})
			}else{
				$(".checkSingle").each(function(){
					this.checked=false;
				})
			}
		});

		$(".checkSingle").click(function () {
			if ($(this).is(":checked")){
				var isAllChecked = 0;
				$(".checkSingle").each(function(){
					if(!this.checked)
						isAllChecked = 1;
				})
				if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }
			}else {
				$("#checkedAll").prop("checked", false);
			}
		});

		$('.send-delete-all').on('click', function (e) {

			var categoriesIds = [];
			$('.checkSingle:checked').each(function () {
				var id = $(this).attr('id');
                categoriesIds.push({
					id: id,
				});
			});
			var requestData = JSON.stringify(categoriesIds);
			// console.log(requestData);
			if (categoriesIds.length > 0) {
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: "{{route('deleteEvents')}}",
					data: {data: requestData, _token: '{{csrf_token()}}'},
					success: function( msg ) {
						if (msg == 'success') {
							location.reload()
						}
					}
				});
			}
		});
    </script>
    <script>
        $('.us2').locationpicker({
            location: {
                latitude: $('.lat').val(),
                longitude: $('.lng').val()
            },
            radius: 300,
            zoom: 10,
            inputBinding: {
                latitudeInput: $('.lat'),
                longitudeInput: $('.lng'),
            },
            enableAutocomplete: true
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.slider').owlCarousel({
                items: 1,
                loop: true,
                rtl: true,
                autoplay: true
            })
        })
    </script>

@endsection
