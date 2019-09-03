@section('styles')

@endsection

@extends('dashboard.index')
@section('title')
    الصلاحيات
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="pull-right">
                    <label class="custom-control material-checkbox">
                        <span class="material-control-description">تحديد الكل</span>
                        <input type="checkbox" class="material-control-input" id="checkedAll">
                        <span class="material-control-indicator"></span>
                    </label>
                </div>

                <h4 class="header-title m-t-0 m-b-30">قائمة الصلاحيات</h4>
                <hr>
                <div class="card-footer">
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-2" for="role">اسم الصلاحية</label>
                                    <div class="col-md-10">
                                        <input type="text" id="role" class="form-control" required name="role">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        {{permissions()}}
                        <div class="form-row text-center">
                            <div class="col-12">
                                <button 
                                    style="font-weight: bolder;font-size: 15px;" 
                                    type="button" 
                                    id="send"
                                    class="btn btn-success btn-rounded waves-effect waves-light w-md m-b-5">
                                    حــفــظ
                                </button>
                            </div>
                         </div>
                    </div>
                </div>

            </div>
        </div><!-- end col -->
    </div>


@endsection
@section('script')
    <script>

        $('.per_parent').change(function () {
            var id = $(this).attr('id');
	        if(this.checked){
		        $(".per_" + id).each(function(){
			        this.checked=true
		        })
	        }else{
		        $(".per_" + id).each(function(){
			        this.checked=false;
		        })
	        }
        });

        $("#checkedAll").change(function(){
            if(this.checked){
                $(".checkSingle").each(function(){
                    this.checked=true
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

        $('#send').on('click', function () {
            var permissions = [];
            $('.permission:checked').each(function (index, el) {
                permissions.push($(el).val());
            });
            var role = $('#role').val();
            if (role === '') {
                ajaxSuccess();
                Swal.fire({
                    html: '<h4>اسم الصلاحية مطلوب</h4>',
                    type: 'error',
                    showConfirmButton: false,
		            timer: 2000
                });
                return;
            }

            if (permissions.length === 0) {
                ajaxSuccess();
                Swal.fire({
                    html: '<h4>قم بإختيار صلاحية واحدة على الأقل</h4>',
                    type: 'error',
                    showConfirmButton: false,
		            timer: 2000
                });
                return;
            }
            ajaxStart();
            var _token = '{{csrf_token()}}';
            var url = "{{route('addpermission')}}";
            $.ajax({
                method: 'POST',
                url,
                data: { _token, role, permissions }
            }).success(function (res) {
                ajaxSuccess();
                // console.log(res)
                if(res === 1) {
                    window.location.assign('{{route("permissionslist")}}')   
                }
            }).error(function (err) {
                console.log(err);
            });
        });

    </script>
@endsection

