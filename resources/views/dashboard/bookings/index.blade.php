@section('styles')
@endsection

@extends('dashboard.index')
@section('title')
    الحجوزات
@endsection
@section('content')

    <div class="btn-group btn-group-justified m-b-10">
        <a href="#add" class="btn btn-success waves-effect btn-lg waves-light" data-animation="fadein" data-plugin="custommodal"
            data-overlaySpeed="100" data-overlayColor="#36404a">اضافة حجز جديد <i class="fa fa-plus"></i> </a>
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
                        <th>اسم المستخدم</th>
                        <th>اسم المناسبة</th>
                        <th>سعر التذكرة</th>
                        <th>التاريخ</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($bookings as $booking)
                        <tr>
                            <td>
                                <label class="custom-control material-checkbox" style="margin: auto">
                                    <input type="checkbox" class="material-control-input checkSingle" id="{{$booking->id}}">
                                    <span class="material-control-indicator"></span>
                                </label>
                            </td>
                            <td>{{$booking->id}}</td>
                            <td><a href="#" data-toggle="modal" data-target="#user_{{ $booking->id }}">{{$booking->user->name}}</a></td>
                            <td><a href="#" data-toggle="modal" data-target="#event_{{ $booking->id }}">{{$booking->event->title_ar}}</a></td>
                            <td>{{$booking->price}} ريال </td>
                            <td>{{$booking->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <a href="#edit" class="edit btn btn-success" data-animation="fadein" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a"
                                        data-id         = "{{$booking->id}}"
                                        data-user_id    = "{{$booking->user_id}}"
                                        data-event_id   = "{{$booking->event_id}}"
                                        data-price      = "{{$booking->price}}"
                                    >
                                        <i class="fa fa-cogs"></i>
                                    </a>

                                    <a href="#delete" class="delete btn btn-danger" data-animation="blur" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a"
                                        data-id = "{{$booking->id}}"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <div id="user_{{ $booking->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="width: 800px">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{{ $booking->user->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="{{appPath()}}/images/admins/{{ $booking->user->avatar }}" alt="user-img" width="150px" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                                                </div>
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li>الاسم : {{ $booking->user->name }} </li>
                                                        <li>الهاتف : {{ $booking->user->phone }} </li>
                                                        <li>الايميل : {{ $booking->user->email }} </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="event_{{ $booking->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="width: 800px">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{{ $booking->event->title_ar . ' - ' . $booking->event->title_en }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="slider owl-carousel">
                                                @foreach($booking->event->images()->get() as $image)
                                                    <div class="item">
                                                        <img src="{{ Request::root() }}/images/events/{{ $image->name }}" style="height: 300px; width: 100%;" />
                                                    </div>
                                                @endforeach
                                            </div>
                                            <p>{{ $booking->event->desc_ar }}</p>
                                            <ul>
                                                <li>التذكرة العادية : {{ $booking->event->normal }} ريال </li>
                                                <li>التذكرة الvip : {{ $booking->event->vip }} ريال </li>
                                                <li>التذكرة الذهبية : {{ $booking->event->gold }} ريال </li>
                                                <li>القسم : {{ $booking->event->category->name_ar }} </li>
                                                <li>المدينة : {{ $booking->event->city->name_ar }} </li>
                                                <li>الهيئه : {{ isset( $booking->event->organization->name_ar) ? $booking->event->organization->name_ar : '-'  }} </li>
                                            </ul>
                                            <a href="https://www.google.com/maps/?q={{ $booking->event->lat }},{{ $booking->event->lng }}" target="_blank">موقع المناسبة</a>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
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
            حجز جديد
        </h4>
        <form action="{{route('addBooking')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="user_id" required class="form-control" id="">
                                <option value="">--اختر المستخدم--</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="event_id" required class="form-control" id="">
                                <option value="">--اختر المناسبة--</option>
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->title_ar . ' - ' . $event->title_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="ticket" required class="form-control" id="">
                                <option value="">--اختر نوع التذكرة--</option>
                                <option value="1">عادية</option>
                                <option value="2">ذهبية</option>
                                <option value="3">VIP</option>
                            </select>
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
        <form id="edit" action="{{route('updateBooking')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="user_id" required class="form-control" id="">
                                <option value="">--اختر المستخدم--</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="event_id" required class="form-control" id="">
                                <option value="">--اختر المناسبة--</option>
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->title_ar . ' - ' . $event->title_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="ticket" required class="form-control" id="">
                                <option value="">--اختر نوع التذكرة--</option>
                                <option value="1">عادية</option>
                                <option value="2">ذهبية</option>
                                <option value="3">VIP</option>
                            </select>
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
        <h4 class="custom-modal-title">حذف الحجز</h4>
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
                    <form action="{{route('deleteBooking')}}" method="post">
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


    <script>


		$('.edit').on('click',function() {

			let id      = $(this).data('id');
			let user_id = $(this).data('user_id');
			let event_id = $(this).data('event_id');
			let image   = $(this).data('image');


            $('#edit').find("input[name='id']").val(id);
            $('#edit').find("select[name='user_id']").val(user_id);
            $('#edit').find("select[name='event_id']").val(event_id);
			let link = "{{asset('images/categories/')}}" + '/' + image;
			$('.photo').attr('data-default-file', link);
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
					url: "{{route('deleteBookings')}}",
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
