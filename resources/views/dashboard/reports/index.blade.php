@extends('dashboard.index')
@section('title')
    التقارير
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <a href="{{route('deletereports')}}" class="btn btn-danger m-b-10"><i class="fa fa-trash"></i> حذف الكل</a>
                <table id="datatable" class="table table-bordered table-responsives">
                    <thead>
                    <tr>
                        <th>العضو</th>
                        <th>الحدث</th>
                        <th>ال IP</th>
                        <th>البلد</th>
                        <th>المنطقة</th>
                        <th>المدينة</th>
                        <th>التاريخ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supervisorReports as $r)
                        <tr>
                            <th scope="row">
                                <img src="{{asset('images/admins/'.$r->User->avatar)}}" class="img-circle img-responsive img-rounded" width="30px" height="30px">
                            </th>
                            <td>{{$r->event}}</td>
                            <td>{{$r->ip}}</td>
                            <td>{{$r->country}}</td>
                            <td>{{$r->area}}</td>
                            <td>{{$r->city}}</td>
                            <td>{{$r->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->


@endsection