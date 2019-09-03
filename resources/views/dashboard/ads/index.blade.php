@section('styles')
@endsection

@extends('dashboard.index')
@section('title')
    الاعلانات
@endsection
@section('content')

    <div class="btn-group btn-group-justified m-b-10">
        <a href="#add" class="btn btn-success waves-effect btn-lg waves-light" data-animation="fadein" data-plugin="custommodal"
            data-overlaySpeed="100" data-overlayColor="#36404a">اضافة اعلان جديد <i class="fa fa-plus"></i> </a>
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
                        <th>الحالة</th>
                        <th>الترتيب</th>
                        <th>التاريخ</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($ads as $ad)
                        <tr>
                            <td>
                                <label class="custom-control material-checkbox" style="margin: auto">
                                    <input type="checkbox" class="material-control-input checkSingle" id="{{$ad->id}}">
                                    <span class="material-control-indicator"></span>
                                </label>
                            </td>
                            <td>{{$ad->id}}</td>
                            <td>{{$ad->user->name}}</td>
                            <td>
                                @if($ad->status)
                                    <span class="label label-success">نشط</span>
                                @else
                                    <span class="label label-danger">غير نشط</span>
                                @endif
                            </td>
                            <td>{{$ad->order}}</td>
                            <td>{{$ad->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#edit" class="edit btn btn-success" data-animation="fadein" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a"
                                        data-id                 = "{{$ad->id}}"
                                        data-order              = "{{$ad->order}}"
                                        data-user_id            = "{{$ad->user_id}}"
                                        data-status             = "{{$ad->status}}"
                                    >
                                        <i class="fa fa-cogs"></i>
                                    </a>
                                    <a href="#" class=" btn btn-primary" data-toggle="modal" data-target="#ad_{{ $ad->id }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#delete" class="delete btn btn-danger" data-animation="blur" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a"
                                        data-id = "{{$ad->id}}"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- add user modal -->
                        <div id="ad_{{ $ad->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="width: 800px">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{{ $ad->user->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="slider owl-carousel">
                                                @foreach($ad->images()->get() as $image)
                                                    <div class="item">
                                                        <a href="{{ route('deleteImg', $image->id) }}" class="btn btn-danger">حذف الملف</a>
                                                            @if(strtolower(explode(".", $image->name )[1]) == "mp4")
                                                                <video controls src="{{ Request::root() }}/images/ads/{{ $image->name }}" style="height: 300px; width: 100%;" ></video>
                                                            @else
                                                                <img src="{{ Request::root() }}/images/ads/{{ $image->name }}" style="height: 300px; width: 100%;" />
                                                            @endif
                                                    </div>
                                                 @endforeach
                                            </div>
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
            اعلان جديد
        </h4>
        <form action="{{route('addAd')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">الترتيب</label>
                            <input type="number" autocomplete="nope" name="order" required class="form-control" placeholder="الترتيب ...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="col-sm-4 control-label">فيديو - صور الاعلان</label>
                                <input type="file" name="images[]" multiple class="dropify" data-max-file-size="5M">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="width: auto">تفعيل</label>
                                <input type="checkbox" class="form-control" name="status" style="width: auto;display: inline-block;float: right;vertical-align: middle;height: auto;margin: 5px;">
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
        <form id="edit" action="{{route('updateAd')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="">
            <div class="modal-body">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">الترتيب</label>
                            <input type="number" autocomplete="nope" name="order" required class="form-control" placeholder="الترتيب ...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="col-sm-4 control-label">فيديو - صور الاعلان</label>
                                <input type="file" name="images[]" multiple class="dropify" data-max-file-size="5M">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="width: auto">تفعيل</label>
                                <input type="checkbox" class="form-control" name="status" style="width: auto;display: inline-block;float: right;vertical-align: middle;height: auto;margin: 5px;">
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
        <h4 class="custom-modal-title">حذف الاعلان</h4>
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
                    <form action="{{route('deleteAd')}}" method="post">
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

			let id                  = $(this).data('id');
			let status              = $(this).data('status');
			let inHome              = $(this).data('inhome');
			let user_id             = $(this).data('user_id');
			let order               = $(this).data('order');

			console.log('opss ...', status, inHome);

            $('#edit').find("input[name='id']").val(id);
            $('#edit').find("input[name='order']").val(order);
            $('#edit').find("input[name='status']").attr('checked', status ? true : false);
            $('#edit').find("input[name='inHome']").attr('checked', inHome ? true : false);
            $('#edit').find("select[name='user_id']").val(user_id);

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
					url: "{{route('deleteAds')}}",
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
                loop: false,
                rtl: true,
                autoplay: true
        })
        })
    </script>

@endsection
