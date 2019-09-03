@section('styles')
@endsection

@extends('dashboard.index')
@section('title')
    التقرير المالي
@endsection
@section('content')

    <div class="btn-group btn-group-justified m-b-10">
        <span class="btn btn-success waves-effect btn-lg waves-light" data-animation="fadein" data-plugin="custommodal"
           data-overlaySpeed="100" data-overlayColor="#36404a">
            <i class="fa fa-dollar"></i>
            اجمالي الحجوزات : {{ $total }} ريال </span>
        <a href="#deleteAll" class="btn btn-danger waves-effect btn-lg waves-light delete-all" data-animation="blur" data-plugin="custommodal"
           data-overlaySpeed="100" data-overlayColor="#36404a">
            <i class="fa fa-trash"></i>
            تصفير التقارير</a>
        <a class="btn btn-primary waves-effect btn-lg waves-light" onclick="window.location.reload()" role="button">
            <i class="fa fa-refresh"></i>
            تحديث الصفحة
             </a>
    </div>

    <div class="row">

        <div class="col-sm-12">

            <div class="card-box card-tabs">
                <ul class="nav nav-pills pull-right">
                    <li class="active">
                        <a href="#sales" data-toggle="tab" aria-expanded="true">التقارير المالي</a>
                    </li>
                    <li class="">
                        <a href="#charts" data-toggle="tab" aria-expanded="true">الارادات السنوية</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="sales" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('filterReport') }}" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">الاقسام</label>
                                                    <select name="category_id" class="form-control" id="">
                                                        <option value="">--اختر القسم--</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">المدن</label>
                                                    <select name="country_id" class="form-control" id="">
                                                        <option value="">--اختر المدينة--</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">الهيئات</label>
                                                    <select name="organization_id" class="form-control" id="">
                                                        <option value="">--اختر الهيئة--</option>
                                                        @foreach($organizations as $organization)
                                                            <option value="{{ $organization->id }}">{{ $organization->name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">من</label>
                                                    <input type="date" class="form-control" name="from">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">الي</label>
                                                    <input type="date" class="form-control" name="to">
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <div class="form-group" style="margin-top: 25px">
                                                    <button class="btn btn-primary" type="submit" style="width: 100px">فلترة</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <table id="datatable-buttons" class="table table-bordered table-responsives datatable-basic">
                                        <thead>
                                        <tr>
                                            <th>الرقم</th>
                                            <th>المناسبة</th>
                                            <th>الحجوزات</th>
                                            <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach($events as $event)
                                            <tr>
                                                <td>{{$event->id}}</td>
                                                <td><a href="#" data-toggle="modal" data-target="#event_{{ $event->id }}">{{$event->title_ar}}</a></td>
                                                <td>{{$event->bookings()->count()}}</td>
                                                <td>{{$event->bookings()->sum('price')}}</td>
                                            </tr>

                                            <div id="event_{{ $event->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content" style="width: 800px">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">{{ $event->title_ar . ' - ' . $event->title_en }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <div class="slider owl-carousel">
                                                                    @foreach($event->images()->get() as $image)
                                                                        <div class="item">
                                                                            <img src="{{ Request::root() }}/images/events/{{ $image->name }}" style="height: 300px; width: 100%;" />
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <p>{{ $event->desc_ar }}</p>
                                                                <ul>
                                                                    <li>التذكرة العادية : {{ $event->normal }} ريال </li>
                                                                    <li>التذكرة الvip : {{ $event->vip }} ريال </li>
                                                                    <li>التذكرة الذهبية : {{ $event->gold }} ريال </li>
                                                                    <li>القسم : {{ $event->category->name_ar }} </li>
                                                                    <li>المدينة : {{ $event->city->name_ar }} </li>
                                                                    <li>الهيئه : {{ isset( $event->organization->name_ar) ? $event->organization->name_ar : '-'  }} </li>
                                                                </ul>
                                                                <a href="https://www.google.com/maps/?q={{ $event->lat }},{{ $event->lng }}" target="_blank">موقع المناسبة</a>
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
                        </div>
                    </div>
                    <div id="charts" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12" id="saleChart">
                                <canvas id="myChart" height="130"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

    </div>

    <div id="deleteAll" class="modal-demo" style="position:relative; right: 32%">
        <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title">تصفير التقارير</h4>
        <div class="custombox-modal-container" style="width: 400px !important; height: 180px;">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="margin-top: 35px">
                        هل تريد مواصلة عملية التصفير ؟
                    </h3>
                    <span class="text-danger text-center">سيتم حذف جميع الحجوزات بعد عمليه التصفير</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all" style="margin-top: 19px">تصفير</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>

@endsection

@section('script')

    <script type="text/javascript" src="https://www.chartjs.org/dist/2.7.2/Chart.bundle.js"></script>

    <script>

        $('.edit').on('click',function() {

            let id      = $(this).data('id');
            let name_ar = $(this).data('name_ar');
            let name_en = $(this).data('name_en');
            let image   = $(this).data('image');


            $('#edit').find("input[name='id']").val(id);
            $('#edit').find("input[name='name_ar']").val(name_ar);
            $('#edit').find("input[name='name_en']").val(name_en);
            let link = "{{asset('images/categories/')}}" + '/' + image;
            $('.photo').attr('data-default-file', link);
            $("#category").html(name_ar);
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
                    url: "{{route('clearBookings')}}",
                    data: { _token: '{{csrf_token()}}'},
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
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: '# احصائيات الارادات بالريالات',
                    data: JSON.parse("{{ $allSum }}"),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });


        function printDiv(){

            var divToPrint=document.getElementById('myChart');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

            setTimeout(function(){newWin.close();},10);

        }

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
